$(function(){
  $("#userDetailsForm").hide();
  $("#signupSelect").change(function(){
    userType = $(this).val()
    switch (userType) {
      case 'administrator':
        $("#input3").html("Status:");
        $("#input4").html("Job Title:")
        $("#engineerSignUp").hide();
        $("#userDetailsForm").slideDown();
        break;

      case 'conductor':
        $("#input3").html("Status:");
        $("#input4").html("Employee Rank:")
        $("#engineerSignUp").hide();
        $("#userDetailsForm").slideDown();
        break;

      case 'engineer':
        $("#input3").html("Status:");
        $("#input4").html("Employee Rank:")
        $("#engineerSignUp").show();
        $("#userDetailsForm").slideDown();
        break;

      case 'customer':
        $("#input3").html("Phone Number:");
        $("#input4").html("Address:")
        $("#engineerSignUp").hide();
        $("#userDetailsForm").slideDown();
        break;
      default:
        alert("Error: " + typeOfUser + " not supported");
    }
  });
});
