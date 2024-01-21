<script>
    $(document).ready(function () {
        $.ajax({
                type: "GET",
                url: "/get-price-range",
                data: {
                    {data: data}
                },
                success: function (response) {
                    alert(data[0]);
                }
            });
    });
</script>
