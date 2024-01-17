<script>
    $(document).ready(function () {
        $('div.carousel').find('img').click(function(){
            let id = $(this).attr('id')
            console.log(id);
            let getSrc =
            $('div.product-details').find('img').attr('src','')
        });
    });
</script>
