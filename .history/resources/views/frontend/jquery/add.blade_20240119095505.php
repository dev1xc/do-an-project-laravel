<script>
    $(document).ready(function () {
        $('select#check_sale').click(function() {
            let option = $('select#check_sale').val()
            if(option == 1) {
                $('did#is_sale').show()
            }
            $('did#is_sale').hide()
        })
    });
</script>
