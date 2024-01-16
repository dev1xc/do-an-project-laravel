<script>
    $(document).ready(function () {
        $('a.cart_quantity_up').click(function() {
            let id = $(this).closest('tr').attr('id')
			let now = $('tr.' + id).find('input.cart_quantity_input').val()
			now++
            console.log(id);
        })
    });
</script>
