<script>
    $(document).ready(function () {
        $('a.cart_quantity_up').click(function() {
            let id = $(this).closest('tr').attr('class')
				let now = $('tr.' + id).find('input.cart_quantity_input').val()
				now++
        })
    });
</script>
