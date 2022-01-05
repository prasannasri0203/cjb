<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Cool Jelly Bean Admin Portal</title>
  <title> @yield('title') | {{ config('app.name', 'Cool Jelly Bean') }} Admin Portal </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('portal/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('portal/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="{{ asset('portal/css/fontastic.css') }}">
  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('portal/css/style.blue.css') }}" id="theme-stylesheet">

  <!-- datepicker -->
  <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('portal/img/favicon.ico') }}">
  <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  <!-- <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
  rel = "stylesheet"> -->

  <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  -->
    <link rel="stylesheet" href="{{ asset('portal/vendor/colpick/jquery.minicolors.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" >
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('portal/css/custom.css') }}">


  <!-- plugin css for this page -->

  @yield('header_css')


    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>

       <div class="page">
        <!-- Main Navbar-->
        <header class="header">
          <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
              <button class="dismiss"><i class="icon-close"></i></button>
              <form id="searchForm" action="#" role="search">
                <input type="search" placeholder="What are you looking for..." class="form-control">
              </form>
            </div>
            <div class="container-fluid">
              <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                  <!-- Navbar Brand --><a href="{{url('/admin')}}" class="navbar-brand d-none d-sm-inline-block">
                    <div class="brand-text d-none d-lg-inline-block"><span>{{ config('app.name') }} </span><strong>Portal</strong></div>
                    <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>CJB</strong></div></a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                  </div>
                  <!-- Navbar Menu -->
                  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Search-->
                    <!-- Notifications-->
                                  <li class="nav-item dropdown"> <a id="faultnotify" rel="nofollow"   class="nav-link"><i class='fa fa-comment' style='font-size:20px'></i>
                                  @if($unread_fault_count > 0)
                                  <span class="badge bg-red badge-corner">{{$unread_fault_count}}</span>
                                  @endif
                                  </a>
                    <ul aria-labelledby="notifications" id="faultnotifications" class="dropdown-menu">

                          @foreach($unread_fault_notifications as $unread_fault_notification)
                          <li><a rel="nofollow" href="{{ URL('admin/readfaultnotification/'.$unread_fault_notification->id) }}" class="dropdown-item">
                            <div class="notification">
                              <div class="notification-content"><i class="fa fa-envelope bg-blue"></i>{{$unread_fault_notification->data['id']}}</div>
                              <div class="notification-time"><small>{{$unread_fault_notification->created_at}}</small></div>
                            </div></a></li>
                           	@endforeach
                             <!-- <li><a rel="nofollow" href="#" class="dropdown-item">
                              <div class="notification">
                                <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                <div class="notification-time"><small>4 minutes ago</small></div>
                              </div></a></li>
                              <li><a rel="nofollow" href="#" class="dropdown-item">
                                <div class="notification">
                                  <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                  <div class="notification-time"><small>10 minutes ago</small></div>
                                </div></a></li> -->
                            
                             <li><a rel="nofollow" href="{{ URL('admin/fault_viewall') }}" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                              </ul>
                    </li>

                    <li class="nav-item dropdown"> <a id="notificationss" rel="nofollow"   class="nav-link"><i class="fa fa-bell-o"></i>
                    @if($unread_enquiry_count >0)
                    <span class="badge bg-red badge-corner">{{$unread_enquiry_count}}</span>
                    @endif
                    </a>
                    <ul aria-labelledby="notifications" id="notifications" class="dropdown-menu">

                          @foreach($unread_enquiry_notifications as $unread_enquiry_notification)
                          <li><a rel="nofollow" href="{{ URL('admin/readenquiryNotification/'.$unread_enquiry_notification->id) }}" class="dropdown-item">
                            <div class="notification">
                              <div class="notification-content"><i class="fa fa-envelope bg-blue"></i>{{$unread_enquiry_notification->data['id']}}</div>
                              <div class="notification-time"><small>{{$unread_enquiry_notification->created_at}}minutes ago</small></div>
                            </div></a></li>
                           	@endforeach
                                <li><a rel="nofollow" href="{{ URL('admin/viewall') }}" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                              </ul>
                    </li>
                    
                            <!-- Messages -->
                            <li class="nav-item dropdown"> <a id="messages" rel="nofollow"  class="nav-link"><i class="fa fa-envelope-o"></i>
                            @if($unread_order_count > 0)
                            <span class="badge bg-orange badge-corner">{{$unread_order_count}}</span>
                            @endif
                            </a>
                              <ul aria-labelledby="notifications" class="dropdown-menu" id="message">
                              @foreach($unread_order_notifications as $unread_order_notification)
                                <li><a rel="nofollow" href="{{ URL('admin/readOrderNotification/'.$unread_order_notification->id) }}" class="dropdown-item d-flex">
                                  <div class="msg-profile"><i class="fa fa-shopping-cart"></i></div>
                                  <div class="msg-body">
                                    <h3 class="h5">You have new  orders </h3>
                                    <!-- <span>Sent You Message</span> -->
                                  </div></a></li>
                                  @endforeach

                                      <li><a rel="nofollow" href="{{ URL('admin/order_viewall') }}" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                                    </ul>
                                  </li>
                                  
                                  <?php /*
                                  <!-- Languages dropdown    -->
                                  <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="{{ asset('portal/img/flags/16/GB.png') }}" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                                    <ul aria-labelledby="languages" class="dropdown-menu">
                                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('portal/img/flags/16/DE.png') }}" alt="English" class="mr-2">German</a></li>
                                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{ asset('portal/img/flags/16/FR.png') }}" alt="English" class="mr-2">French                                         </a></li>

                                    </ul>
                                    <!-- <li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>

                                    <li><a href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li> -->
                                  </li> */ ?>
                                  <!-- Logout    -->
                                  <li class="nav-item"><a href="#" class="nav-link logout"> <span class="d-none d-sm-inline">{{ __('general.Logout') }}</span><i class="fa fa-sign-out"></i></a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

                                </ul>
                              </div>
                            </div>
                          </nav>
                        </header>
                        <div class="page-content d-flex align-items-stretch">
                          <!-- Side Navbar -->
                          <nav class="side-navbar">

                            <!-- Sidebar Header-->
                            <div class="sidebar-header d-flex align-items-center">
                              <div class="avatar">
                                <a href="{{route('admin.profile.edit',base64_encode(Auth::user()->id)) }}">

                                  <img src="{{(Auth::user()->profile_image) ? asset('profile/').'/'.Auth::user()->profile_image : asset('profile/default.jpg')}}" alt="..." class="avatar_img_size img-fluid rounded-circle">
                                </a>
                              </div>
                              <div class="title">
                                <a href="{{route('admin.profile.edit',base64_encode(Auth::user()->id)) }}">
                                  <h1 class="h4">{{Auth::user()->name}}</h1>
                                </a>
                                  <p>{{@Auth::user()->roles[0]->name}}</p>
                              </div>
                            </div>
                            <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
                            <ul class="list-unstyled">
                              <li class="{{ Request::url() == url('/admin') ? 'active' : '' }}"><a href="{{ url('/admin') }}"> <i class="icon-home"></i>@lang('general.Dashboard') </a></li>
                              @can('role-list')
                              <li class="{{ (request()->is('admin/roles*')) ? 'active' : '' }}">
                                <a href="{{ url('admin/role_list') }}"> <i class="fa fa-user-plus"></i>Manage Roles </a>
                              </li>
                              @endcan
                              @can('user-list')
                              <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}"> <i class="fa fa-users"></i>Manage CJB Staffs </a>
                              </li>
                              @endcan
                              @can('faq-list')
                              <li class="{{ (request()->is('admin/faq*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.faq_list') }}"> <i class="fa fa-question-circle"></i>FAQ</a>
                              </li>
                              @endcan
                              @can('cms-list')
                              <li class="{{ (request()->is('admin/cms*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.cms_list') }}"> <i class="fa fa-cloud"></i>CMS</a>
                              </li>
                              @endcan
                              <!-- @can('videos-list')
                              <li class="{{ Request::url() == route('admin.videos.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.videos.index') }}"> <i class="fa fa-file-text"></i>Featured Videos</a>
                              </li>
                              @endcan -->
                              @can('Enquiry-list')
                              <li class="{{ (request()->is('admin/enquiry*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.enquiry_list') }}"> <i class="fa fa-question-circle-o"></i>Manage Enquiry</a>
                              </li>
                              @endcan
                              @can('Setting-list')
                              <li class="{{ (request()->is('admin/revenue*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.revenue_list') }}"> <i class="fa fa-credit-card-alt"></i>Manage Revenue</a>
                              </li>
                              @endcan
                              @can('delivery_packing-list')
                              <li class="{{ (request()->is('admin/delivery_packing*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.delivery_packing_list') }}"> <i class="fa fa-credit-card-alt"></i>Delivery / Packing</a>
                              </li>
                              @endcan
                              @can('customer-list')
                              <li class="{{ (request()->is('admin/customer*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.customer_list') }}"> <i class="fa fa-male"></i>Manage Customers</a>
                              </li>
                              @endcan
                              @can('artist-list')
                              <li class="{{ (request()->is('admin/artist*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.artist_list') }}"> <i class="fa fa-picture-o"></i>Manage Artist</a>
                              </li>
                              @endcan
                              @can('supplier-list')
                              <li class="{{ Request::url() == url('/admin/supplier_list') ? 'active' : '' }}">
                                <a href="{{ url('/admin/supplier_list') }}"> <i class="fa fa-building-o"></i>@lang('general.Supplier') </a>
                              </li>
                              @endcan
                              @can('category-list')
                              <li class="{{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                                <a href="{{ url('/admin/categories') }}"> <i class="fa fa-bar-chart"></i>@lang('general.Category') </a>
                              </li>
                              @endcan
                              @can('product-list')
                              <li class="{{ (request()->is('admin/product*')) ? 'active' : '' }}"><a href="{{ url('/admin/product_list') }}"> <i class="fa fa-list-alt"></i>Product </a></li>
                              @endcan
                            <li class=""><a href="{{ url('/admin/print_type_list') }}"> <i class="fa fa-print"></i>Print Type</a></li>
                              <li class=""><a href="{{ url('/admin/review_list') }}"> <i class="fa fa-star"></i>Manage Review</a></li> 
                              @can('preset-list')
                              <li class="{{ (request()->is('admin/collection*')) ? 'active' : '' }}">
                                <a href="{{ route('admin.collection.index') }}"> <i class="fa fa-cube"></i>Preset Collections</a>
                              </li>
                              @endcan
                              @can('videos-list')
                              <li class="{{ (request()->is('admin/featured_video*')) ? 'active' : '' }}"><a href="{{ url('/admin/featured_video') }}"> <i class="fa fa-youtube-square"></i>Featured Video </a></li>
                              @endcan
                              @can('fault-list')
                              <li class="{{ (request()->is('admin/fault*')) ? 'active' : '' }}"><a href="{{ url('/admin/fault_list') }}"> <i class="fa fa-list-alt"></i>Faults and Returns</a></li>
                              @endcan
                              @can('emoji-list')
                              <li class="{{ (request()->is('admin/emoji_list*')) ? 'active' : '' }}"><a href="{{ url('/admin/emoji_list') }}"> <i class="fa fa-smile-o"></i>Manage Artwork </a></li>
                              @endcan
                              @can('order-list')
                              <li class="{{ (request()->is('admin/order*')) ? 'active' : '' }}"><a href="{{ url('/admin/order_index') }}"> <i class="fa fa-list-alt"></i>Order</a></li>
                              @endcan
                              </ul>
                            </nav>

                            <div class="content-inner">
                              @yield('content')

                              <!-- Page Footer-->
                              <footer class="main-footer">
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <p>{{ config('app.name') }} &copy; 2019-<?php echo date('Y'); ?> | Build V1.0.1 </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                      <p>Developed by <a href="javascript:void(0);" class="external">Colan</a></p>
                                    </div>
                                  </div>
                                </div>
                              </footer>
                            </div>
                          </div>
                        </div>
                        <!-- JavaScript files-->
                        <script src="{{ asset('portal/vendor/jquery/jquery.min.js') }}"></script>
                        <script src="{{ asset('portal/vendor/popper.js/umd/popper.min.js') }}"> </script>
                        <script src="{{ asset('portal/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
                        <script src="{{ asset('portal/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
                        <script src="{{ asset('portal/vendor/chart.js/Chart.min.js') }}"></script>
                        <script src="{{ asset('portal/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
                        <script src="{{ asset('portal/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
                        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
                        <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  -->
                        <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
                        <!-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

                        <script src="{{ asset('portal/vendor/colpick/jquery.minicolors.js') }}"></script>
                        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

                        @include('portal.scripts')



    <!-- Main File-->
    <script src="{{ asset('portal/js/front.js') }}"></script>
      <script>
  $(document).ready(function(){
    $(".logout").click(function(){
      var r = confirm("Are you want to logout");
      if (r == true) {
          document.getElementById('logout-form').submit();
      } 
      //
   });
  });    
      </script>
   <script>
   $("#notificationss").click(function(){
    $("#notifications").toggle();
});
    </script>
       <script>
   $("#faultnotify").click(function(){
    $("#faultnotifications").toggle();
});
    </script>
     <script>
   $("#messages").click(function(){
    $("#message").toggle();
});
    </script>

    <!-- Plugin js for this page-->
    @yield('footer_script')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

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
  </body>
  </html>
