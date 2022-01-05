@extends('front.app')

@section('title', '')

@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content') 
<div class="sec-overback payment-div">
    <div class="banner wishbanner">
        <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
            <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                <!-- indicators -->
                <ul class="carousel-indicators">
                    <li class="" data-target="#headcarouselid" data-slide-to="0"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                    <li class="active" data-target="#headcarouselid" data-slide-to="2"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/checkout_completed.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout_completed.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('cart.Thanks') }} !</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!---checkout_loggedin--->
    <section id="checkout_completed_log" class="container_default_custom">
        <div class="log-out">
            <h3>{{ __('cart.Your order has been sent') }}!</h3>
            <p>{{ __('cart.You will receive a confirmation email with full details as soon as we have processed your order') }} </p>
            <div class="btn_cards"><a href="{{ url('') }}">{{ __('cart.CONTINUE SHOPPING') }}</a></div>
        </div>
    </section>
</div>
@endsection
@section('footer_script')

    <script>
        $('#demo').RollingSlider({
            showArea: "#example ",
            prev: "#jprev ",
            next: "#jnext ",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript ">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
@endsection