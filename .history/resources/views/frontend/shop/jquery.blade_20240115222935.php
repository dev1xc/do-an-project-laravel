<script>
    $(document).ready(function () {
        var data = $('#sl2').attr('data-slider-value');
        $.ajax({
                type: "GET",
                url: "/get-",
                data: {
                    rate: Values,
                },
                success: function (response) {
                    console.log(Values);
                }
            });
    });
</script>
