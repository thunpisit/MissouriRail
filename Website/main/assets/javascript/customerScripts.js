$(function(){
  $("#deleteTextInput").hide();
  $("#createCustomer").hide();
  modalCloseCleanup();
  printCustomers();
  createCustomer();
  });

function modalCloseCleanup(){
  $("#closeModal").click(function(){
    $("#deleteBtn, #editCustomerBtn").show();
  });

}

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

function modalFill(user_id, first_name, last_name, email, phone_number, address){
  $("#editCustomerBtn").html("Edit");
  $("#user_id").val(user_id)
  $("#first_name").val(first_name);
  $("#last_name").val(last_name);
  $("#email").val(email);
  $("#phone_number").val(phone_number);
  $("#address").val(address);
  $("#editCustomerBtn").click(function(){
    $(".modalInput").removeAttr("readonly");
    $("#editCustomerBtn").html('Save').removeClass('btn-info').addClass('btn-success');
    $("#editCustomerBtn").click(function(){
      $("#deleteBtn").hide();
      $("#editCustomerBtn").html('Changes Saved').removeClass('btn-success').addClass('btn-info');
      $(".modalInput").attr("readonly", true);
      // edit customer ajax call
      user_id = $("#user_id").val();
      first_name = $("#first_name").val();
      last_name = $("#last_name").val();
      email = $("#email").val();
      phone_number = $("#phone_number").val();
      address = $("#address").val();
      $.ajax({
         url: '../controller.php',
         data: {action: 'editCustomer',
                user_id: user_id,
                first_name: first_name,
                last_name: last_name,
                email: email,
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
             url: '../controller.php',
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
        user_id = $("#user_id").val();
        $.ajax({
           url: '../controller.php',
           data: {action: 'deleteCustomer',
                  user_id: user_id},
           type: 'post',
           success: function(output) {
                      console.log(output);
                      $("#user_id").val(user_id + " deleted");
                      $("#first_name, #last_name, #email, #phone_number, #address").val("deleted");
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
     url: '../controller.php',
     data: {action: 'printCustomers'},
     type: 'post',
     success: function(output) {
                  $("#customerTable").html(output);
              }
  });
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
