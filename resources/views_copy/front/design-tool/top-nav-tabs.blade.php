<ul class="nav nav-tabs">
    <li  @if($tab == 'merchendise') class="active" @endif>
        <a  @if($tab == 'merchendise') data-toggle="tab" href="#Merchandise" @endif >Your Merchandise</a>
    </li>
    <li @if($tab == 'customise') class="active" @endif>
        <a @if($tab == 'customise') data-toggle="tab" href="#Customise" @endif >Design and Customise</a>
    </li>
    <li @if($tab == 'product') class="active" @endif>
        <a @if($tab == 'product') data-toggle="tab" href="#Products_wrap" @endif >Manage Your Products</a>
    </li>
</ul>