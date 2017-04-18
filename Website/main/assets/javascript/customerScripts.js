$(function(){
  $("#createBtn").hide();
  modalCloseCleanup();
  printCustomers();
  createCustomer();
  viewEquipment();
  });

function editCar(serial){
  preloadModal = $(".modal-body").html();
  $.ajax({
    url: 'controller.php',
    data:{action: 'getCarInfo',
          serial_num: serial,
          type: 'form_admin'},
    type: 'post',
    success: function(output) {
      // console.log(output);
      $(".modal-body").html(output);
      $("#editCustomerBtn").html("Submit Changes").show();
      $(".editMe").removeAttr("readonly");
    }
  });

  $("#editCustomerBtn").click(function(){
    serial = $("#serial_num").val();
    load = $("#load_capacity").val();
    type = $("#type").val();
    locationOfCar = $("#location").val();
    price = $("#price").val();
    train_num = $("#train_num").val();
    customer_id = $("#assignedCustomerID").val();
    $.ajax({
      url: 'controller.php',
      data:{action: 'updateCar',
            serial_num: serial,
            load: load,
            type: type,
            locationOfCar: locationOfCar,
            price: price,
            train_num: train_num,
            customer_id: customer_id},
      type: 'post',
      success: function(output){
        console.log(output);
        $(".editMe").attr("readonly", true);
      }
    });
  });

  $("#closeModal").click(function(){
    $(".modal-body").html(preloadBody);
  });

}

function viewEquipment(){
  $("#viewEquipmentBtn").click(function(){
    preloadBody = $(".modal-body").html();
    $("#deleteBtn, #editCustomerBtn, #createBtn").hide();
    $.ajax({
       url: 'controller.php',
       data: {action: 'getAllReservations'},
       type: 'post',
       success: function(output) {
                  $(".modal-body").html(output);
                }
    });
    $("#closeModal").click(function(){
      $(".modal-body").html(preloadBody);
      $("#deleteBtn, #editCustomerBtn, #createBtn").show();
    });
  });
}

function modalCloseCleanup(){
  $("#closeModal").click(function(){
    $("#deleteBtn, #editCustomerBtn").show();
  });

}

function printCustomers(){
  $("#printCustomers").click(function(){
    $.ajax({
       url: 'controller.php',
       data: {action: 'printCustomers'},
       type: 'post',
       success: function(output) {
                    $("#customerTable").html(output);
                }
    });

  });
}

function modalFill(email, first_name, last_name, phone_number, address){
  $("#createBtn").hide();
  $(".modal-title").html('Customer Information');
  $("#editCustomerBtn").html("Edit");
  $("#email").val(email).attr("readonly", true);
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#phone_number").val(phone_number).attr("readonly", true);
  $("#address").val(address).attr("readonly", true);
  $("#editCustomerBtn").click(function(){
    $(".modalInput").removeAttr("readonly");
    $("#editCustomerBtn").html('Save').removeClass('btn-info').addClass('btn-success');
    $("#editCustomerBtn").click(function(){
      $("#deleteBtn").hide();
      $("#editCustomerBtn").html('Changes Saved').removeClass('btn-success').addClass('btn-info');
      $(".modalInput").attr("readonly", true);
      // edit customer ajax call
      email = $("#email").val();
      first_name = $("#first_name").val();
      last_name = $("#last_name").val();
      phone_number = $("#phone_number").val();
      address = $("#address").val();
      $.ajax({
         url: 'controller.php',
         data: {action: 'editCustomer',
                email: email,
                first_name: first_name,
                last_name: last_name,
                phone_number: phone_number,
                address: address},
         type: 'post',
         success: function(output) {
                    console.log(output);
                    $("#deleteBtn").show();
                  }
              });
        $("#closeModal").click(function(){
          $.ajax({
             url: 'controller.php',
             data: {action: 'printCustomers'},
             type: 'post',
             success: function(output) {
                          $("#customerTable").html(output);
                      }
          });
        });
    });
  });

  $("#deleteBtn").click(function(){

      if(confirm("Are you sure you want to delete " + $("#user_id").val() + "?")){
        email = $("#email").val();
        $.ajax({
           url: 'controller.php',
           data: {action: 'deleteCustomer',
                  email: email},
           type: 'post',
           success: function(output) {
                      console.log(output);
                      $("#email").val(email + " deleted");
                      $("#first_name, #last_name, #phone_number, #address").val("deleted");
                      $("#deleteBtn, #editCustomerBtn").hide();
                      $("#closeModal").focus();
                      refreshTable();
                    }
                });
      }

  });//end deleteBtn

}

function refreshTable(){
  $.ajax({
     url: 'controller.php',
     data: {action: 'printCustomers'},
     type: 'post',
     success: function(output) {
                  $("#customerTable").html(output);
              }
  });
}

function createCustomer(){
  $("#createCustomerBtn").click(function(){
      $(".modal-title").html('Create Customer Form');
      $("#deleteBtn, #editCustomerBtn").hide();
      $("#createBtn").show();
      $("#user_id").val('').removeAttr("readonly");
      $("#first_name").val('').removeAttr("readonly");
      $("#last_name").val('').removeAttr("readonly");
      $("#email").val('').removeAttr("readonly");
      $("#phone_number").val('').removeAttr("readonly");
      $("#address").val('').removeAttr("readonly");
      preloadBody = $(".modal-body").html();
    });

    $("#createBtn").click(function(){
      if(form_validation('.modalInput') == false){
        alert('Fill out customer information completely or NA if not known');
        return false;
      } else {
        email = $("#email").val();
        first_name = $("#first_name").val();
        last_name = $("#last_name").val();
        phone_number = $("#phone_number").val();
        address = $("#address").val();


        $.ajax({
           url: 'controller.php',
           data: {action: 'createCustomer',
                  email: email,
                  first_name: first_name,
                  last_name: last_name,
                  phone_number: phone_number,
                  address: address},
           type: 'post',
           success: function(output) {
                        $(".modal-body").html(output);
                        $("#createBtn").click(function(){
                        if(form_validation('.modalInput') == false){
                          alert('Fill out customer information completely or NA if not known');
                          return false;
                        } else {
                          user_id = $("#user_id").val();
                          password = $("#password").val();
                          $.ajax({
                             url: 'controller.php',
                             data: {action: 'createCustomerAuthentication',
                                    user_id: user_id,
                                    password: password},
                             type: 'post',
                             success: function(output) {
                               console.log(output);
                               $("#createBtn").hide();
                               $("#closeModal").focus();
                               $(".modal-body").html("<h2>Customer account created</h2>")
                             }
                           });
                          $("#closeModal").click(function(){
                            $(".modal-body").html(preloadBody);
                            $("#createBtn").show();
                            $("#user_id").attr("readonly", true);
                            $("#first_name").attr("readonly", true);
                            $("#last_name").attr("readonly", true);
                            $("#email").attr("readonly", true);
                            $("#phone_number").attr("readonly", true);
                            $("#address").attr("readonly", true);
                            printCustomers();
                          });
                        }

                        });
                    }
                });
      }
    });//end create customer
  }


function form_validation(elements_class){
  var inputs = $(elements_class);
  for(var i = 0; i < inputs.length; i++){
    if(inputs[i].value == ''){
      return false;
    }
  }
}
