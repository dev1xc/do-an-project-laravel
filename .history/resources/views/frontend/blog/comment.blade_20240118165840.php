<script>
$(document).ready(function(){
 $('a.reply_comment').click(function () {
    let id = $(this).closest('li').attr('id')
    if ($('li'+id).is(':hidden')) {
        $('.replay-box-son').show();
    } else {
        $('.replay-box-son').hide();
    }
  });
});

</script>
