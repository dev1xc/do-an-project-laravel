<script>
    $(document).ready(function () {
        $.ajax({
                type: "GET",
                url: "/get-price-range",
                data: {
                    id: id,
                },
                success: function (response) {
                    console.log(response);
                }
            });
    });
</script>
