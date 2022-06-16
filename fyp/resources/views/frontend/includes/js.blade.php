<script src="{{ asset('FrontEnd/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/main.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/Js.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/styleswitcher.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/jquery.sticky-kit.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('FrontEnd/assets/js/jquery.countTo.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $('.btn-wishlist').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var user = $(this).attr('user');
        let item = $(this).attr('item');
        let value = {
            user: user,
            item: item
        }
        $.ajax({
            url: "/wishlist",
            data: value,
            datatype: 'json',
            type: "GET",
            success: function(data) {
                if (data.message == 'not logged in') {
                    window.location.href = '/login';
                } else {
                    alert('Product added to wishlist')

                }
            },
            error: function(data) {
                alert('Error while adding product to whishlist')
            }
        })
    });
</script>
<script>
$('.btn-cart').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var user = $(this).attr('user');
        let item = $(this).attr('item');
        let value = {
            user: user,
            item: item
        }
        $.ajax({
            url: "/cart",
            data: value,
            datatype: 'json',
            type: "GET",
            success: function(data) {
                if (data.message == 'not logged in') {
                    window.location.href = '/login';
                } else {
                    alert('Product successfully added to cart')

                }
            },
            error: function(data) {
                alert('Error in adding cart')
            }
        })
    });
</script>