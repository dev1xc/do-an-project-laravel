<script>
    $(document).ready(function () {
        var data = $('#sl2').attr('data-slider-value');
        $.ajax({
                type: "GET",
                url: "/get-price-range",
                data: {
                    price: data,
                },
                success: function (response) {
                    console.log(data);
                }
            });
    });
</script>
