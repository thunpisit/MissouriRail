$(function(){
  $("#createCustomer").hide();
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
                    $("#customerTable").slideDown('slow');
                }
    });

  });
}

function modalFill(user_id, first_name, last_name, email, phone_number, address){
  $("#user_id").val(user_id)
  $("#first_name").val(first_name);
  $("#last_name").val(last_name);
  $("#email").val(email);
  $("#phone_number").val(phone_number);
  $("#address").val(address);
}

function createCustomer(){
  $("#createCustomerBtn").click(function(){
    $("#createCustomer").slideToggle('slow');
  });
  $("#submitCreate").click(function(){
    if(form_validation('.checkMe') == false){
      alert('Fill out customer information completely or NA if not known');
      return false;
    } else {
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
                      $("#user_idCreate").val('');
                      $("#first_nameCreate").val('');
                      $("#last_nameCreate").val('');
                      $("#emailCreate").val('');
                      $("#phone_numberCreate").val('');
                      $("#addressCreate").val('');
                      printCustomers();
                  }
              });
        }
  });//end onclick
}//end createCustomer

function form_validation(elements_class){
  var inputs = $(elements_class);
  for(var i = 0; i < inputs.length; i++){
    if(inputs[i].value == ''){
      return false;
    }
  }
}
