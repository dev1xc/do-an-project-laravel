<script>
    $(document).ready(function(){
    $("#reply_comment").click(function(){
    $(".replay-box-son").show();
  });
  $("#repy_comment").click(function(){
    $(".replay-box-son").attr("style", "display:none");
  });
});

$(document).ready(function(){
 $('#reply_comment').click(function () {
    if ($('.replay-box-son').is(':hidden')) {
        $('.replay-box-son').show();
    } else {
        $('.text').hide();
    }
  });
});

</script>
