@extends('front.app')

@section('title', 'Faq')

@section('header_script')
    <!-- Header Script Start -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="{{ asset('js/custom.js') }}"></script>
    <style type="text/css">
        /*        .nav {
    padding-left: 0px!important;
}

.navbar-header .navbar-brand{
        margin-top: 6px;
}

header .navbar-nav {
    top: -5px;
}

header .navbar-nav.navbar-right
{
    top: 5px!important;
}*/

        .banner .item .caption {
            width: 45%!important;
            font-family: 'Rubik-Bold';
        }

        .carousel .carousel-inner .item img {
            height: 480px;
        }

        .banner .item .caption p {
            font-size: 44px;
            line-height: 50px;
        }

        .cash_steps .help_guides_content p {
            font-size: 16px;
            line-height: 23px;
        }

        .cash_steps p.title {
            margin-bottom: 30px;
            font-size: 30px;
            margin-top: 30px;
        }

        .panel-group.faq-accordion .panel-default a.accord_ques {
            font-size: 22px;
        }

        .help_guides {
            margin-top: 0px !important;
        }

        @media only screen and (max-width: 767px) {
            body .banner .item .caption p {
                font-size: 30px!important;
                line-height: 40px!important;
            }
            .banner .item .caption.faq_caption {
                width: 90%!important;
            }
        }
    </style>

    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
 <!--banner carousel -->
        <div class="banner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide merch_content" data-ride="carousel">
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
                            <img src="{{ asset('images/faq_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/faq_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container"> 
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/faq_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/faq_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/faq_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/faq_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/faq_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/faq_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Need some help? Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->

        <!--Page Content Start-->
        <div class="cash_steps container help_guides main_faq">
            <div class="row no-margin">
                <div class="container" style="float: left;width: 100%;">  

                    <p class="title">{{ __('faq.FAQs') }}</p>

                    <div class="help_guides_content faq_conent">
                    <form class="form-horizontal" method="any" action="{{ route('faq') }}">
 <input class="form-control" type="text" name="search_text" placeholder="Search" aria-label="Search" style="width:300px; max-width:100%;margin-left:auto;margin-bottom:20px;" value="{{Request::get('search_text')}}">
</form>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <?php $x = 1; $y=1; ?>

                    <?php
                    // $data1 =App\Faq::whereNull('deleted_at')->orderBy('id', 'asc')->get();
                    // $title = [];
                    // foreach ($data1 as $key => $value) {
                    //     if (!in_array($value->title, $title))
                    //     {
                    //         $title[] = $value->title;
                    //     }
                    // }
                    // $data2=array_filter($title);
                ?>

                    @foreach($data as $list)
                    <div class="panel-group faq-accordion" id="accordion">
                        <div class="panel panel-default">
                            <a data-toggle="" id="faq_head{{$x}}" data-parent="#accordion" href="#faq{{$x}}" class="accord_ques">{{$list}}
                                    <i class="fa fa-arrow-circle-down arrow_down"></i>
                            </a>
                            <div  id="faq{{$x}}" class="panel-collapse collapse">

                            <?php $question = \App\Faq::where(['title' => $list])->get();

                            for($i=0; $i<count($question); $i++)
                            {
                            ?>

                                <div class="panel-body" >
                                        <div data-toggle="collapse" data-parent="faq{{$x}}" href="#final{{$i}}"><p><b>Title:</b></p> <?php print_r($question[0]['question']); ?>
                                        </div>
                                </div>
                            <?php $answer = \App\Faq::where(['question' => $question[0]['question']])->get();

                            for($j=0; $j<count($answer); $j++)
                            {
                            ?>
                                <div id="final{{$i}}" class="panel-collapse collapse in">
                                    <div class="panel-body">{!!$answer[0]['answer']!!}</div>
                                </div>
                             <?php } ?>
                            <?php } ?>
                            </div>
                        </div>

                    </div>
                   <?php $x++; ?>
                    @endforeach

                </div>
            </div>

        </div>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script>
        //accord
        $('.accord_ques').on('click', function() {
            var id = $(this).attr('href');

            if($(id).hasClass('in')){
               $(id).removeClass('in')
            }
            else
            {
                $(id).addClass('in')
            }

            if ($('.arrow_down', this).hasClass('arrow_up')) {

                $('.arrow_down', this).removeClass('arrow_up');
            } else {
                $('.arrow_down').removeClass('arrow_up');

                $('.arrow_down', this).addClass('arrow_up');
            }
        });
    </script>
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
                submitIcon.mouseup(function() {
                    return false;
                });
                searchBox.mouseup(function() {
                    return false;
                });
                $(document).mouseup(function() {
                    if (isOpen == true) {
                        $('.searchbox-icon').css('display', 'block');
                        submitIcon.click();
                    }
                });
            });

            function buttonUp() {
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if (inputVal !== 0) {
                    $('.searchbox-icon').css('display', 'none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display', 'block');
                }
            }
        </script>
    <!-- Login -->
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

    <!-- Footer Script End -->
@endsection

