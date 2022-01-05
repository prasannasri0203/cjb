@extends('front.app')

@section('title', '')

@section('header_script')

    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = null;
@endphp
        <!--Page Content Start-->

    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad">
            <div class="container">
                

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('theme-preview.Font Family') }}</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group @error('font_family') has-error @enderror">
                                                    <input type="text" name="font_family" class="" id="font_family" value="Rubik-Light">
                                                    @error('font_family')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('theme-preview.Font Size') }}</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group @error('font_size') has-error @enderror">
                                                    <input min="14" step="1" max="26" type="number" name="font_size" value="15">
                                                    @error('font_size')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('theme-preview.Font Colour') }}:</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('font_colour') has-error @enderror">
                                                    <input id='font_colour' type="text" name="font_colour" class="form-control" />
                                                    @error('font_colour')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
            </div>
        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('css/jquery.fontselect.min.css') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.slim.min.js" integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.fontselect.min.js') }}"></script>
    <script>
    $(function(){
        $('#font_family').fontselect();
    });
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
    <!-- Footer Script End -->
@endsection