<style type="text/css">
    .image_tools {
        /*position: relative;
        top: 360px;*/
    }
</style>
<div id="Customise" class="tab-pane fade in active ">
    <div class="createstatn_cont customise_content">

        <div class="container-fluid product_editor crebb ipad_pfrm">
            <div class="row">
                <div id="shirtDiv" class="col-sm-6">
                    <img src="{{ asset('portal/img/product') }}/{{$product->pv_image}}" alt="" class="img-responsive edituser_img edituser_img">
                    <div id="drawingArea"
                         style="position: absolute;top: 100px;left: 165px;z-index: 10;width: 200;height: 360;">
                        <canvas id="tcanvas" width="200" height="360" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3>Basic T-shirt</h3>
                    <form class="form-horizontal" action="">
                        <div class="form-group">
                            <label class="control-label col-sm-5">Cost Price:</label>
                            <div class="col-sm-7">
                                <label class="control-label boldprice">£16.50</label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-5 ">Your Price:</label>
                            <div class="col-sm-7 currency-rt sign_sym">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5 ">Your Profit:</label>
                            <div class="col-sm-7 currency-rt sign_sym">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label class="control-label">Choose Available Colours:</label>
                                <label class="control-label sublabel">(Click to select / deselect)</label>
                            </div>
                            <div class="col-sm-7 colpickers">
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#ffffff">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#e6c8a6">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#b7d5f7">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#edf9b1">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#deaab6">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <input type="color" id="colorpicker" name="color" value="#edced6">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">Available Sizes:</label>
                            <div class="col-sm-7">
                                <label class="control-label">XXL, XL, M, S, XS</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">Name Your Creation:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">Describe Your Creation:</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-group t_tip">
                            <label class="control-label col-sm-5">Add Category keywords:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-group form-group t_tip">
                            <label class="control-label col-sm-5">Add Search keywords:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default savecrea">SAVE CREATION</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div class="image_tools">
                        <ul>
                            <li class="camera_modal"><i class="fa fa-camera" aria-hidden="true"></i></li>
                            <li class="text_modal"><i class="fa fa-font" aria-hidden="true"></i></li>
                            <li id="text-bgcolor"><i class="fa fa-text-width" aria-hidden="true"></i></li>
                            <li><i  id="bring-to-front" class="fa fa-undo" aria-hidden="true"></i> <i id="send-to-back" class="fa fa-repeat" aria-hidden="true"></i></li>
                            <li id="remove-selected"><i class="fa fa-trash" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">&nbsp;</div>
                <div class="col-sm-6">
                    <div class="clearfix">
                        <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                    title="Font Style"><i class="fa fa-font" style="width:19px;height:19px;"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad
                                        Pro</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic
                                        Sans MS</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler
                                        Text</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a>
                                </li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                                </li>
                            </ul>
                            <button id="text-bold" class="btn" data-original-title="Bold"><img src="{{asset('/img/font_bold.png')}}"
                                                                                               height="" width="">
                            </button>
                            <button id="text-italic" class="btn" data-original-title="Italic"><img
                                        src="{{asset('/img/font_italic.png')}}" height="" width=""></button>
                            <button id="text-strike" class="btn" title="Strike" style=""><img
                                        src="{{asset('/img/font_strikethrough.png')}}" height="" width=""></button>
                            <button id="text-underline" class="btn" title="Underline" style=""><img
                                        src="{{asset('/img/font_underline.png')}}"></button>
                            <a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input
                                        type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
                            <a class="btn" href="#" rel="tooltip" data-placement="top"
                               data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor"
                                                                              class="color-picker" size="7"
                                                                              value="#000000"></a>
                            <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h3>Item Details</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <p>
                        </p><p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                            id est laborum.</p>
                </div>
            </div>
        </div>

    </div>
</div>


    <!--add img tshirt popup -->
    <div class="modal fade changeuser" id="camera_modal_view" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Your arwork</h4>
                </div>
                <div class="modal-body">
                    <p>Upload a new photo from your device:</p>
                    <div class="file-upload">
                        <label for="file-upload" class="file-upload__label">UPLOAD</label>
                        <input class="file-upload__input" type="file" id="file-upload" name="file-upload">
                    </div>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">Select from your Media Gallery</h4>
                    <div class="media_images1">
                        @foreach ($emojis as $key=>$emoji)
                        <div class="row media_images">
                            <div class="col-xs-6 img-polaroid">
                                <img src="{{asset('/uploads/emoji/'.$emoji->file)}}" class="img-responsive uploadimg" />
                            </div>
                            <div class="col-xs-6 pull-right">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--add img tshirt popup -->

<div class="modal fade changeuser" id="text_modal_view" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Your Content</h4>
                </div>
                <div class="modal-body textadder">
                    <div class="added_texting">
                       <div class="input-append">
                            <input class="form-control span2" id="text-string" type="text"
                                   placeholder="Add text here...">
                            <button id="add-text" class="btn btn-default savecrea" title="Add text here..."><i class="fa fa-share-square-o"></i>
                            </button>
                            <hr>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>



<style>
	.image_tools {
    width: 100%;
    text-align: center;
    display: inline-block;
}

.image_tools ul {
    background: #00d2d3;
    display: inline-block;
    border-radius: 8px;
}

.image_tools ul li {
    font-size: 20px;
    float: left;
    padding: 8px 14px;
    color: #fff;
    cursor: pointer;
}

.product_editor .boldprice {
    font-family: "Rubik-Bold";
}
.colpickers #colorpicker {
    width: 33.5px!important;
    height: 38.5px;
}

.product_editor .colpickers i {
    font-size: 16px;
}

.form-group.t_tip i {
    right: 3px!important;
}

.form-horizontal input {
    width: 97%!important;
}

