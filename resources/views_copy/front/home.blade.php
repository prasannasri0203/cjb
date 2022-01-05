@extends('front.app')

@section('title', '')

@section('header_script')
    <style>
  .mrs_hinch  button.btn.btn-primary:focus {
    color: #09adea;
}
#myNavbar .mrs_hinch ul.dropdown-menu.inits
{
    display:block;
}
.dropdown.mrs_hinch .btn-primary.dropdown-toggle {
    width: 120px !important;
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
}
    </style>

@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')
        <!--Page Content Start-->
        <!--banner carousel -->
        <div class="banner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                    <!-- indicators -->
                    <ul class="carousel-indicators">
                        <li class="active" data-target="#headcarouselid" data-slide-to="0"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="2"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                    </ul>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption">
                                    <p>{{ __('home.So you have your fans and followers – now earn money selling your personalised products') }}...</p>
                                    <div class="advertise_btn"><a class="regModel">{{ __('home.Register Now') }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption">
                                    <p>{{ __('home.So you have your fans and followers – now earn money selling your personalised products') }}...</p>
                                    <div class="advertise_btn"><a class="regModel">{{ __('home.Register Now') }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption">
                                    <p>{{ __('home.So you have your fans and followers – now earn money selling your personalised products') }}...</p>
                                    <div class="advertise_btn"><a class="regModel">{{ __('home.Register Now') }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption">
                                    <p>{{ __('home.So you have your fans and followers – now earn money selling your personalised products') }}...</p>
                                    <div class="advertise_btn"><a class="regModel">{{ __('home.Register Now') }}</a></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->

        <!--cash steps -->
        <div class="cash_steps create_page">
            <div class="row no-margin">
                <div class="container">

                    <p class="title">{{ __('home.Turn your popularity into cash with') }}
                        <span class="blue_clr">{{ __('home.no risk') }} </span>  {{ __('home.or investment') }}</p>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/one_circle.png" alt="">
                        <p>{{ __('home.Create Your page') }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk ">
                        <img src="images/two_circle.png" alt="">
                        <p>{{ __('home.Upload Your artwork') }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk ">
                        <img src="images/three_circle.png" alt="">
                        <p>{{ __('home.Sell your Stuff') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--cash steps -->

        <!--video carousel -->

        @if($featured_count > 0)
        <section id="responsiveGallery-container" class="responsiveGallery-container">
            <div class="container">
                <p class="text-center responseGalleryText">
                    Lorem ipsum dolor sit amet, consectetur elit...
                </p>
                <a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);">
                    <i class="fas fa-angle-left" style="font-size:120px;color:#2196F3"></i>
                </a>
                <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);">
                    <i class="fas fa-angle-right" style="font-size:120px;color:#2196F3"></i>
                </a>

                <ul class="responsiveGallery-wrapper">
                @foreach ($featured_video as $video )
                    @php

                        $link = $video->video_link;
                            $video_id = explode("?v=", $link);
                            if(count($video_id)>1){
                                $video_id = $video_id[1];
                            }
                            else{
                                $video_id = $video_id[0];
                            }
                            $url = Str::after($video->video_link, '=');
                    @endphp
                    <li class="responsiveGallery-item">
                        <button class="btn btn-primary btn-sm video" data-video="{{ 'https://www.youtube.com/embed/'.$url }}" data-toggle="modal" data-target="#videoModal">
                            <img src="https://img.youtube.com/vi/{{$video_id}}/0.jpg" width="496" height="283" alt="" class="responsivGallery-pic">
                        </button>
                    </li>

                @endforeach
                </ul>
            </div>
        </section>
        @endif
        <!--video carousel -->

        <!--Image carousel -->
        @if($categories_count > 0)
        <div class="carousel Image_carousel">
            <p class="text-center">
                <span class="rosepnk_clr">{{ __('home.Personalise') }}</span>{{ __('home.your own collection of products and') }}
                <span class="rosepnk_clr">{{ __('home.sell') }}</span> {{ __('home.them') }}...
            </p>
            <section id="img_demo">
                <div class="row">
                    <div class="large-12 columns">

                        <div class="owl-carousel">
                        @foreach($categories as $category)
                            <div class="item">
                                <a href="{{ URL('merch_sub_category/'.$category->id) }}" data-panel="0"> <img src="{{ asset('category/').'/'.$category->category_image }}" alt=""> </a>
                            </div>
                        @endforeach
                        </div>

                        <div class="slider-container">
                            <input class="range-slider" type="range" id="range" value="7" name="range" min="0" step="1" max="14" />

                        </div>

                    </div>
                </div>

            </section>
        </div>
        @endif
        <!--Image carousel -->

        <!--Help Guide -->
        <div class="cash_steps help_guides">
            <div class="row no-margin">
                <div class="container">

                    <p> {{ __('home.Need more info? Have a look at our') }}
                        <span class="rosepnk_clr">{{ __('home.help guides') }}..</span>
                    </p>

                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/helpguide_img1.png" alt="">
                        <p class="blue_clr">{{ __("home.Who's it for?") }}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingdncididunt.</p>
                        <div class="btn_cards"><a href="{{ URL::to('detailpage/9')}}">READ MORE</a></div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/helpguide_img2.png" alt="">
                        <p class="blue_clr">{{ __('home.How does it work?') }}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                       <div class="btn_cards"><a href="{{ URL::to('detailpage/10')}}">READ MORE</a></div>
                    </div>
                    <div class="col-lg-4 col-md-4  col-sm-12 steps-blk">
                        <img src="images/helpguide_img3.png" alt="">
                        <p class="blue_clr">{{ __('home.FAQs') }}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <a style="color:white;" href="{{ URL('faq') }}"> <button class="registr_btn">{{ __('home.FIND OUT MORE') }} </a> </button>
                    </div>
                </div>
            </div>

        </div>
        <!--Help Guide -->

        <!--Page Content End-->
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#cartoonVideo").attr('src');


        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#myModal").on('hide.bs.modal', function(){
            $("#cartoonVideo").attr('src', '');

        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            $("#cartoonVideo").attr('src', url);

        });
    });
    </script>

    <script>
        $(document).ready(function() {
            $('body').on('click', '.video', function () {
                var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                $(theModal + ' iframe').attr('src', videoSRCauto);
                $(theModal + ' button.close').click(function () {
                $(theModal + ' iframe').attr('src', videoSRC);
                });
            });
            $('#myModal').on('shown.bs.modal', function () {
            $('#video1')[0].play();
    var playPromise = video.play();

  if (playPromise !== undefined) {
    playPromise.then(_ => {
      // Automatic playback started!
      // Show playing UI.
    })
    .catch(error => {
      // Auto-play was prevented
      // Show paused UI.
    });
  }
  })
  $('#myModal').on('hidden.bs.modal', function () {
    $('#video1')[0].pause();
  })




            $("input").on("change", function(e) {
                e.preventDefault();
                // console.log(inputType.val());

                $('.owl-carousel').trigger('to.owl.carousel', [inputType.val(), 1, true]);

            });
        });
    </script>
    <!--bannaer carousel-->

    <!--bannaer carousel-->

    <!-- video carousel -->
    <script>
        // $('#demo').RollingSlider({
        //     showArea: "#example",
        //     prev: "#jprev",
        //     next: "#jnext",
        //     moveSpeed: 300,
        //     autoPlay: true
        // });
    </script>
    <!-- video carousel -->

    <!-- image carousel -->
    <!-- owl carousel-->
    <script>
        $(document).ready(function() {

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 7,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
            // $("div#myNavbar .mrs_hinch .btn").click(function(){
            //   $("div#myNavbar .mrs_hinch .dropdown-menu").toggleClass("inits");
            // });
        })
    </script>
    <!-- owl carousel-->

    <script>
        $(".logModal").click(function() {
            $("#myModal").show();
        });



        $(".fa-info-circle").mouseover(function() {
            $(".tooltip_content").show();
        });

        $(".fa-info-circle").mouseout(function() {
            $(".tooltip_content").hide();
        });

        $(".close").click(function() {
            $("#myModal").hide();
        });
    </script>
    <!-- Login -->
    <!-- register -->
    <script>
        $(".regModel").click(function() {
            $("#regModal").show();
        });

        $(".info1").mouseover(function() {
            $(".tp1").show();
        });

        $(".info1").mouseout(function() {
            $(".tp1").hide();
        });


        $(".info2").mouseover(function() {
            $(".tp2").show();
        });

        $(".info2").mouseout(function() {
            $(".tp2").hide();
        });

        $(".close").click(function() {
            $("#regModal").hide();
        });


        $(".navbar-toggle").click(function() {
            $("#myNavbar").slideToggle();
        });


    </script>
    <!-- register -->

    <!-- thanks -->
    <script>
        $(".thankModel").click(function() {
            $("#thankModel").show();
        });

        $(".close").click(function() {
            $("#thankModel").hide();
        });
    </script>
    <!-- thanks -->


    <script>
        $(document).ready(function() {
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function() {
                if (isOpen == false) {
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });
        });
    </script>

<style>
        .bs-example{
            margin: 20px;
        }
        .modal-content iframe{
            margin: 0 auto;
            display: block;
        }
        button.btn.btn-default.sub_search {
    background-image: linear-gradient(to bottom, #0fb4f1, #0cb0ee, #08adea, #04a9e7, #01a6e3);
    height: 36px;
    width: 35px;
    }
    button.btn.btn-default.sub_search i{
        color:#fff;
    }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400,
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
        });
    </script>
    <script>
// The number of characters
var namelength = 9;

$('.mrs_hinch button').filter(function() {
    return $(this).text().length > namelength;
}).addClass('contentAddclass');
</script>


    <!-- Footer Script End -->
@endsection

