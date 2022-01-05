<ul class="nav nav-tabs">
    <li  @if($tab == 'merchendise') class="active" @endif>
        <a  @if($tab == 'merchendise') data-toggle="tab"  @endif href="{{ url('design-creation') }}" >Your Merchandise</a>
    </li>
    <li @if($tab == 'customise') class="active" @endif>
        <a @if($tab == 'customise') data-toggle="tab" href="#Customise" @endif >Design and Customise</a>
    </li>
    <li @if($tab == 'product') class="active" @endif>
        <a @if($tab == 'product') data-toggle="tab" @endif href="{{ url('manage_merchandise_product') }}" >Manage Your Products</a>
    </li>
</ul>