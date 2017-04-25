DROP TABLE IF EXISTS `log`, `car`, `authentication`, `customer`, `administrator`, `engineer`, `conductor`, `employee`, `schedule`, `train`, `company`;

CREATE TABLE `company`(
 company_id VARCHAR(80),
 name VARCHAR(80),
 address VARCHAR(255),
 phone_number INT,
 email VARCHAR(80),
 PRIMARY KEY(company_id)
);

CREATE TABLE `train`(
 train_num INT,
 company_id VARCHAR(80),
 FOREIGN KEY(company_id) REFERENCES `company` (company_id),
 PRIMARY KEY(train_num)
);

CREATE TABLE `schedule`(
 depart_city VARCHAR(255),
 dest_city VARCHAR(255),
 depart_time TIME,
 dest_time TIME,
 `date` DATE,
 train_num INT,
 FOREIGN KEY(train_num) REFERENCES `train` (train_num),
 CONSTRAINT PK_schedule PRIMARY KEY(depart_city, depart_time, dest_city, dest_time)
);

CREATE TABLE `employee`(
 ssn VARCHAR(9) NOT NULL,
 first_name VARCHAR(255),
 last_name VARCHAR(255),
 train_num INT,
 status VARCHAR(30),
 FOREIGN KEY (train_num) REFERENCES `train` (train_num),
 PRIMARY KEY(ssn)
);

CREATE TABLE `conductor`(
 ssn VARCHAR(9) NOT NULL,
 first_name VARCHAR(255),
 last_name VARCHAR(255),
 status VARCHAR(30),
 employee_rank VARCHAR(40),
 FOREIGN KEY(ssn) REFERENCES `employee` (ssn),
 PRIMARY KEY(ssn)
);

CREATE TABLE `engineer`(
 ssn VARCHAR(9) NOT NULL,
 first_name VARCHAR(255),
 last_name VARCHAR(255),
 status VARCHAR(30),
 employee_rank VARCHAR(40),
 hours_traveling INT,
 FOREIGN KEY(ssn) REFERENCES `employee` (ssn),
 PRIMARY KEY(ssn)
);

CREATE TABLE `administrator`(
 ssn VARCHAR(9) NOT NULL,
 first_name VARCHAR(255),
 last_name VARCHAR(255),
 status VARCHAR(30),
 job_title VARCHAR(80),
 FOREIGN KEY(ssn) REFERENCES `employee` (ssn),
 PRIMARY KEY(ssn)
);

CREATE TABLE `customer`(
 customer_id VARCHAR(80),
 first_name VARCHAR(40),
 last_name VARCHAR(40),
 email VARCHAR(80),
 phone_number INT,
 address VARCHAR(255),
 admin VARCHAR(9),
 FOREIGN KEY(admin) REFERENCES `administrator`(ssn),
 PRIMARY KEY(customer_id)
);

CREATE TABLE `authentication`(
 user_id VARCHAR(30) NOT NULL,
 password VARCHAR(255),
 add_equipment BOOLEAN,
 add_conductor BOOLEAN,
 monitor_train BOOLEAN,
 add_train BOOLEAN,
 add_engineer BOOLEAN,
 reset_pass BOOLEAN,
 edit_user BOOLEAN,
 ssn VARCHAR(9),
 FOREIGN KEY(ssn) REFERENCES `employee` (ssn),
 PRIMARY KEY(user_id)
);

CREATE TABLE `car`(
 serial_num VARCHAR(80),
 load_capacity VARCHAR(80),
 type VARCHAR(50),
 location VARCHAR(80),
 manufacturer VARCHAR(80),
 price FLOAT(2),
 train_num INT,
 customer_id VARCHAR(80),
 FOREIGN KEY(customer_id) REFERENCES `customer` (customer_id),
 FOREIGN KEY(train_num) REFERENCES `train` (train_num),
 PRIMARY KEY(serial_num)
);

CREATE TABLE `log`(
 log_id INT AUTO_INCREMENT NOT NULL,
 ip_address VARCHAR(40),
 action VARCHAR(80),
 date_time TIMESTAMP,
 ssn VARCHAR(9),
 customer_id VARCHAR(80),
 FOREIGN KEY(ssn) REFERENCES `employee` (ssn),
 FOREIGN KEY(customer_id) REFERENCES `customer` (customer_id),
 PRIMARY KEY(log_id)
);
