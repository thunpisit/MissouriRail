function form_submission(){
  var inputs = document.getElementsByClassName("form-control");
  for(var i = 0; i < inputs.length; i++){
    if(inputs[i].value == ""){
      alert("You must fill out the entire form.");
      return false;
    }
  }
}
