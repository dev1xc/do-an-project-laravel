<script>
    $(document).ready(function () {
        $('div.carousel').find('img').click(function(){
            let id = $(this).attr('id')
            console.log(id);
            $('div.product-details').find('img')
        });
    });
</script>
