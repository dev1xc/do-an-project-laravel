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
 $('#button').click(function () {
    if ($('.text').is(':hidden')) {
        $('.text').show();
    } else {
        $('.text').hide();
    }
  });
});

</script>
