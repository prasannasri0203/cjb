    <div class="modal fade changeuser changelog" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close logclose" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('login-modal.Existing users Login') }}... </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ route('admin.login') }}">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">{{ __('login-modal.Email') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">{{ __('login-modal.Password') }}:</label>
                            <div id="show_hide_password" class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field1" name="password" required/>
                                <div class="input-group-addon" style="position: absolute;top: 10px;">
                                   <a href=""></i><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                               <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span> -->
                                <!-- <i class="fa fa-info-circle" aria-hidden="true"></i>  -->
                            </div>
                        </div>
                        <div class="form-group forgot">
                            <div class="col-sm-9 col-xs-12 pull-right">
                                <a href="{{ url('password/reset') }}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label">{{ __('login-modal.LOGIN') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">{{ __('login-modal.New to') }} Cool Jelly Bean?</h4>
                    <p>
                        <a href="{{ route('signup') }}">{{ __('login-modal.Register now') }}</a> {{ __('login-modal.to start making money') }}! {{ __("login-modal.It’s FREE") }}!</p>
                </div>
            </div>
        </div>
        <div class="tooltip_content">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    