<style type="text/css">    
    :checked + span {
        font-weight: bold;
        color: #00aff0;
    }
</style>
<!-- Mercendise Content -->
<div id="Merchandise" class="tab-pane fade in active">
    <div class="createstatn_cont merchandise_content">
        <p class="txt"> You currently have <span class="blue_clr"><?php echo count($products); ?></span>/20 items of merchandise in your collection</p>
        <div class="tshirt_sec cs1b cs_mobile_hide">
            <div class="row">
                <!-- Single merchedise product -->
                @foreach($products as $k => $product)
                @if(@$product->AMProduct)
                    <div class="prod_blk">
                        <a href="{{ url('design-creation') }}/{{$product->AMProduct->id}}?type=product">
                            <div class="tshirt_cart">
                                <?php $filePath = asset('portal/img/product').'/'.@$product->AMProduct->ProductImages[0]['image']; $del_url = \URL::to('artist/merchendise').'/'.$product->AMProduct->id.'/delete'; ?>
                                <img src="{{$filePath}}" class="img-responsive uploadimg">                                                              
                                <a href="{{$del_url}}" class="wishlisticon">
                                    <span>
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </a>
                                <div class="price_cart">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>
                                                @foreach(@$product->AMProduct->product_category as $category)                                                                        
                                                    <span>{{$category->category_name}}</span> >
                                                @endforeach
                                                <span>{{ $product->AMProduct->product_name }}</span> 
                                                <span class="info_icon"><i class="fa fa-info-circle"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @endforeach
                <!-- Single merchedise product -->
            </div>
        </div>
        <p class="txt">
            @if($categories)<button class="btn add_item" id="category_prd">ADD NEW ITEM <i class="fa fa-plus-circle"></i> </button>@endif
            <span>or select one of our preset collections:
                @if($presets)
                <select name="product_category" id="product_category" class="form-control ">
                    <option value="">Please Select</option>
                    @foreach($presets as $k => $preset)
                    <option value="{{ $preset->id }}">{{ $preset->collection_name }}</option>
                    @endforeach 
                </select>
                @else
                    <p class="txt"><span>No preset collection is available to customise...</span></p>
                @endif
            </span>
        </p>
        @if($categories)
        <div class="filter_por" id="category_prd_cont" style="display: none;">
            <hr>
            <p class="txt">Add a new item</p>
            <ul class="filter_drop" id="prd_cat_filter">
                @foreach($categories as $k => $category)
                <li>
                    <label><input type="checkbox" class="form-control" name="prd_cat_filter_value[]" value="{{ $category->id }}"><span>{{ $category->category_name }} [{{$category->product_category_count}}]</span></label>
                </li>
                @endforeach
                <!-- <li>
                    <label><input type="checkbox" class="form-control" name="prd_cat_filter_value" value="7">tester <span>[7]</span></label>
                </li> -->
            </ul>
        </div>
        <hr style="border-top: 2px solid #ed1278;">
        <div class="createstatn_cont merchandise_content active">
            <!-- <section id="demos" class="container ws_ordershop ws_ordershop createstn_demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel owl-theme tshirt_sec owl-loaded owl-drag restshirt">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-833px, 0px, 0px); transition: all 0.25s ease 0s; width: 2084px;">
                                    <div class="owl-item active" style="width: 396.667px; margin-right: 20px;">
                                        <div class="item">
                                            <div class="prod_blk">
                                                <div class="tshirt_cart">
                                                    <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                    <a href="#" class="wishlisticon"><span><i class="fa fa-plus-circle"></i></span></a>
                                                    <div class="price_cart">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <p><span>Tshirts</span> &gt;<span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav">
                                <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
                                <button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button>
                            </div>
                            <div class="owl-dots">
                                <button role="button" class="owl-dot"><span></span></button>
                                <button role="button" class="owl-dot active"><span></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <div class="aj_tshirt_sec tshirt_sec cs1b cs_mobile_hide">
                <div class="row">
                    <!-- <div class="prod_blk">
                        <div class="tshirt_cart">
                            <img src="{{@$filePath}}" class="img-responsive uploadimg">
                            <a href="#" class="wishlisticon"><span><i class="fa fa-plus-circle"></i></span></a>
                            <div class="price_cart">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p><span>Tshirts</span> &gt;<span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Merchendise Content -->

