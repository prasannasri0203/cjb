@extends('front.app')

@section('title', '')

@section('header_script')


@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

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
                            <img src="images/help_banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/help_banner_mbl.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>{{ __('help.Need some help?') }} Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="item">
                            <img src="images/help_banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/help_banner_mbl.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption">
                                    <p>Need some help? Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                    <div class="advertise_btn">
                                        <a href="#">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/help_banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/help_banner_mbl.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption">
                                    <p>Need some help? Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                    <div class="advertise_btn">
                                        <a href="#">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/help_banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/help_banner_mbl.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption">
                                    <p>Need some help? Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                    <div class="advertise_btn">
                                        <a href="#">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->

        <!--Help Guide -->
        <div class="cash_steps container help_guides">
            <div class="row no-margin">
                <div class="container">

                    <p class="title"> {{ __('help.Help & support Center') }}</p>
                    <div class="help_guides_content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="help_steps">
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                            <img src="images/helpguide_img4.png" alt="">
                            <p class="blue_clr">{{ __('help.Get in touch') }}</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <button class="registr_btn cht_mail_btn">{{ __('help.CHAT') }}</button> 
                            <button class="registr_btn cht_mail_btn" data-toggle="modal" data-target="#email_popup">
                            {{ __('help.EMAIL') }}</button>
                            
                        </div>
                    
                        <div class="col-lg-4 col-md-4  col-sm-12 steps-blk">
                            <img src="images/helpguide_img3.png" alt="">
                            <p class="blue_clr">{{ __('help.FAQs') }}</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <button class="registr_btn" ><a style="color: white;" href="{{route('faq')}}">{{ __('help.FIND OUT MORE') }}</a></button>
                        </div>
                        @foreach($data as $list)
                        <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                            <?php 
                            // $img = json_encode($list->images, true);
                            ?>
                            @foreach(json_decode($list->images) as $key => $image)
                            <img src="{{asset('uploads/'.$image)}}"/>
                            @endforeach
                            <p class="blue_clr">{{$list->name}}</p>
                            <!-- <p>{!!$list->content!!}</p> -->
                            <p> {!!substr($list->content,0,100)!!}</p>              

                            <button class="registr_btn"><a style="color:white;" href="{{ URL::to('detailpage/')}}/{{$list->id }}">{{ __('help.FIND OUT MORE') }}</a></button>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
        <!--Help Guide -->
        <div class="modal fade changeuser" id="email_popup" role="dialog">
        <div class="modal-dialog guestdia">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="media_gal">
                    <h4 class="modal-title">Return to Cool Jelly Bean</h4>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ url('enquiry_details') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="name">Name:</label>
                            <div class="col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name">
                           
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">Email:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input required type="input" class="form-control" name="email" >
                                @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="subject">Subject:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input required type="input" class="form-control" name="subject" >
                                @if ($errors->has('subject'))
                                    <div class="error">{{ $errors->first('subject') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="description">Remark:</label>
                            <div class="col-sm-9 col-xs-12">
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                @if ($errors->has('descriptions'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button class="btn btn-default" type="submit">Save</button>
                                <a href="javascript:void(0);" class="btn btn-default exit_return">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="tooltip_content">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
        <!--video carousel -->
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
                                $video_id = $video_id[1];
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
        <!--video carousel -->
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
    
    <script>
        $('#demo').RollingSlider({
            showArea: "#example",
            prev: "#jprev",
            next: "#jnext",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript">
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400,
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
            $('body').on('click', '.video', function () {
                    var theModal = $(this).data("target"),
                    videoSRC = $(this).attr("data-video"),
                    videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                    $(theModal + ' iframe').attr('src', videoSRCauto);
                    $(theModal + ' button.close').click(function () {
                    $(theModal + ' iframe').attr('src', videoSRC);
                    });
            });   
        });
    </script>
         <script>
   $("#messages").click(function(){
    $("#message").toggle();
});
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    @if ($message = Session::get('success'))
    <script type="text/javascript">
         iziToast.success({
             title: 'Success',
             message: '{{ $message }}',
             position: 'topRight',
         });

    </script>
    @endif
    @if ($message = Session::get('failure'))
    <script type="text/javascript">
        iziToast.error({
            title: 'Error',
            message: '{{ $message }}',
             position: 'topRight',
        });
    </script>
    @endif
    <style type="text/css">
        .banner .item .caption.hlp_caption {
            width: 650px!important;
        }
        
        .banner .item .caption.hlp_caption p {
            font-family: 'rubik-bold';
            line-height: 50px;
        }
        
        .banner .item .caption.hlp_caption {
            align-self: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            top: 0;
            width: 500px;
        }
        
        @media only screen and (max-width: 767px) {
            .banner .item .caption.hlp_caption {
                width: 80%!important;
                justify-content: end;
                top: 55px;
            }
            body .banner .item .caption p {
                font-size: 30px !important;
                line-height: 40px !important;
                margin-top: -25px;
            }
            .cash_steps.help_guides {
                border-top: none!important;
            }
        }
    </style>
@endsection