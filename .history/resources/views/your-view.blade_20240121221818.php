<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '{{ url('your-url') }}',
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
