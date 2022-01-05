<style type="text/css">    
    :checked + span {
        font-weight: bold;
        color: #00aff0;
    }

    
.createstatn_cont.merchandise_content span {
    text-transform: capitalize;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    width: 65px;
}

span.info_icon {
    text-align: end;
    width: auto !important;
}
</style>
<!-- Mercendise Content -->
<div id="Merchandise" class="tab-pane fade in active">
    <div class="createstatn_cont merchandise_content">
        <p class="txt"> You currently have <span class="blue_clr"><?php echo count($products); ?></span>/20 items of merchandise in your collection</p>
        <div class="tshirt_sec cs1b">
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
            <span class="add_item_mobile">or select one of our preset collections:
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">


  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span data-id="0" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span data-id="0" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
         </div>
<!--          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Corp Image</button>
         </div> -->
      </div>
   </div>
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
        var add_x;
        var dec_y;
      
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
                                '<img src="'+imgFolder+v.product_images[0].image+'" class="img-responsive uploadimg product_id" data-id="'+v.id+'" >'+
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

    $(document).on('click', '.product_id', function(){ 
        var product_id = $(this).attr("data-id");
        var _token = "{{ csrf_token() }}";
        var imgFolder = "{{ asset('portal/img/product') }}/";
        //$('#myModal').modal('show'); 
        // $(".carousel-indicators").empty();
        // $(".carousel-inner").empty();
  
                $.ajax({
                    url: "{{ url('/get_promotional_image') }}",
                    type: 'POST',
                    data: {_token: _token, product_id:product_id},
                    dataType: 'JSON',
                    success: function (data) { 
                        
                        if(data.status == true)
                        {
                            if(data.images)
                            {
                                //alert(data.images.length)
                                add_x=data.images.length;
                                if(add_x > 0)
                                    {
                                    console.log(data.images);
                                    var x = 0                               
                                   $.each(data.images, function(key,val) { 
                                    if(x == 0)
                                    {
                                        active = "active";
                                    }
                                    else
                                    {
                                        active = "";
                                    }
                                    image = imgFolder+val.image;
                               $('.carousel-indicators').append("<li data-target='#myCarousel' data-slide-to='"+x+"' class='"+active+"'></li>")
                                $('.carousel-inner').append("<div class='item "+active+" active_class_"+x+"'><img src='"+image+"' alt='Chania' width='460' height='345'><div class='carousel-caption'></div></div>"); 
                                    x++;  
                                    });
                                }  
                                else
                                {
                                    // alert("No Promo images");
                                    return false;
                                }
                                                             
                            }
                        }
                        $('#myModal').modal('show'); 
                    }
                }); 


    }); 
    $(".glyphicon-chevron-right").click(function(){
        
        data_id = $(".glyphicon-chevron-left").data("id");
    	//alert(data_id);
        if(add_x > 1)
        {
        	alert(next);
            next = parseInt(data_id)+1;
            $(".item").removeClass("active");
            $(".active_class_"+next).addClass("active");
            $(this).attr('data-id', next);         
        }

    });
    $(".glyphicon-chevron-left").click(function(){
        
        data_id = $(".glyphicon-chevron-right").data("id");
        if(data_id >= 1)
        {
             next = parseInt(data_id)-1;
            $(".item").removeClass("active");
            $(".active_class_"+next).addClass("active");
            $(this).attr('data-id', next);           
        }

    });
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