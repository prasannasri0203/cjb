@extends('front.app')

@section('title', 'Product Description Page')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
 
    <!-- Bredcrum -->
        <div class="bred-crum-prnt">
                <div class="container">
                    <ul>
                        <li><a class="active" href="{{URL('/artist_list')}}">Shop </a> > </li>
                        <!-- <li><a class="" href="#">T-Shirt </a> > </li> -->
                        <li><a href="#">{{$product_data->category_name}} </a> </li>
                    </ul>
                </div>
        </div>
    <section></section>
    <!--About me -->
    <div class="container product_caros">
        <div class="row">
            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide procaro" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="changer">
                        @foreach($product_images as $image)
                           <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="{{asset('/portal/img/product').'/'.$image->image}}" style="width:100%;"></li>
                        @endforeach
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($product_images as $key=>$image)
                             @if($key == 0)
                                <div class="item active">
                                    <img src="{{asset('/portal/img/product').'/'.$image->image}}" style="width:100%;">
                                </div>  
                            @else
                                <div class="item">
                                    <img src="{{asset('/portal/img/product').'/'.$image->image}}" style="width:100%;">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Left and right controls -->
                    <div class="bigcarrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <img src="{{asset('/images/leftarrow.png')}}" class="img-responsive" />
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <img src="{{asset('/images/rightarrow.png')}}" class="img-responsive" />
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                        <!-- Left and right controls -->
                    <div class="smallar">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pro_deta">
                <h3>{{$product_data->product_name}} <span></h3>

                <a href="#" class="wishlisticon" data-data="{{$product_data->id}}" style="margin: 247px 52px 31px 530px;"><span>
                 @php 
                    $wishlist = App\Wishlist::where('merch_product_id',$product_data->id)->first();
                @endphp
            

                @if($wishlist != null && $wishlist !='')
                    <i class="heartin fa fa-heart" aria-hidden="true"></i>
                @else
                    <i class="heartin fa fa-heart-o"></i>
                @endif 

               <form class="form-horizontal" action="/action_page.php">
                <div class="form-group">
                    <label class="control-label col-sm-3">RRP:</label>
                    <div class="col-sm-9">
                       <h2>{!! currency($product_data->shipping_cost, 'GBP', session()->get('my_currency')) !!}</h2>
                    </div>
                 </div>
                  <div class="form-group">
                     <div class="col-sm-3">
                        <label class="control-label">Available colors</label>
                     </div>
                   <div class="col-sm-9 colpickers">
                         @foreach($product_varient as $varient)
                         <?php $color = json_decode($varient->attributes); ?>
                            <div style="background-color:<?php $color = json_decode($varient->attributes); 
                            echo $color[1]; ?>;">
                                <h1 style='visibility: hidden;'><?php $color = json_decode($varient->attributes);
                                echo $color[1];?></h1>
                            </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-3">Available sizes:</label>
                     <div class="col-sm-9">
                            <p class="mrgin-cstm">
                            @foreach($product_varient as $varient)
                                <?php 
                                    $size = json_decode($varient->attributes);  
                                    echo $size[0];
                                ?>
                            @endforeach
                        </p>
                     </div>
                  </div>                  
               </form>
            </div>
         </div>
      </div>
      <div class="container_aboutme filtersec container">
         <!--About me content -->
         <div class="row">
            <div class="col-sm-12 col-lg-7">
               <div class="about_cont brd-rmv">
                  <h3>Item Details</h3>
                  <p>{{$product_data->product_description}}</p>
               </div>
    </div>
    <div class="col-sm-12 col-lg-5">
        <div class="stats_sociallink">            
            <div class="stats">
                <p class="title">Meterial</p>
                <ul>
                    <li>In vel mollis ex, in lobortis nisi</li>
                    <li>Fusce maximus eleifend eros, at porta augue tempus </li>
                    <li>Fusce maximus eleifend eros, at porta augue tempus </li>
                    <li>In ligula massa, placerat id ornare et, rhoncus et urna</li>
                    <li>Maecenas pharetra eget est ut tristique</li>
                    <li>Integer risus quam, pellentesque vel tortor tincidunt</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!--login popup-->
    <div class="modal fade changeuser" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Existing users Login... </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">Email:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Password:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field" name="Password" />
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span>
                                <i class="fa fa-info-circle" aria-hidden="true">
                </i>
                            </div>
                        </div>
                        <div class="form-group forgot">
                            <div class="col-sm-9 col-xs-12 pull-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">New to Cool Jelly Bean?</h4>
                    <p>
                        <a href="#">Register now</a> to start making money! It’s FREE!</p>
                </div>
            </div>
        </div>
        <div class="tooltip_content">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <!--login popup-->

    <!--signup popup-->
    <div class="modal fade changeuser" id="regModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New To Cool Jelly Bean? </h4>
                    <p>Register now to start making money!
                        <a href="#">It’s FREE!</a>
                    </p>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">Profile Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Unique name for your artist page">
                                <i class="fa fa-info-circle info1" aria-hidden="true">
                </i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">First Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="pwd" name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Last Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="pwd" name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Email</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="pwd" name="pwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Password</label>
                            <div class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field" name="Password" />
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span>
                                <i class="fa fa-info-circle info2" aria-hidden="true">
                </i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label">REGISTER NOW</button>
                                <p class="terms">By clicking register now you agree to our
                                    <a href="#">Terms & Conditions</a> and
                                    <a href="#">Privacy</a> Policies</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">Already Registered</h4>
                    <p>Cras tinciduent aliquet risus blandit
                        <a href="#">login here</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="tooltip_content tp1">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
        <div class="tooltip_content tp2">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <!--signup popup-->

    <!--Thanks popup-->
    <div class="modal fade changeuser" id="thankModel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thanks for registering!</h4>
                    <p>We've emailed you a link to verify your account. Please check your email and follow the instructions.</p>
                    <p>Having trouble? Please
                        <a href="#">contact us</a>
                    </p>
                    <img src="images/thanks.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
    <!--Thanks popup-->
    
