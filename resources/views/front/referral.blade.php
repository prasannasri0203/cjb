

  @extends('front.app')

@section('title', '')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
        $(document).ready(function() {
            // $(".toggle-password").click(function() {

            //     $(this).toggleClass("fa-eye fa-eye-slash");
            //     var input = $($(this).attr("toggle"));
            //     if (input.attr("type") == "password") {
            //         input.attr("type", "text");
            //     } else {
            //         input.attr("type", "password");
            //     }
            // });
            // $(".fa-info-circle").mouseover(function() {
            //     $(".tooltip_content").show();
            // });

            // $(".fa-info-circle").mouseout(function() {
            //     $(".tooltip_content").hide();
            // });

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
        /*search tab*/
    </script>
    
    <style type="text/css">
        @media only screen 
    and (min-device-width : 375px)  
    and (max-device-width : 667px)  
    and (width : 667px)  
    and (height : 375px)  
    and (orientation : landscape) 
    and (color : 8)
    and (device-aspect-ratio : 375/667)
    and (aspect-ratio : 667/375)
    and (device-pixel-ratio : 2)
    and (-webkit-min-device-pixel-ratio : 2)
{ 
form#form_userdetails div:last-child input {
    width: 100px; 
    border-radius: 0;
    border: 1px solid #616060;
}
}
 
@media only screen 
    and (min-device-width : 375px)  
    and (max-device-width : 667px)  
    and (width : 375px)  
    and (height : 559px)  
    and (orientation : portrait) 
    and (color : 8)
    and (device-aspect-ratio : 375/667)
    and (aspect-ratio : 375/559)
    and (device-pixel-ratio : 2)
    and (-webkit-min-device-pixel-ratio : 2)
{
form#form_userdetails div:last-child input {
    width: 100px; 
    border-radius: 0;
    border: 1px solid #616060;
}
 }

        form#form_userdetails div:last-child input {
    width: 80px;
    margin-right: 5px;
}
form#form_userdetails div:last-child {
    flex-direction: row;
    margin-top: 5px;
}
        @media screen and (max-width:767px)
    {
        form#form_userdetails div:last-child { 
    margin-bottom: 20px;
    width: 100%;
    float: left;
}
      form#form_userdetails { 
    margin:0px auto !important;
}  
 .edit_pf h2 {
    margin-left: 0% !important;
    text-align: center;
}
    }
        form#form_userdetails {
    width: 300px;
    display: block;
    margin-left: 10%;
}
form#form_userdetails div {
    display: flex;
    flex-direction: column;
}
        .edit_pf h2 {
    margin-left: 10% !important;
    text-align: left;
}
        .form-group.t_tip i {
            right: -20px;
        }
        
        body .form-group .tooltip_content {
            right: -5% !important;
            left: unset;
            top: -140%;
            z-index: 9999;
        }
        
        <!-- .custom_container .form-group {
            display: inline-block;
            width: 84%;
        }
        
        .edit_pf ul.nav.nav-tabs li a {
            font-size: 28px;
        }
        
        .edit_pf .nav>li>a {
            padding: 10px 34px 10px 32px;
        }
        
        .custom_container {
            width: 78%;
        }
        
        .custom_container .form-group input {
            font-size: 16px;
        }
        
        .check_box_ct .checkbox p {
            font-size: 14px !important;
            color: #666666;
        }
        
        .advertise_btn a {
            font-family: "Rubik-light";
            font-size: 15px;
        }
        
        .edit_pf h5.header_prof {
            margin-top: 20px;
            /* margin-: 20px; */
            float: left;
            font-size: 28px;
        }
        
        h6.sub_txt {
            font-size: 16px;
        }
        
        .custom_container .form-group input {
            width: 100%;
        }
        
        .check_box_ct .checkbox label {
            width: auto;
        }
        
        .custom_container .form-end-part input {
            width: auto;
        }
        
        .form-end-part .checkbox {
            margin-bottom: 5px;
        }
        
        .custom_container label {
            text-align: right;
            width: 100%;
        }
        
        .edit_pf h5.header_prof {
            padding-left: 30px;
        }
        
        @media only screen and (max-width:768px) {
            .edit_pf .nav>li>a {
                padding: 10px 1% 10px 6%;
            }
            .edit_pf li:first-child {
                width: 60%;
            }
            .edit_pf li:last-child {
                width: 39%;
            }
            .edit_pf ul.nav.nav-tabs li a {
                font-size: 22px;
            }
            .custom_container label {
                text-align: left;
            }
            .form-group.t_tip i {
                right: -20px;
                top: 7px;
            }
            .custom_container {
                width: 100%;
            }
            .custom_container .col-lg-3 {
                padding-left: 0!important;
            }
            .advertise_btn {
                top: 0 !important;
                width: 100%!important;
                position: relative !important;
                left: 0px;
                display: inline-block;
                margin-top: 30px!important;
            }
            .form-hide-part {
                display: none;
            }
            .custom_container {
                margin: 0px auto;
                max-width: 90%;
            }
            .custom_container .form-group {
                width: 98%;
            }
            .edit_pf {
                margin-top: 10px;
            }
            .edit_pf ul.nav.nav-tabs li a {
                text-align: center;
            }
        }

        section#checkout_completed_log .log-out .btn_cards button {
            font-family: "Rubik-Light";
        }
        .d-f.guestform .check_box_ct .btn_cards button {
            padding: 12px 22px !important;
        }
        .btn_cards button:hover {
            background: 
        #00aff0 !important;
        -webkit-transition: 1s ease-in;
        -o-transition: 1s ease-in;
        transition: 1s ease-in;
        -webkit-transition: 1s ease-out;
        -o-transition: 1s ease-out;
        transition: 1s ease-out;
        color:
            #fff;
        }
        .btn_cards button {
            background: #ed1277 none repeat scroll 0 0;
            border-radius: 50px;
            color: #fff;
            float: none;
            font-family: "Rubik-Bold";
            font-size: 16px;
            margin: 0 auto;
            padding: 10px 26px;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        .form-group.frm_relate span {
            color: #a94442 !important;
        }
        .ck-editor__editable {
            min-height: 180px;
        }
        input[type="date"].form-control {
            line-height: 20px;
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'referral';
@endphp
        <!--Page Content Start-->

    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">

                        @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 edit_mb_space">
                        <!--Edit_profile-->
                        <div class="edit_pf">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab">Give Invite to Our Website.</a></li>
                            </ul>
                            <div class="tab-content">

 <!-- <h2 style="margin-left: 9em;" >Give Invite to Our Website.</h2> -->
    <form id="form_userdetails" action="{{ route('refferalCreate') }}" method="post">
    @csrf
      <div>
        <label for="name">Email:</label>
          <input type="email" name="user_email" id="name" required />
            @if ($errors->has('user_email'))
                <span class="text-danger">{{ $errors->first('user_email') }}</span>
            @endif
        
      </div>
    
      <div>
        <label>Description:</label>
        
        <textarea name="description" rows="12" cols="35" required>Send your comments to us.</textarea>
        @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
      </div>
      <div>
        <input type="submit" name="submit" value="invite" />
        <input type="reset" name="reset" value="Clear Form" />
      </div>
    </form>
                          
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(".info1 ").mouseover(function() {
            $(".tp1 ").show();
        });

        $(".info1 ").mouseout(function() {
            $(".tp1 ").hide();
        });

        $(".info2 ").mouseover(function() {
            $(".tp2 ").show();
        });

        $(".info2 ").mouseout(function() {
            $(".tp2 ").hide();
        });

        $(".info3 ").mouseover(function() {
            $(".tp3 ").show();
        });

        $(".info3 ").mouseout(function() {
            $(".tp3 ").hide();
        });

        $(".info4 ").mouseover(function() {
            $(".tp4 ").show();
        });

        $(".info4 ").mouseout(function() {
            $(".tp4 ").hide();
        });

        $(".info5 ").mouseover(function() {
            $(".tp5 ").show();
        });

        $(".info5 ").mouseout(function() {
            $(".tp5 ").hide();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    @if ($message = Session::get('success'))
    <script type="text/javascript">
         iziToast.success({
             title: 'OK',
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('#date input').datepicker({
            format: 'yyyy-mm-dd',
            endDate: '0d',
            autoclose: true
        });
    </script>
    <!-- Footer Script End -->
@endsection