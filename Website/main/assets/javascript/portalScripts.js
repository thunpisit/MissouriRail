$(function(){
  $("#companyForm, #locationSelect").hide();
    $.ajax({
       url: 'controller.php',
       data: {action: 'getInfo'},
       type: 'post',
       success: function(output) {
                  $("#information").html(output);
                }
    });

    $("#newReserveBtn").click(function(){
      $("#locationSelect").show();
      $("#editBtn").hide();
      $(".modal-title").html("Reserve a car");
      $("#companyForm").slideToggle('slow');
      preLoadModal = $(".modal-body").html();
      $("#submitCompanyID").click(function(){
        company_id = $("#company_id").val();
        $.ajax({
          url: 'controller.php',
          data:{action: 'getCars',
                company_id: company_id,
                location: 'all'},
          type: 'post',
          success: function(output) {
            $(".modal-body").html(output);
          }
        });


        $("#closeModal").click(function(){
          $(".modal-body").html(preLoadModal);
        });
      });
    });


    $("#editBtn").click(function(){
      $("#editBtn").html("Save").removeClass("btn-info").addClass("btn-success");
      $(".modalInput").removeAttr("readonly");
      $("#editBtn").click(function(){
        first_name = $("#first_name").val();
        last_name = $("#last_name").val();
        status = $("#status").val();
        rank = $("#rank").val();
        $.ajax({
           url: 'controller.php',
           data: {action: 'updateInfo',
                  first_name: first_name,
                  last_name: last_name,
                  status: status,
                  rank: rank},
           type: 'post',
           success: function(output) {
                    console.log(output);
                    $("#editBtn").html("Changes Saved").removeClass("btn-success").addClass("btn-info");
                    }
        });
        $("#closeModal").click(function(){
          $("#editBtn").html("Edit").hide();
        });
      });
    });


});

function fillModalInfo(first_name, last_name, status, rank){
  $(".modal-title").html('Your Information');
  $("#editCustomerBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#status").val(status).attr("readonly", true);
  $("#rank").val(rank).attr("readonly", true);
}

function fillModalInfoEngineer(first_name, last_name, status, rank, hours){
  $(".modal-title").html('Your Information');
  $("#editCustomerBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#status").val(status).attr("readonly", true);
  $("#rank").val(rank).attr("readonly", true);
  $("#hours").val(hours).attr("readonly", true);
}

function fillModalInfoCustomer(first_name, last_name, phone_number, address){
  $(".modal-title").html('Your Information');
  $("#editCustomerBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#phone_number").val(phone_number).attr("readonly", true);
  $("#address").val(address).attr("readonly", true);
}

function refreshTable(){
  $.ajax({
     url: 'controller.php',
     data: {action: 'getInfo'},
     type: 'post',
     success: function(output) {
                $("#information").html(output);
              }
  });
}

function getVal(option){
  // console.log(option.value);
  var location = option.value;

  $.ajax({
    url: 'controller.php',
    data:{action: 'getCars',
          company_id: company_id,
          location: location},
    type: 'post',
    success: function(output) {
      console.log(output);
      $(".modal-body").html(output);
    }
  });
}
