   <style type="text/css">
.fa-eye:before {
    top: 8px;
    position: relative;
}
.fa-eye-slash:before {
    top: 8px;
    position: relative;
}    
.custom-signup-modal-select{
  appearance:auto;
  -moz-appearance:auto;
  -webkit-appearance:auto;
}
    </style>
<div class="modal fade changeuser" id="regModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('signup-modal.New To') }} Cool Jelly Bean? </h4>
                    <p>{{ __('signup-modal.Register now to start making money') }}!
                        <a href="#">{{ __("signup-modal.It’s FREE") }}!</a>
                </p>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ route('signup') }}">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="profile_name">{{ __('signup-modal.Profile Name') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Unique name for your profile page" required>
                                <!-- <i class="fa fa-info-circle info1" aria-hidden="true"></i> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="first_name">{{ __('signup-modal.First Name') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="last_name">{{ __('signup-modal.Last Name') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="type">{{ __('signup-modal.Type') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <select name="user_type" class="form-control custom-signup-modal-select" required>
                                    <option value="1">{{ __('signup-modal.Artist') }}</option>
                                    <option value="2">{{ __('signup-modal.Customer') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">{{ __('signup-modal.Email') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="password">{{ __('signup-modal.Password') }}</label>
                            <div id="show_hide_password" class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field" name="password" required/>
                                <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span> -->
                                <!-- <i class="fa fa-info-circle info2" aria-hidden="true"></i> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label">{{ __('signup-modal.REGISTER NOW') }}</button>
                            </div>
                            <p class="terms">{{ __('signup-modal.By clicking register now you agree to our') }}
                                    <a href="{{url('others/terms-conditions')}}">{{ __('signup-modal.Terms & Conditions') }}</a> {{ __('signup-modal.and') }}
                                    <a href="{{url('others/privacy-cookies')}}">{{ __('signup-modal.Privacy') }}</a> {{ __('signup-modal.Policies') }}</p>

                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">{{ __('signup-modal.Already Registered') }}</h4>
                    <p>Cras tinciduent aliquet risus blandit
                        <a href="{{ route('login') }}">{{ __('signup-modal.login here') }}</a>
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