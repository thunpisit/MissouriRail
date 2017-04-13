$(function(){
  // $("#createCustomer").hide();
  printCustomers();
  createCustomer();
  });

function printCustomers(){
  $("#printCustomers").click(function(){
    $.ajax({
       url: '../controller.php',
       data: {action: 'printCustomers'},
       type: 'post',
       success: function(output) {
                    $("#customerTable").html(output);
                }
    });

  });
}

function createCustomer(){
  // $("#createCustomerBtn").click(function(){
  //   $("#createCustomer").slideToggle('slow'); });

  $("#submitCreate").click(function(){
    user_id = $("#user_idCreate").val();
    first_name = $("#first_nameCreate").val();
    last_name = $("#last_nameCreate").val();
    email = $("#emailCreate").val();
    phone_number = $("#phone_numberCreate").val();
    address = $("#addressCreate").val();

    $.ajax({
       url: '../controller.php',
       data: {action: 'createCustomer',
              user_id: user_id,
              first_name: first_name,
              last_name: last_name,
              email: email,
              phone_number: phone_number,
              address: address},
       type: 'post',
       success: function(output) {
                    $("#createCustomer").slideUp('slow');
                }
            });
  });
}
