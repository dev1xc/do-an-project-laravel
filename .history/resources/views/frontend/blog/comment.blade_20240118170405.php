<script>
$(document).ready(function(){
 $('a.btn.btn-primary.reply_comment').click(function () {
    let id = $(this).closet('div').attr('id')
    if ($('div#'+id+'.media-body').find('a#'+id).is(':hidden')) {
        $('.replay-box-son').show();
    } else {
        $('.replay-box-son').hide();
    }
  });
  console.log(id);
});

</script>
