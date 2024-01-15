<script>
    $(document).ready(function () {
        var data = $('#sl2').attr('data-slider-value');
        $.ajax({
                type: "GET",
                url: "/get-rate-star",
                data: {
                    rate: Values,
                },
                success: function (response) {
                    console.log(Values);
                }
            });
    });
</script>
