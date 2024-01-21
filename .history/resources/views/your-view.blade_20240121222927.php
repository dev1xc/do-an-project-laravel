<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '{{ url('price-range') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
</script>
<h1>Hekllo</h1>
