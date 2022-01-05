<ul class="left_menu regular slider">
    <li @if(@$activeSidebar == 'dashboard') class="active" @endif>
        <a href="{{ url('dashboard') }}">
            <i class="fa fa-home"></i>
            <span>{{ __('user-sidebar.Home') }}</span>
        </a>
    </li>
    
    <li @if(@$activeSidebar == 'order_list') class="active" @endif>
        <a href="{{ url('order_list') }}">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Orders') }}</span>
        </a
    </li>
    <li @if(@$activeSidebar == 'artist_sale_product') class="active" @endif>
        <a href="{{ url('artist_sale_product') }}">
            <i class="fa fa-home"></i>
            <span>Sale Order</span>
        </a>
    </li>

    @if(isset(Auth::user()->type) && Auth::user()->type == 1)
      <?php 
     if(isset(\Auth::user()->is_own_shop) && \Auth::user()->is_own_shop==1){ ?>

    <li>
        @php
        $id = Auth::user()->id;
        $user = App\User::where('id',$id)->first();
        @endphp
        <a href="{{ URL('shop/'.$user->name) }}">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.View Shop') }}</span>
        </a>
    </li>
    <li @if(@$activeSidebar == 'Creation-Station') class="active" @endif>
        <a href="{{ url('design-creation') }}">
            <i class="fas fa-paint-roller"></i>
            <span> {{ __('user-sidebar.Creation Station') }}</span>
        </a>
    </li><?php } ?>
    <li @if(@$activeSidebar == 'address-book') class="active" @endif>
        <a href="{{ url('address_book/list') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Address Book') }}</span>
        </a>
    </li>
    <li @if(@$activeSidebar == 'affiliate') class="active" @endif>
        <a href="{{ url('2fa') }}">
            <i class="fas fa-user-friends" aria-hidden="true"></i>
            <span> {{ __('2FA') }}</span>
        </a>
    </li>
    <li @if(@$activeSidebar == 'video-gallery') class="active" @endif>
        <a href="{{ url('media-gallery') }}">
            <i class="fas fa-images"></i>
            <span>{{ __('user-sidebar.Video Gallery') }}</span>
        </a>
    </li>
    <li @if(@$activeSidebar == 'emojis') class="active" @endif>
    <a href="{{route('artist.emoji_list')}}">
            <i class="fas fa-smile" aria-hidden="true"></i>
            <span>{{ __('user-sidebar.Emoji List') }}</span>
        </a>
    </li>
    <!-- <li @if(@$activeSidebar == 'referral') class="active" @endif>
    <a href="{{ url('referral') }}">
            <i class="fas fa-smile"></i>
            <span>{{ __('Referral ') }}</span>
        </a>
    </li> -->
      <?php 
     if(isset(\Auth::user()->is_own_shop) && \Auth::user()->is_own_shop==1){ ?>
    <li @if(@$activeSidebar == 'customise-theme') class="active" @endif>
    <a href="{{ url('theme')}}">
            <i class="fas fa-palette" aria-hidden="true"></i>
            <span>{{ __('Customise Theme') }}</span>
        </a>
    </li><?php } ?>
    
    <li @if(@$activeSidebar == 'affiliate') class="active" @endif>
        <a href="{{ url('affiliate') }}">
            <i class="fas fa-user-friends" aria-hidden="true"></i>
            <span> {{ __('Affiliates') }}</span>
        </a>
    </li>
    @endif
    <li @if(@$activeSidebar == 'edit-profile') class="active" @endif>
        <a href="{{ url('edit-profile') }}">
            <i class="fa fa-edit"></i>
            <span> {{ __('user-sidebar.Edit Profile') }}</span>
        </a>
    </li>
    @if(isset(Auth::user()->type) && Auth::user()->type == 2)
    <li @if(@$activeSidebar == 'address-book') class="active" @endif>
        <a href="{{ url('address_book/list') }}">
            <i class="fas fa-user" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Address Book') }}</span>
        </a>
    </li>
    @php
    $id = Auth::user()->id;
    $user = App\User::where('id',$id)->first();
    @endphp
    @if($user->type !=2) 
    <li>
        
        <a href="{{ URL('shop/'.$user->name) }}">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.View Shop') }}</span>
        </a>
    </li>
    @endif
	@endif
</ul>
