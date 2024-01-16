<script>
    $(document).ready(function(){
        $("div.product_overlay ").click(function(){
            var getId =$(this).attr("id");
            // ajax(va nó chạy ngầm , giong form:)
            let countItem = $('div.shop-menu').find('li:eq(3)').find('a').text();
            countItem ++

            $('div.shop-menu').find('li:eq(3)').find('a').text(countItem)
            console.log(countItem);
        //     $.ajax({
        //         method: "POST",
        //         url: "ajax-handle-cart.php", //	k co html va chi chay ngầm
        //         data: {
        //             xx: getId,
        //             yy: countItem,
        //         },
        //         success : function(res){
        //             // ket qua ben php tra ve lai
        //             console.log(res)
        //             // $("a")
        //         }
        //     });
        // });
    });
</script>
