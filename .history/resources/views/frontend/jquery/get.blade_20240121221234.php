<script>
    $(document).ready(function () {
        $.ajax({
                type: "GET",
                url: "/get-price-range",
                data: {
                    id: id,
                    qty: objCha[id]['qty'],
                },
                success: function (response) {
                    console.log(response);
                }
            });
    });
</script>
