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
            $.ajax({
                type: "method",
                url: "url",
                data: "data",
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
            console.log(id);
            console.log(now);
        })
    });
</script>
