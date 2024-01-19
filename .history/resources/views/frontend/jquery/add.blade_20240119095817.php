<script>
    $(document).ready(function () {
        $('select#check_sale').click(function() {
            let option = $('select#check_sale').val()
            option = +option
            if(option == 1) {
                $('div#is_sale').show()
            }
            $('div#is_sale').hide()
            console.log(option);
        })
    });
</script>