<script type="text/javascript">
             $(".filter_drop label").click(function(){
     $(this).toggleClass("active");
     }); 
     /*
      $(".clearall").click(function(){
     $(".filter_drop label").removeClass("active");
     });   
     
    $(".mobclearall").click(function(){
     $(".mob_drop_filter label").removeClass("active");
     });   
     
              $(".closedrop").click(function(){
     $(".drop_filter").slideToggle();
                       $(".cate").removeClass("togcate");
     });     
              
     
     $(".drop_filter").hide();
     
               $(".cate").click(function(){
     $(".drop_filter").slideToggle();
     }); 
     
     $(".cate").click(function(){
     $(".cate").toggleClass("togcate");
     }); 
     
     $(".mob_filt").click(function(){
     $(".mob_dro").slideToggle();
      $(".mob_filt").toggleClass("filtdro");
     }); 
     */
</script>
<script>
    $(document).ready(function() {
      
        // Checkboxes click function
        $('#prd_cat_filter input[type="checkbox"]').on('click',function(){
            // Here we check which boxes in the same group have been selected
            // Get the current group from the class
            // var group = '$(this).attr("class")';
            var type = 'category_filter';
            var checked = [];

            // Loop through the checked checkboxes in the same group
            // and add their values to an array
            $('.filter_por input[type="checkbox"]:checked').each(function(){
                checked.push($(this).val());
            });

            getProductList(checked, type);
        });
        
        // function refreshData($values, $group){
        //     alert("You've requested: " + $values + " from the group " + $group);
        // }

        
    });

    $('#product_category').change(function(){
        var product_category = $("#product_category").val();
        var type = 'preset_filter';
        // console.log('--'+product_category+'--');

        if ( Number(product_category) > 0) {
            $("#category_prd_cont").toggle();
            getProductList(product_category, type);
        }
    });

    function getProductList($values, $type) {
        $('.aj_tshirt_sec .row').html('');
        var imgFolder = "{{ asset('portal/img/product') }}/";
        var aFP = "{{ \URL::to('artist/merchendise') }}/";
        var _token = "{{ csrf_token() }}";
        var product_category = $values;
        var type = $type;
        // console.log('Select field value has changed to ' + product_category);
        // console.log("You've requested: " + product_category + " from the type " + type);

        $.ajax({ type: "POST",
            url: "{{ url('/category/product') }}",
            data: {
                product_category: product_category, _token : _token, type : type
            },
            success: function(data) {
                if(data.status == true) {
                    var res='';
                    $.each(data.products, function(i, v) {
                        console.log(v);
                        if(v) {
                        res +=                                
                        '<div class="prod_blk">'+
                            '<div class="tshirt_cart">'+
                                '<img src="'+imgFolder+v.product_images[0].image+'" class="img-responsive uploadimg">'+
                                '<a href="'+aFP+v.id+'/add" class="wishlisticon"><span><i class="fa fa-plus-circle"></i></span></a>'+
                                '<div class="price_cart">'+
                                    '<div class="row">'+
                                        '<div class="col-xs-12">'+
                                            '<p><span>'+v.product_category.category_name+'</span> &gt;<span>'+v.product_name+'</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                        }
                    });

                    $('.aj_tshirt_sec .row').html(res);

                }
            },
            error:function(e){
                // alert("something wrong"+ e)
                console.log("something wrong"+ e);
            }
        });
    }
    $("#category_prd").click(function() { 
        // assumes element with id='button'
        $("#category_prd_cont").toggle();
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