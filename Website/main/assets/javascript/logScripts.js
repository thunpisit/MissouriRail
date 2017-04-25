$(function(){
  $("#logBtn").click(function(){
    preLogModalBody = $(".modal-body").html();
    $(".modal-title").html("User Logs");
    $("#deleteBtn, #createBtn, #editCustomerBtn").hide();
    $.ajax({
       url: 'controller.php',
       data: {action: 'printLog'},
       type: 'post',
       success: function(output) {
                    // console.log(output);
                    // $("#logTable").html(output);
                    $(".modal-body").html(output);
                    $('#modal').on('show.bs.modal', function () {
                           $(this).find('.modal-body').css({
                                  width:'auto', //probably not needed
                                  height:'auto', //probably not needed
                                  'max-height':'100%'
                           });
                    });
                    $("#closeModal").click(function(){
                      $(".modal-body").html(preLogModalBody);
                      $("#deleteBtn, #createBtn, #editCustomerBtn").show();
                      $("#modal").modal('hide');
                    });
                }
    });
  });
});
