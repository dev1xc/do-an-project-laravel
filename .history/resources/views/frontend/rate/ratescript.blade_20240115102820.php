<script>
    if(screen.width <= 736){
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
    }
</script>
<link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('rate/js/jquery-1.9.1.min.js') }}"></script>

<script>
    @if (session()->exists('HasSignIn'))
    $(document).ready(function(){
        //vote
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote');
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

        $('.ratings_stars').click(function(){
            var Values =  $(this).find("input").val();
            alert(Values);
            if ($(this).hasClass('ratings_over')) {
                $('.ratings_stars').removeClass('ratings_over');
                $(this).prevAll().andSelf().addClass('ratings_over');
            } else {
                $(this).prevAll().andSelf().addClass('ratings_over');
            }
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
    });
</script>

@endif

@if (!session()->exists('HasSignIn'))
    @php
                return redirect('/sign-in')->with('error','');

    @endphp
@endif
