function form_submission(){
  var inputs = document.getElementsByClassName("form-control");
  for(var i = 0; i < inputs.length; i++){
    if(inputs[i].value == ""){
      alert("You must fill out the entire form.");
      return false;
    }
  }
}

function form_submissionCreateCustomer(){
  var $inputs = $(".checkMe");
  $($inputs).each(function(){
    if($(this).val() == ''){
      alert("Fill in entire form");
      return false;
    }
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
