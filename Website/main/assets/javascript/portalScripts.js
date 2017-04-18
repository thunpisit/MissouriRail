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

    $("#myReservation").click(function(){
      $.ajax({
         url: 'controller.php',
         data: {action: 'getMyReservations'},
         type: 'post',
         success: function(output) {
                    $(".modal-body").html(output);
                  }
      });
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

    $("#basicInfoBtn").click(function(){
      $("#editBtn").show();
    });

    $("#editBtn").click(function(){
      $("#editBtn").html("Save").removeClass("btn-info").addClass("btn-success");
      $(".modalInput").removeAttr("readonly");
      $("#editBtn").click(function(){
        $(".modalInput").attr("readonly", true);
        if($("#typeOfUser").val() == 'engineer'){
        first_name = $("#first_name").val();
        last_name = $("#last_name").val();
        status = $("#status").val();
        rank = $("#rank").val();
        hours = $("#hours").val();
        $.ajax({
           url: 'controller.php',
           data: {action: 'updateInfo',
                  first_name: first_name,
                  last_name: last_name,
                  status: status,
                  rank: rank,
                  hours: hours},
           type: 'post',
           success: function(output) {
                    console.log(output);
                    $("#editBtn").html("Changes Saved").removeClass("btn-success").addClass("btn-info");
                    $.ajax({
                       url: 'controller.php',
                       data: {action: 'getInfo'},
                       type: 'post',
                       success: function(output) {
                                  $("#information").html(output);
                                }
                    });
                    }
        });
      } else if($("#typeOfUser").val() == 'customer'){
        first_name = $("#first_name").val();
        last_name = $("#last_name").val();
        phone_number = $("#phone_number").val();
        address = $("#address").val();
        $.ajax({
           url: 'controller.php',
           data: {action: 'editCustomer',
                  first_name: first_name,
                  last_name: last_name,
                  phone_number: phone_number,
                  address: address},
           type: 'post',
           success: function(output) {
                    console.log(output);
                    $("#editBtn").html("Changes Saved").removeClass("btn-success").addClass("btn-info");
                    $.ajax({
                       url: 'controller.php',
                       data: {action: 'getInfo'},
                       type: 'post',
                       success: function(output) {
                                  $("#information").html(output);
                                }
                    });
                    }
        });
      } else if($("#typeOfUser").val() == 'conductor'){
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
                  rank: rank,
                  hours: 0},
           type: 'post',
           success: function(output) {
                    console.log(output);
                    $("#editBtn").html("Changes Saved").removeClass("btn-success").addClass("btn-info");
                    $.ajax({
                       url: 'controller.php',
                       data: {action: 'getInfo'},
                       type: 'post',
                       success: function(output) {
                                  $("#information").html(output);
                                }
                    });
                    }
        });
      }
        $("#closeModal").click(function(){
          $("#editBtn").html("Edit").hide();
        });
      });
    });


});// end document ready

function fillModalInfo(first_name, last_name, status, rank){
  $(".modal-title").html('Your Information');
  $("#editCustomerBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#status").val(status).attr("readonly", true);
  $("#rank").val(rank).attr("readonly", true);
  $("#typeOfUser").val("conductor");
}

function fillModalInfoEngineer(first_name, last_name, status, rank, hours){
  $(".modal-title").html('Your Information');
  $("#editCustomerBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#status").val(status).attr("readonly", true);
  $("#rank").val(rank).attr("readonly", true);
  $("#hours").val(hours).attr("readonly", true);
  $("#typeOfUser").val("engineer");
}

function fillModalInfoCustomer(first_name, last_name, phone_number, address){
  $(".modal-title").html('Your Information');
  $("#editBtn").html("Edit");
  $("#first_name").val(first_name).attr("readonly", true);
  $("#last_name").val(last_name).attr("readonly", true);
  $("#phone_number").val(phone_number).attr("readonly", true);
  $("#address").val(address).attr("readonly", true);
  $("#typeOfUser").val("customer");
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

function reserveCar(serial_num){
  // console.log(serial_num);
  $.ajax({
    url: 'controller.php',
    data:{action: 'getCarInfo',
          serial_num: serial_num,
          type: 'form'},
    type: 'post',
    success: function(output) {
      // console.log(output);
      $(".modal-body").html(output);
      $("#editBtn").html("Confirm Reservation").show();
    }
  });
  $("#editBtn").click(function(){
    $("#editBtn").html("Edit").hide();
    $.ajax({
      url: 'controller.php',
      data:{action: 'reserveCar',
            serial_num: serial_num},
      type: 'post',
      success: function(output) {
        // console.log(output);
        $(".modal-body").html(output);
      }
    });
  });

}
