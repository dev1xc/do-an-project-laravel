<script>
    $(document).ready(function () {
        $('div.carousel').find('img').click(function(){
            let id = $(this).attr('id')
            console.log(id);
            let getSrc = $(this).attr('src')
            console.log(getSrc);
            $('div.product-details').find('img').attr('src','getSrc')
        });
    });
</script>