.form-horizontal textarea {
    width: 97%!important;
}

.savecrea {
    padding: 10px 14px!important;
    font-family: rubik-regular!important;
    font-weight: normal;
    font-size: 15px!important;
}

.createstatn_cont.customise_content {
    padding-top: 30px;
}
</style>


<script>
    $(".camera_modal").click(function() {
        $("#camera_modal_view").show();
    });
    $(".text_modal").click(function() {
        $("#text_modal_view").show();
    });

    $(".close").click(function() {
        $("#camera_modal_view").hide();
            $("#text_modal_view").hide();
        
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {

        var width = {{$desgin_data['prd_drw_wdh']}};
        var width_less = width-1;
        var height = {{$desgin_data['prd_drw_ht']}};
        var height_less = height-1;


       line1 = new fabric.Line([0,0,width,0], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
       line2 = new fabric.Line([width_less,0,width,height_less], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
       line3 = new fabric.Line([0,0,0,height], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});

       // line33 = new fabric.Line([0,0,80,200], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});

       
       line4 = new fabric.Line([0,height,width,height_less], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});

        /*******************************************************************************/
        function getContentImage() {
                                    // var image = canvas.toDataURL("image/png");
                                    // window.open(image, '_blank');

            var activeObject = canvas.getActiveObject(),
                activeGroup = canvas.getActiveGroup();
            if (activeObject) {
                canvas.discardActiveObject();
            }
            else if (activeGroup) {
              var objectsInGroup = activeGroup.getObjects();
              canvas.discardActiveGroup();
            }


            // window.location.href=image; // it will save locally
            html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                // document.body.appendChild(canvas)

                $(canvas).get(0).toBlob(function (blob) {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(blob);
                // Canvas merged with image layer
                // saveAs(blob, performance.now()+".png");

                var canvas_data = new FormData();

                canvas_data.append('layer', $(canvas).get(0).toDataURL("image/png"));
                canvas_data.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: "",
                    data:  canvas_data,
                    enctype: 'multipart/form-data',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success: function(response)
                    {
                        // some code after succes from php
                        console.log(response);
                    },
                    beforeSend: function()
                    {
                        // some code before request send if required like LOADING....
                        console.log('loading');
                    }
                });

                // $('#test').append('<img src="' + imageUrl + '"><br>');
                $('#test').append('<a href="' + imageUrl + '" target="_blank" rel="noopener noreferrer"> T-Shirt Preview ' + Math.floor(performance.now()) + '</a><br>');
                

            });
        })
            ;


            var canvas_data = new FormData();

            canvas_data.append('layer', canvas.toDataURL("image/png"));
            canvas_data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "",
                data:  canvas_data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
                success: function(response)
                {
                    // some code after succes from php
                    console.log(response);
                },
                beforeSend: function()
                {
                    // some code before request send if required like LOADING....
                    console.log('loading');
                }
            });
        }

        function LoadeShirts() {
            $('.loading-blink').loading();
            $('.loading-blink').show();
            getContentImage();
@if($desgin_data['prd_layer'] == '2')
            setTimeout(function () {
                rotate();
            }, 500);
            setTimeout(function () {
                getContentImage();
            }, 1200);
@endif
        }

        /*******************************************************************************/


        // $('#loading-custom-overlay').loading({
        //     overlay: $('#custom-overlay')
        // });
        // $('.loading-blink').hide();

        $('#imgsavejpg').on('click', function () {
            function save() {
                html2canvas(document.querySelector("#test")).then(canvas => {
                    // document.body.appendChild(canvas)
                    $(canvas).get(0).toBlob(function (blob) {
                    // var filesaver = saveAs(blob, "TShirt.png");
                    // filesaver.onwriteend = function () {
                    //     $('.loading-blink').hide();
                    //     $('#test').empty();
                    // }
                    $('.loading-blink').hide();
                    //     $('#test').empty();


                });
            })
                ;
            }

            LoadeShirts();
            setTimeout(function () {
                save();
            }, 1700);

        });

        $('#rotate').click(function (e) {
            e.preventDefault();
            rotate();
        });

        function rotate() {
            $('#thumbFlip').click();
        }

        $("#addimg").on('click', function () {
            $('#imgInp').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatarlist').append('<img class="img-polaroid tt" src="' + e.target.result + '">');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $('#shirtstyle').on('change', function () {
            $('#tshirtFacing').attr("src", "img/t-shirts/" + $(this).val() + "_front.png");
            IMAGE_NAME = $(this).val();
        });


        $('body').on('click', '#thumbFlip', function (e){
           //function() {
                if ($(this).attr("data-original-title") == "Show Back View") {
                    $(this).attr('data-original-title', 'Show Front View');
                    $("#tshirtFacing").attr("src","public/img/t-shirts/{{@$desgin_data['img_thumb']}}");
                    $("#thumbImageView").attr("src","public/img/t-shirts/{{@$desgin_data['img']}}");
                    a = JSON.stringify(canvas);
                    canvas.clear();
                    try
                    {
                       var json = JSON.parse(b);
                       canvas.loadFromJSON(b);
                    }
                    catch(e)
                    {}

                } else {
                    $(this).attr('data-original-title', 'Show Back View');
                    $("#tshirtFacing").attr("src","public/img/t-shirts/{{@$desgin_data['img']}}");
                    $("#thumbImageView").attr("src","public/img/t-shirts/{{@$desgin_data['img_thumb']}}");
                    b = JSON.stringify(canvas);
                    canvas.clear();
                    try
                    {
                       var json = JSON.parse(a);
                       canvas.loadFromJSON(a);
                    }
                    catch(e)
                    {}
                }
                canvas.renderAll();
                setTimeout(function() {
                    canvas.calcOffset();
                },200);
        });

    });

</script>