@endsection

@section('footer_script')
<script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- owl carousel-->
    <script src="js/owl.carousel.min.js"></script>
    <script>

            $(".wishlisticon").on('click', function(evt) {

                var link_data = $(this).data('data');
                var this_button_icon = $(this).find("i");
                var baseurl = "{{url('/')}}";
                $.ajax({
                  type: "POST",
                  url: baseurl+"/wishlistadd",
                  data: {
                    "_token": "{{ csrf_token() }}",
                      merch_product_id: link_data},
                  success: function(status) {
                      console.log(status);
                       if(status == "1")
                       {
                        this_button_icon.removeClass("fa fa-heart-o").addClass("fa fa-heart");
                        iziToast.success({ title: 'Success', message: 'Product added to wishlist successfully', position: 'topRight', });

                       }
                       if(status == "0"){
                        this_button_icon.removeClass("fa fa-heart").addClass("fa fa-heart-o");
                        iziToast.error({ title: 'Error', message: 'Product removed from wishlist successfully', position: 'topRight', });

                       }
                       if(status == "error")
                       {
                        iziToast.error({ title: 'Error', message: 'Please register / login to add to your wish list', position: 'topRight', });
                       }
                  }
               });
        });

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
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })

        $('input:checkbox').change(function() {
            if ($(this).is(":checked")) {
                $('div.menuitem').addClass("menuitemshow");
            } else {
                $('div.menuitem').removeClass("menuitemshow");
            }
        });

        $('.read_mo').click(function() {
            $('.hidden_reviews').slideToggle();
        });

        $('').mouseover(function() {
            $(this).toggleClass("fa-heart");
            $(this).removeClass("fa-heart-o heartin");
        });
        $('').mouseleave(function() {

            $(this).addClass("fa-heart-o heartin");
        });
    </script>
    <!-- owl carousel-->
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

        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

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
    @endsection