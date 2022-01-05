<ul class="left_menu regular slider">
    <li @if(@$activeSidebar == 'dashboard') class="active" @endif>
        <a href="{{ url('dashboard') }}">
            <i class="fa fa-home"></i>
            <span>{{ __('user-sidebar.Home') }}</span>
        </a>
    </li>
    <li @if(@$activeSidebar == 'order_list') class="active" @endif>
        <a href="{{ url('order_list') }}">
            <i class="fas fa-shopping-basket" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Orders') }}</span>
        </a>
    </li>@if(Auth::user()->type == 1)
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
    </li>
    <li @if(@$activeSidebar == 'address-book') class="active" @endif>
        <a href="{{ url('address_book/list') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Address Book') }}</span>
        </a>
    </li>
    <li @if(@activeSidebar == 'video-gallery') class="active" @endif>
        <a href="{{ url('media-gallery') }}">
            <i class="fas fa-images"></i>
            <span>{{ __('user-sidebar.Video Gallery') }}</span>
        </a>
    </li>
    <li @if(@activeSidebar == 'emojis') class="active" @endif>
    <a href="{{route('artist.emoji_list')}}">
            <i class="fas fa-smile" aria-hidden="true"></i>
            <span>{{ __('user-sidebar.Emoji List') }}</span>
        </a>
    </li>
    <li @if(@activeSidebar == 'referral') class="active" @endif>
    <a href="{{ url('referral') }}">
            <i class="fas fa-smile"></i>
            <span>{{ __('Referral ') }}</span>
        </a>
    </li>
    <li @if(@activeSidebar == 'customise-theme') class="active" @endif>
    <a href="{{ url('theme')}}">
            <i class="fas fa-palette" aria-hidden="true"></i>
            <span>{{ __('Customise Theme') }}</span>
        </a>
    </li>
    @endif
    <li @if(@$activeSidebar == 'edit-profile') class="active" @endif>
        <a href="{{ url('edit-profile') }}">
            <i class="fas fa-edit"></i>
            <span> {{ __('user-sidebar.Edit Profile') }}</span>
        </a>
    </li>
    @if(Auth::user()->type == 2)
    <li @if(@$activeSidebar == 'address-book') class="active" @endif>
        <a href="{{ url('address_book/list') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span> {{ __('user-sidebar.Address Book') }}</span>
        </a>
    </li>
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
	@endif
</ul>
