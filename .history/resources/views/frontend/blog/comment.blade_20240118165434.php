<script>
$(document).ready(function(){
 $('a.reply_comment').click(function () {
    let id = let id = $(this).closest('tr').attr('id')
    if ($('.replay-box-son').is(':hidden')) {
        $('.replay-box-son').show();
    } else {
        $('.replay-box-son').hide();
    }
  });
});

</script>
