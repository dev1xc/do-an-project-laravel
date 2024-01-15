<script>
    if(screen.width <= 736){
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
    }
</script>
<link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('rate/js/jquery-1.9.1.min.js') }}"></script>
@if (session()->exits('hasSignIn'))

@endif
