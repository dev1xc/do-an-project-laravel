<script>
$(document).ready(function(){
 $('a.btn.btn-primary.reply_comment').click(function () {
    let id = $(this).closest('div').attr('id')
    if ($('li#'+id).find().is(':hidden')) {
        $('.replay-box-son').show();
    } else {
        $('.replay-box-son').hide();
    }
  });
});

</script>
