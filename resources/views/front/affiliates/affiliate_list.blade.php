@extends('front.app')

@section('title', 'Affiliates')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{asset('css/affiliate_css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/affiliate_css/font-awsome.css')}}">
    <link rel="stylesheet" href="{{asset('css/affiliate_css/responsive.css')}}">
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

        @media screen and (max-width:600px)
        {
            form#order_filter_form .filter-right {
    flex-direction: column;
}
.custom-d-flex-width.custom-d-flex.filt-inner .input-group.input-daterange input {
    width: 90px;
   
}
.custom-d-flex-width.custom-d-flex.filt-inner .input-group.input-daterange input:first-child {
    margin-right: 2px;
}
input#from_date, input#to_date {
    border: 1px solid #00d1d0 !important;
    border-radius: 4px;
}
select#status_val {
    border: 1px solid #00d1d2 !important;
    width: 180px;
}
.filter-right .custom-d-flex .dwn-img { 
    right: 40px !important;
}
.custom-d-flex span {
    margin-right: 10px;
    width: 100px;
    font-size: 14px;
}
        }
div#copy i {
    font-size: 15px !important;
    color: #ffffff !important;
    background: #0095cd;
    width: 26px;
    border-radius: 4px;
    height: 26px;
    line-height: 26px;
    margin: 0px 10px;
}
form#order_filter_form .filter-right {
    flex-wrap: nowrap;
}
@media screen and (max-width:576px)
{
    select#status_val {
    border: 1px solid #00d1d0 !important; 
}
.custom-d-flex .dwn-img { 
    top: 10px !important;
    right: 11px !important; 
}
 input#from_date, input#to_date {
    border: 1px solid #00d1d0 !important;
    border-radius: 4px;
}
.custom-d-flex span { 
    width: 100px;
}
  form#order_filter_form .filter-right { 
    flex-direction: column;
    margin-left: 0;
} 
form#order_filter_form .filter-right>* {
    width: 100%;
    margin-bottom: 5px;
} 
}
@media screen and  (min-width:991px) and (max-width:1280px)
{

form#order_filter_form .filter-right>* {
    width: 45%;
    margin-bottom: 5px;
}
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
        @media screen and (max-width:991px)
        {
            .page-detail input#link {
    padding-left: 0px !important;
    margin: 0px auto;
    display: block;
    text-align: center;
    font-size: 12px !important;
}
            .banner-caption h2 { 
    font-size: 30px;
    width: 100%; 
}
.banner-caption span { 
    font-size: 16px;
    width: 100% !important; 
}
.banner-sec img { 
    height: 100%;
    object-fit: cover;
}
.banner-sec {
    height: 250px;
}
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
        .input-daterange{
            width: 73%;
            display: flex;

        }
        .input-daterange input{
            background:#fff !important;
            margin-right:12px; 
        }
        .custom-d-flex{
            display: flex;
            align-items: center;
        }
        .custom-d-flex span{
            margin-right: 10px;
        }
        .filter-right{
            margin-left:-10px;
        }
        .custom-d-flex-width{
            width: 51%;
        }
         .custom-d-flex select{
            /*border: 0 !important;*/
            border: none;
            box-shadow: none;
            padding-top: 0px;
            margin-top: -3px;
            width: 130px !important;
        }
        .custom-d-flex .dwn-img {
            position: absolute;
            top: 17px;
            right:-104px;
            cursor: pointer;
            z-index: 1;
            width: 11px;
        }
        .custom-d-flex .form-control:focus{
            box-shadow: none !important;
            /*border: 0 !important;*/

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


.custom_container .radioclass input {
  width: auto !important;
}
.radioclass input:last-child {
  margin-left: 20px !important;
}
.radioclass input {
  margin-right: 5px;
  vertical-align: initial !important;
}
@media only screen and (max-width: 767px), (max-width: 1024px) and (min-width: 768px)
{
   td {
    padding-left: 10px !important;
} 
}




.social-link-bk a {
    padding: 10px !important;
}

div#copy i {
    color: #0095cd;
    font-size: 23px;
}

.base-wrapper {
    background: #fff;
}

.page-detail input {
    background: #FFF !important;
}
.filt-inner.fil-by2 {
    width: 77px !important;
    display: flex;
    align-items: center;
    margin-bottom: 1px;
}
.filt-inner.fil-by2 span{
    margin-top: 3px;
}
.form-style{
    display: block !important;
    width: 100% !important;
    height: 34px !important;
    padding: 6px 26px !important;
    font-size: 14px !important;
    line-height: 1.42857143 !important;
    color: #555 !important;
    background-color: #fff !important;
    background-image: none !important;
    border: 1px solid #ccc !important;
    border-radius: 4px !important;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%) !important;
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%) !important;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s !important;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
    }
