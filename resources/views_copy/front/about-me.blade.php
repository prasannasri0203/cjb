@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- Header Script Start -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <!-- Font Awesome -->
    <!--5d slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-responsiveGallery.css') }}">
    <!--5d slider css-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--5d slider js-->
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.responsiveGallery.js') }}"></script>

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
        /*search tab*/
        $(document).ready(function() {
            $('.desktop_group').click(function() {
                $(".desktop_search_tab").slideToggle();
                $(".mob_search_tab").hide();
            });
            // $('.sub_search').click(function() {
            //     $(".desktop_search_tab").slideToggle();
            //     $(".mob_search_tab").hide();
            // });
            $('.mobile_group').click(function() {
                $(".mob_search_tab").slideToggle();
                $(".search_tab").hide();
            });


            $('.ipad_new_search .ipad_search').click(function() {
                $(".search_group input.form-control").show();
                if ($(".ipad_abs").length) {
                    $('.ipad_new_search').removeClass('ipad_abs');
                    //alert('bye' + $(".ipad_abs").length);
                    $(".search_group input.form-control").hide();

                } else {
                    $('.ipad_new_search').addClass('ipad_abs');
                    // alert('hi' + $(".ipad_abs").length);
                    $(".search_group input.form-control").show();


                }




            });



        });
        
        /*search tab*/
    </script>
    <!--5d slider js-->
    <style type="text/css">
        #demos .owl-nav .owl-prev, #demos .owl-nav .owl-next {
            top: 12%;
        }
        .theme{
            font-size: {{$theme->font_size}}px !important;
            color:{{$theme->font_colour}} !important;
            font-family: {{$theme->font_family}} !important;

        }
        .price_cart{
          background-color: {{$theme->content_layer_colour}} !important;
        }
        .theme a:hover{
            background-color: {{$theme->cart_colour}} !important;
        }
        .newbanner{
            background: #fff;
            background-size: initial;
            height: 370px;
            background-position: center;
            background-repeat: no-repeat;
            margin-top: 0px;
            position: relative;
            margin-bottom: 90px;
            width: 100%;
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
 
        <!--Page Content Start-->
    <section class="artist_header">
    <img src="{{ $theme->banner_image ? asset('images/').'/'.$theme->banner_image : asset('profile/artist-default-bg.png') }}" class="newbanner" alt="">
        <div class="container user_contain">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1 user_info">
                    <a><img src="{{ $user->profile_image ? asset('profile/').'/'.$user->profile_image : asset('images/userimg.png') }}" class="img-responsive user_img"></a>
                    <h2 class="theme">{{$user->name}}</h2>
                </div>
                <div class="col-md-3 col-sm-5 pull-right">
                    <ul>
                        <li>
                            <a class="theme" href="{{ URL('shop/'.$user->name) }}">{{ __('about-me.SHOP') }}</a>
                        </li>
                        <li class="active">
                            <a class="theme" href="#">{{ __('about-me.ABOUT ME') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--About me -->
    <div class="container_aboutme about_me_video filtersec">
        <!--About me content -->
        <div class="row">
            <div class="col-sm-7">
                <div class="about_cont">
                    <h3 class="theme">{{ __('about-me.About me') }}</h3>
                    {!!$user->about_me!!}
                </div>
                <!--video carousel -->
                @if(count($data))
                <section id="responsiveGallery-container" class="responsiveGallery-container">
                    <p class="title theme">{{ __('about-me.Videos') }}</p>
                    <a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);">
                        <i class="fas fa-angle-left" style="font-size:120px;color:#2196F3"></i>
                    </a>
                    <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);">
                        <i class="fas fa-angle-right" style="font-size:120px;color:#2196F3"></i>
                    </a>
                    <ul class="responsiveGallery-wrapper">
                        @foreach($data as $list)
                        <?php

                        $link = $list->link;
                        $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                        if (empty($video_id[1]))
                            $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

                        $video_id = explode("&", $video_id[1]); // Deleting any other params
                        $video_id = $video_id[0];

                        ?>
                        <li class="responsiveGallery-item">
                            <a data-video="https://www.youtube.com/embed/{{$video_id}}" data-toggle="modal" data-target="#videoModal" class="video">
                                <img src="https://img.youtube.com/vi/{{$video_id}}/hqdefault.jpg" width="496" height="283" alt="" class="responsivGallery-pic">
                            </a>

                        </li>
                        @endforeach
                    </ul>
                </section>
                @endif
                <!--video carousel -->
            </div>


            <div class="col-sm-5">
                <div class="stats_sociallink">
                    <div class="stats">
                        <p class="title theme">{{ __('about-me.Stats') }}</p>
                        {!!$user->about_stats!!}
                    </div>
                    <div class="stats_para">
                        <p class="title theme">Cras tincidunt aliquet</p>
                        {!!$user->about_desc!!}
                    </div>
                    <div class="social_link">
                        <p class="title theme">{{ __('about-me.Find me on Social Media') }}</p>
                        <a href="{!!$user->facebook_link!!}">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="{!!$user->twitter_link!!}">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                        <a href="{!!$user->instagram_link!!}">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="{!!$user->pinterest_link!!}">
                            <i class="fa fa-pinterest-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--About me content -->
        <!--Best seller carousel -->
        @if(count($product_data) > 0)

        <div class="container filtersec firstfilter">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h3 class="theme">{{ __('about-me.Best sellers') }}</h3>
                </div>

            </div>
        </div>
      <section id="demos" class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="owl-carousel owl-theme tshirt_sec">
               @foreach($product_data as $product_value)
                  <div class="item">
                     <div class="tshirt_cart add_bsk_btn">
                     @php
                    $cat_image = App\MerchandiseProductImages::where('merch_product_id',$product_value->product_id)->first();
                    @endphp
                    <img src="{!! $cat_image['image']  ? asset('merchandise-img/').'/'.$cat_image['image'] : asset('/images/mug.png') !!}" class="img-responsive uploadimg" />
                        <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                        <div class="price_cart">
                           <div class="row">
                              <div class="col-xs-7">
                              @php
                              $cat_price = App\MerchandiseProduct::where('product_id',$product_value->product_id)->first();
                              @endphp
                                 <p class="theme">{{ $cat_price->merchandise_product_name}}</p>
                                 <h4 class="theme">{{currency($cat_price->product_price, 'GBP', session()->get('my_currency'))}}</h4>
                              </div>
                              <div class="col-xs-5">
                                 <a href="#" data_id="{{ $cat_price->id }}" class="add_bsk theme1"><i class="fas fa-shopping-basket img-responsive themes" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         </div>
         </div>
      </section>
      @endif

        <!--Best seller carousel -->
    </div>
    <!--About me -->
        <!--Page Content End-->

        <!--youtube popup-->
        <div class="modal fade changeuser" id="youtubeModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Thanks for registering!</h4>
                        <p>We've emailed you a link to verify your account. Please check your email and follow the instructions.</p> -->
                        <iframe src="https://www.youtube.com/watch?v=9xwazD5SyVg" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!--youtube popup-->

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
    <!-- Footer Script Start -->
    <!--5d slider js-->
    <script src="{{ asset('js/owl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.responsiveGallery.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400,
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
        });

        // function youtubePopUp() {
        //     // var youtube_id = $(this).attr("y-id");
        //     // var modal = document.getElementById('youtubeModal');
        //     // modal.style.display = "block";
            
        //     var theModal = $(this).data("target"),
        //     videoSRC = $(this).attr("data-video"),
        //     alert(videoSRC);
        //     videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        //     $(theModal + ' iframe').attr('src', videoSRCauto);
        //     $(theModal + ' button.close').click(function () {
        //     $(theModal + ' iframe').attr('src', videoSRC);
        //     });

        // }
              $('body').on('click', '.video', function () {
                      var theModal = $(this).data("target"),
                      videoSRC = $(this).attr("data-video"),
                      videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                      $(theModal + ' iframe').attr('src', videoSRCauto);
                      $(theModal + ' button.close').click(function () {
                        $(theModal + ' iframe').attr('src', videoSRC);
                      });
              });         
    </script>
    <script>
$(document).ready(function(){
$(".logModal").click(function(){
$(".changelog").show();
});
$(".logclose").click(function(){
$(".changelog").hide();
});

});
</script>
    
    <!-- Footer Script End -->
@endsection