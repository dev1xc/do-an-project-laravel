<script>
    $(document).ready(function () {
        $.ajax({
                type: "GET",
                url: "/get-price-range",
                data: {
                    {data: data}
                },
                success: function (response) {
                    if(data == "success")
        alert(response);
                }
            });
    });
</script>