</style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'affiliate';
@endphp
<!--Page Content Start-->
<section class="sec-overback">
    <div class="dashboard-sec slidpad">
    <div class="container">
    <div class="row">

        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">

                        @include('front.user-sidebar')

        </div>
        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 edit_mb_space">

             <div class="banner-sec">
                <img src="{{url('images/affiliate_images/ban-1.jpg')}}">
                <div class="banner-caption">
                <h2>Affiliates               
                </h2>
                <span class="sub-cap">To become an affiliate you need to switch to an artist accout - don’t worry you won’t need to sell anything or even have a shop. </span>
            </div>
            </div>

            <div class="base-wrapper">
                <div class="page-detail">
                    <p>Your Unique Referral Link</p>
                    <!-- <a href="{{$url}}" >{{ $url}}</a> -->
                    <input id="link" value="{{$url}}" style="background-color: #e3e3e3;border: none;width: 100%;font-size: 25px;padding-left: 200px;" readonly>
                    <div class="social-link-bk">
                        <div id="copy">
                         <i class="far fa-clone" aria-hidden="true" data-copytarget="#link" ></i>
                         <!--  <i class="fas fa-clipboard" aria-hidden="true" data-copytarget="#link"></i> -->
                        </div>
                        <a href='https://www.facebook.com/sharer/sharer.php?u={{$url}}&display=popup'>
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="http://twitter.com/share?text=affiliate sharelink &url={{$url}}">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                        <!-- <a href="https://www.instagram.com/?u={{$url}}">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a> -->
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="1"  onclick="setArtistId(1)" data-original-title="Delete">
                        <i  class="fas fa-envelope-square"></i>
                        </a>
                    </div>
                </div>
    
                <!-- dollar sec -->
                <div class="dollar-sec">
                    
                        <!-- <div class="dollar-inner">
                            <img src="{{url('images/affiliate_images/clock.jpg')}}">
                            <p class="rate-text">£0.00</p>
                            <p>Pending Commissions</p>
                        </div> -->
                        <div class="dollar-inner">
                            <img src="{{url('images/affiliate_images/sand.jpg')}}">
                            <p class="rate-text">
                                @if($paid)
                                £<?php echo @$paid; ?>
                                @else
                                £ 0.00
                                @endif
                            </p>
                            <p>Pending Payments</p>
                        </div>
                        <div class="dollar-inner">
                            <img src="{{url('images/affiliate_images/wallet.jpg')}}">
                            <p class="rate-text">
                                @if($release_paid)
                                £ {{@$release_paid}}
                                @else
                                £ 0.00
                                @endif
                            </p>
                            <p>Paid</p>
                        </div>
                    
                </div>
    
                <!-- end dollar sec -->
    
    
                <!-- table section -->
                <div class="table-area">
                
                    <div class="filter-bk">
                        <div class=" col-lg-3 filter-left">
                           <h2> Commissions </h2>
                           <!-- <img src="{{url('images/affiliate_images/img-icon.jpg')}}"> -->
                        </div>
                        <form id="order_filter_form"  action="{{ url('affiliate_search_list') }}" method="POST" >
                                    @csrf
                            <div class="col-lg-12 filter-right">
                                <div class="filt-inner fil-by2" style="width:89%; text-align:end; margin-bottom: 4px;"><img src="./images/filtfilt.png"> 
                                    <span>Filter By:</span>
                                </div>
                
                                <div class="custom-d-flex-width custom-d-flex filt-inner" style="width:50%">
                                    <span>Date Range:</span>
                                    <div class="input-group input-daterange">
                                            <input type="text" name="from_date" id="from_date" readonly class="form-control" placeholder="From" value="{{@$choosen['from_date']}}" autocomplete="off" />
                                            <input type="text"  name="to_date" id="to_date" readonly class="form-control" placeholder="To" value="{{@$choosen['to_date']}}" autocomplete="off" />
                                    </div>
                                    <!-- <img src="{{ url('images/affiliate_images/down-arrow.jpg') }}" class="dwn-img"> -->
                                </div>
                                <div class="custom-d-flex filt-inner" style="width:30%">
                                    <span >Clear All:</span>
                                            <input type="hidden" name="clear" id="clear" value="">
                                            <a href="javascript:void(0);" data_id="reset" id="reset" class="reset">Reset</a>
                                        <!-- </h3> -->
                                    <div class="custom-d-flex filt-inner" style="width:30%">
                                    <span>Status:</span>
                                     
                                    <select class="form-control form-style" id="status_val" name="status_val">
                                            <option value="" {{ (@$choosen['status_val'] == "") ? 'selected' :'' }}>All</option>
                                            <option value="1" {{ (@$choosen['status_val'] == 1) ? 'selected' :'' }}>{{ "Pending" }}</option>
                                            <option value="2" {{ (@$choosen['status_val'] == 2) ? 'selected' :'' }}>{{ "Completed" }}</option>
                                            <option value="3" {{ (@$choosen['status_val'] == 3) ? 'selected' :'' }}>{{ "Cancelled" }}</option>
                                            <option value="4" {{ (@$choosen['status_val'] == 4) ? 'selected' :'' }}>{{ "Return" }}</option>
                                    </select>
                                    <img src="{{ url('images/affiliate_images/down-arrow.jpg') }}" class="dwn-img">
                                </div>
                                </div>
                            </div>
                        </form>

                    </div>
                
                <div class="table-responsive">
                    <table class="or-table">
                        <thead>
                            <tr>
                                <th>Artist Name</th>
                                <th>Product</th>
                                <th>Date ordered</th>
                                <th>Commission</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @if($data_found)
                            <tbody>
                             @foreach($order_lists as $k => $order_list)   
                             <tr>
                                 <td>{{$order_list->customerDetails->name}}</td>
                                 <td>{{isset($order_list->orderItemDetails[0]->orderProducts->merchandise_product_name) ?$order_list->orderItemDetails[0]->orderProducts->merchandise_product_name :''}}</td>
                                 <td>{{isset($order_list->created_at) ? $order_list->created_at : ''}}</td>
                                 <td>£{{round($order_list->artist_percent * ($order_list->grand_total/100), 2)}}</td>
                                 <td>{{isset($order_list->cardDetails->created_at) ? $order_list->cardDetails->created_at :''}}</td>
                                  @if(isset($order_list->cardDetails->status))
                                     <td>{{ (($order_list->cardDetails->status ==1) ? 'Pending' :( ($order_list->cardDetails->status ==2) ? 'Placed' : (($order_list->cardDetails->status ==3) ? 'Completed' : (($order_list->cardDetails->status ==4) ? 'Cancelled':'Return')) ) )}}</td>
                                  @endif 
                            </tr>
                             @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="6">NO COMMISSION DATA FOUND.</td>
                                </tr>
                            </tbody>
                        @endif
                    </table>

                 
                </div>
                
                  <span class="empty-table">You don’t have any affiliate commissions yet, share your link (above) to get started.</span>
                </div>
                <!-- end table section -->
            </div>
        </div>

    </div>
    </div>
    </div>
