<script>
    $(document).ready(function () {
        $('a.cart_quantity_up').click(function() {
            let id = $(this).closest('tr').attr('id')
			let now = Number($('tr#' + id).find('input.cart_quantity_input').val())
            let price = Number($('tr#' + id).find('td.cart_price p').val())
			now++
            $('tr#' + id).find('input.cart_quantity_input').val(now)
            let cart_total_price = now *
            $('p.cart_total_price').text()
            console.log(id);
            console.log(now);
        })
        $('a.cart_quantity_down').click(function() {
            let id = $(this).closest('tr').attr('id')
			let now = Number($('tr#' + id).find('input.cart_quantity_input').val())
			now--
            $('tr#' + id).find('input.cart_quantity_input').val(now)
            console.log(id);
            console.log(now);
        })
    });
</script>
