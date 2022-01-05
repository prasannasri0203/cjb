@extends('front.app')

@section('title', 'Emoji List')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" >
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        var win_width = $(window).width();

        $(document).on('ready', function() {

            if ($(window).width() < 991) {
                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });


            } else {
                if ($('.slider').hasClass('slick-initialized')) {
                    $('.slider').slick('unslick');
                }
            }

        });

        $(window).resize(function() {
            if ($(window).width() < 991) {

                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });


            } else {
                if ($('.slider').hasClass('slick-initialized')) {
                    $('.slider').slick('unslick');
                }
            }
        });
    </script>
    <script>
        /*search tab*/
        $(document).ready(function() {
            $('.desktop_group').click(function() {
                // $(".desktop_search_tab").slideToggle();
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

        $(document).ready(function(){
        $(".progress-bar").loading();
        $('input').on('click', function () {
             $(".progress-bar").loading();
        });
    });

        /*search tab*/
    </script>
    <style type="text/css">
        @media only screen and (max-width: 1024px)
 
        {
           table#DataTables_Table_0 td {
                padding-left: 10px !important;
            }
        }
        
    @media only screen and (max-width:600px)
    {
table#DataTables_Table_0 {
    width: 800px;
}
    }
        .banner img {
            object-fit: cover;
            height: 100%;
        }

        .banner .item {
            height: 350px;
        }

        .carousel-inner {
            height: 265px!important;
        }

        .carousel .carousel-inner .item img {
            height: 265px!important;
        }

        .dashboard-sec .banner .item .caption {
            width: 100%!important;
        }

        .caption .advertise_btn a {
            width: 200px;
            height: 40px;
            font-family: "Rubik-Regular";
            font-weight: 600;
            margin-top: 20px;
        }

        .mariki h1 {
            margin-top: 18px!important;
        }
        .edit_mb_space {
    background: #fff;
    padding-top: 15px;
}

table#DataTables_Table_0 thead th {
    background: #fff;
}

        @media only screen and (min-width:320px) and (max-width:767px) {
            .dash_art_mob .container.artist-dashboard .banner .advertise_btn a {
                margin: 0 auto;
                float: none;
            }
        }

        }
        

        
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')

@php
$activeSidebar = 'emojis';
@endphp

        <!--Page Content Start-->

        <!--dashboard artist-->
        <section class="sec-overback">
            <div class="dashboard-sec  slidpad">
                <div class="container">
                    <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">

                        @include('front.user-sidebar')
                        </div>

                        


                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <div class="edit_pf">
                                
                            <div class="tab-content">
                            <!--banner-->
                            <div class="container-fluid">
                                <h2 class="no-margin-bottom">{{ __("artist_emoji_list.Emoji's List") }}</h2>
                                <a href="{{ route('artist.emojiCreate') }}" class="btn btn-primary" style="float: right;margin-top: -50px;">Create Emoji</a>
                                <div class="status-section cate table-responsive">
                                            <table class="table table-bordered  emoji">
                                                    <thead>
                                                            <tr>
                                                                    <th>{{ __('artist_emoji_list.No') }}</th>
                                                                    <th>{{ __('artist_emoji_list.Emoji Name') }}</th>
                                                                    <th>{{ __('artist_emoji_list.Image') }}</th>
                                                                    <th>{{ __('artist_emoji_list.Commision') }}</th>
                                                                    <th>{{ __('artist_emoji_list.Status') }}</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($emojis as $key=>$emoji)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$emoji->image_name}}</td>
                                                            <td><div><img style="width: 100px; height: 100px;" src="{{asset('/uploads/emoji/'.$emoji->file)}}"></div></td>
                                                            <td>{{$emoji->commision}}</td>
                                                           <td>@if($emoji->status == '0')<div class="btn-group"><button type="button" id="status{{$emoji->id}}" class="status btn btn-warning">{{ __('artist_emoji_list.Pending') }}</button></div>@elseif($emoji->status == '1')<div class="btn-group"><button type="button" id="status{{$emoji->id}}" data-id="{{$emoji->id}}" class="status btn btn-success">Active</button></div>@else<div class="btn-group"><button type="button" id="status{{$emoji->id}}" data-id="{{$emoji->id}}" class="status btn btn-danger">Inactive</button></div>@endif</td>

                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                            </table>
                                          </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.dashboard artist-->
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jQuery-plugin-progressbar.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jQuery-plugin-progressbar.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Footer Script End -->

    <script>
        $(document).ready(function(){
            $('.emoji').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
        });

        </script>
@endsection