</section>
<!--Page Content End-->
<!-- modal mail start -->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">Share the link via mail</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setArtistId('')"><span aria-hidden="true">×</span></button>
			</div>
			<form method="POST" action="{{url('affiliate_sharemail')}}">
			<div class="modal-body">
                <label>Please Enter Emaill Address</label>
				<input type="text" name="affiliate_mail">
				<input type="hidden" value="" id="userId" name="userId">
				@csrf
			</div>
			<div class="modal-footer">
			    <button type="submit"  class="btn btn-success" >Send</button>
				<button type="button" class="btn btn-danger" onclick="setArtistId('')"  data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- modal mail end -->

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
         Session::flush('success');
         
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

        // functionality to copy text from inviteCode to clipboard

        // trigger copy event on click
        $('#copy').on('click', function(event) {
          console.log(event);
          copyToClipboard(event);
        });

        // event handler
        function copyToClipboard(e) {
          // alert('this function was triggered');
          // find target element
          var
            t = e.target, 
            c = t.dataset.copytarget,
            inp = (c ? document.querySelector(c) : null);
          console.log(inp);
          // check if input element exist and if it's selectable
          if (inp && inp.select) {
            // select text
            inp.select();
            try {
              // copy text
              document.execCommand('copy');
              inp.blur();

              // copied animation
              t.classList.add('copied');
              setTimeout(function() {
                t.classList.remove('copied');
              }, 1500);
            } catch (err) {
              //fallback in case exexCommand doesnt work
              alert('please press Ctrl/Cmd+C to copy');
            }

          }

        }
        //search functionality
        $(document).ready(function() {

            $("#from_date").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: 'linked',
            uiLibrary: 'bootstrap',
            }).on('changeDate', function (selected) {
                var startDate = new Date(selected.date.valueOf());
                $('#to_date').datepicker('setStartDate', startDate);
                $( "#order_filter_form" ).submit();
            }).on('clearDate', function (selected) {
                $('#to_date').datepicker('setStartDate', null);
            });

            $("#to_date").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: 'linked',
            uiLibrary: 'bootstrap',
            startDate: $('#from_date').val()
            }).on('change', function (selected) {
                $( "#order_filter_form" ).submit();
            }).on('clearDate', function (selected) {
                $('#from_date').datepicker('setEndDate', null);
            });

            $( "#status_val , #sort_by").change(function(e) {
                e.preventDefault();
                $( "#order_filter_form" ).submit();
            });

            $( "#reset").click(function(e) {
                e.preventDefault();
                $('#clear').val(1);
                $( "#order_filter_form" ).submit();
            });

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

    </script>
    <!-- Footer Script End -->
@endsection