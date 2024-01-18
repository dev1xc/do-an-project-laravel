<script>
$(document).ready(function(){
 $('a.btn.btn-primary.reply_comment').click(function () {
    let id = $(this).closest('div').attr('id')
    if ($('div#'+id+'.media-body').find('a#'+id).is(':hidden')) {
        $('div#'+id+'.replay-box-son').hide();
    } else {
        $('div#'+id+'.replay-box-son').hide();
    }
    console.log(id);
    let id2 = $('div#'+id+'.media-body').find('a#'+id).attr(id)
    console.log(id);
  });
});

</script>
