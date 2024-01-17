<script>
    $(document).ready(function () {
        $('div.carousel').find('img.hinh_50').click(function(){
            let id = $(this).attr('id')
            console.log(id);
            let getSrc = $(this).attr('src')
            console.log(getSrc);
            getSrc = getSrc.replace('hinh50_','')
            $('div.product-details').find('img.base_picture').attr('src',getSrc)
        });
    });
</script>
