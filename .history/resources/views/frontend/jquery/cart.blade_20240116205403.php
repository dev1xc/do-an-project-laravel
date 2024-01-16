<script>
    $(document).ready(function () {
        $('a.cart_quantity_up').click(function() {
            let id = $(this).closest('tr').attr('id')
			let now = Number($('tr#' + id).find('input.cart_quantity_input').val())
            let price = Number($('tr#' + id).find('td.cart_price p').text())
			now++
            $('tr#' + id).find('input.cart_quantity_input').val(now)
            let cart_total_price = now * price
            $('tr#' + id).find('p.cart_total_price').text(cart_total_price)
            console.log(id);
            console.log(now);
            let getSLCart = localStorage.getItem('demSLCart')
            $.ajax({
                type: "GET",
                url: "/get_cart_add",
                data: {
                    id:id,
                    quantity: now,

                },
                dataType: "dataType",
                success: function (response) {

                }
            });
        })
        $('a.cart_quantity_down').click(function() {
            let id = $(this).closest('tr').attr('id')
			let now = Number($('tr#' + id).find('input.cart_quantity_input').val())
            let price = Number($('tr#' + id).find('td.cart_price p').text())
			now--
            $('tr#' + id).find('input.cart_quantity_input').val(now)
            $('tr#' + id).find('input.cart_quantity_input').val(now)
            let cart_total_price = now * price
            $('tr#' + id).find('p.cart_total_price').text(cart_total_price)
            if(now < 1) {
                $(this).closest('tr').remove()
            }
            console.log(id);
            console.log(now);
            $.ajax({
                type: "GET",
                url: "/get_cart_minus",
                data: {
                    id:id,
                    quantity: now,

                },
                dataType: "dataType",
                success: function (response) {

                }
            });
        })
        $('a.cart_quantity_delete').click(function () {
                let id = $(this).closest('tr').attr('id')
                $(this).closest('tr').remove()
                $.ajax({
                type: "GET",
                url: "/get_cart_delete",
                data: {
                    id:id,

                },
                dataType: "dataType",
                success: function (response) {

                }
            });
			})
    });
</script>
