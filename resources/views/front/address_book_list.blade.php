@extends('front.app')

@section('title', 'Address book')

@section('header_script')
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"> -->
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
    .address_book .dft-address{margin-top: 10px;color: #00aff0}
    
span.edit_book {
display: flex !important;
flex-direction: row;
width: 90%;
justify-content: flex-end;
}
.edit_book div {
color: #00aff0;
}
        .address_books,footer
        {
            width: 100%;
            float: left;
           position: unset !important;
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
    footer {
	    position: absolute;
			}
    
        .dash_board_art_banner {
            position: relative;
        }
    .dashboard-sec{
   padding: 40px 0 154px;
    }

        @media only screen and (min-width:320px) and (max-width:767px) {
            .dash_art_mob .container.artist-dashboard .banner .advertise_btn a {
                margin: 0 auto;
                float: none;
            }
        }
        
        .col-lg-6.col-md-6.col-sm-12.dis-hei {
    height: 308px;
}
        
.address_book .address-book-section { height: 278px;}

        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'dash_board_art_banner')

@section('content')

@php
$activeSidebar = 'address-book';
@endphp

        <!--Page Content Start-->

        <!--dashboard artist-->
        <section class="address_books sec-overback">
            <div class="dashboard-sec dash_art_mob slidpad">
                <div class="container artist-dashboard">
                    <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">

                        @include('front.user-sidebar')

                    </div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <!--banner-->
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding container_default_custom add-hd">
                        <div class="col-lg-12 col-md-12 col-sm-12 address_book">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <p> Your Address Book </p>
                            </div>
                            @foreach ($data as $key=>$value)
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <div class="address-book-section">
                                    <span><a class="deleteUser"  data-target="#applicantDeleteModal" data-backdrop="false" data-userid="{{$value->id}}" ><i class="fa fa-trash" aria-hidden="true"></i></a></span>
                                    <ul class="booked_address">
                                        <li>{{$value->delivery_name}}</li>
                                        <li>{{$value->no}}</li>
                                        <li>{{$value->street_1}}</li>
                                        {{--  <li>{{$value->street_2}}</li>  --}}
                                        <li>{{$value->region}}</li>
                                        <li>{{$value->country}}</li>
                                        <li>{{$value->zipcode}}</li>
                                        <li>{{$value->contact_no}}</li>
                                       
                                    </ul>
                                    @if ($value->is_primary == 1)
                                        <div class="dft-address" >Defualt Delivery Address</div>
                                    @endif
                                    
                                    <span class="edit_book">
                                    
                                    <a href="{{ URL('address_book/edit/'.$value->id) }}"><i class="fas fa-edit"></i>edit</a></span>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="btn_cards"><a href="{{ url('address_book') }}">ADD NEW ADDRESSS<i class="fas fa-plus"></i></a></div>
                            </div>

<div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
        <div class="modal-content">
             <form action="{{URL('address_book/delete')}}" method="POST" class="remove-record-model">
               {{ method_field('delete') }}
               {{ csrf_field() }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-center" id="custom-width-modalLabel">{{ __('address_book_list.Delete Address') }}</h4>
            </div>
            <div class="modal-body">
                <h4>{{ __('address_book_list.Do You Want Delete This Record?') }}</h4>
                <input type="hidden" name="applicant_id" id="app_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{ __('address_book_list.Close') }}</button>
                <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">{{ __('address_book_list.Delete') }}</button>
            </div>

             </form>
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
        <script>
        $(document).ready(function(){
    $(document).on('click','.deleteUser',function(){
    var userID=$(this).attr('data-userid');
    $('#app_id').val(userID); 
    $('#applicantDeleteModal').modal('show'); 
    })
    });
</script>
@endsection
