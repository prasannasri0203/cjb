@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
<style type="text/css">
  table.dataTable td {
      vertical-align: middle;
  }
  .success.success_message {
    display: none;
    width: 100%;
    font-size: 14px;
    padding: 10px;
    background: #d8eab2;
    margin-bottom: 10px;
    color: #3fc374;
}
</style>
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Banner Image List</h2>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#banner_image_modal" class="btn btn-primary btn-sm" style="float: right;" data-backdrop="static" data-keyboard="false">Add New Banner</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="success success_message"></div>
            <div class="status-section cate table-responsive" >   
						<table class="table table-bordered featured_video_table" id="featured_video_table">
								<thead>
										<tr>
												<th>No</th>
												<th>Name</th>
                        <th>Image</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>						   
			  		</div>
            </div>
 <div class="modal" id="banner_image_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Create Banner</h4>

                  </div>
                  
                  <!-- Modal body -->
<div class="modal-body">
                  <form enctype="multipart/form-data" action="{{ route('admin.image_save')}}" method="POST" role="form" id="banner_form" >

                  {{ csrf_field() }}             
        <div class="form-group">
                   <input type="text" name="image_name" id="image_name" placeholder="Please enter the name"><span style="color: red;">*</span>
                   <div style="color:red" id="image_name_error"> </div>
                  </div>
                  <div class="form-group">
                    <label style="color: red;">Please upload an image with (1920 * 473) pixels dimension</label>
                   <input type="file" name="banner_image" id="banner_image" style="width: 225px;"><span style="color: red;">*</span>
                   <div style="color:red" id="banner_image_error"> </div>
                  </div> 
                    <div class="form-group">
                    <img id="blah" src="" alt="your image" height="100px;" width="100px"; style="display: none; margin-bottom:20px;" />  
                    </div> 
                        <div class="form-group"> 
                          <select name="type_name" id="type_name">
                           <option value="" selected="selected">Please select page type</option> 
                           <option value="1" >Banner</option> 
                           <option value="2" >Help</option> 
                           <option value="3" >Detail Page</option> 
                          </select><span style="color: red;">*</span>
                          <div style="color:red" id="type_name_error"> </div>
                        </div>      
                   <button type="submit" class="btn btn-primary" id="category_update" >Submit</button>
                   </form>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="button" id="close_btn" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>



            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>

            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete Video</h4>

								</div>
							</div>
						</div>
					</div>


<script>
            $(document).ready(function(){

            $("#close_btn").click(function(){
              $("#blah").hide();
            });

            $("#banner_image").change(function() {
              var file = this.files[0];
              var fileType = file["type"];
              var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
              if ($.inArray(fileType, validImageTypes) < 0) {
                  $("#banner_image").val('');
                  alert("Please upload image file of GIF,JPEG,PNG Formats");
              }
              else
              {
                readURL(this);
              }
              
            });
            function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#blah').show();
                  $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
            }

                    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
              });
              
              var featured_video_table = $('.featured_video_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.banner_image_get') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'image', name: 'image'},
                  {data: 'action',   name: 'action', orderable: false, searchable: false},
              ],
              "fnCreatedRow": function (row, data, index) {
                  $('td', row).eq(0).html(index + 1);
              },
              "createdRow": function (row, data, index) {
                var info = featured_video_table.page.info();
                $('td', row).eq(0).html(index + 1 + info.page * info.length);
              },
              });
  
        var banner_form = $("#banner_form");
        banner_form.submit(function(e){
            // $("#category_name_error").hide();

            e.preventDefault();
            var form = new FormData($(this)[0]);

            $.ajax({
                          url:"{{route('admin.image_save')}}",
                          method:"POST",
                          data:form,
                          dataType: 'JSON',
                          processData: false,
                          contentType: false,
                          success:function(data){
                                if(data.status==false)
                                {
                                  $.each(data.errors, function (key, val) {
                                    //alert("#" + key + "_error");
                                    $("#" + key + "_error").text(val[0]);
                                  });                           
                                }
                                else
                                {
                                   location.reload();  
                                }
                              },
                      });
            });

        var table = $('.featured_video_table').DataTable();
        $('.featured_video_table').on('click','.delete_func', function(){
          console.log($(this).data("id"))
    if(confirm("Are you sure you want to delete this?")){
          var id = $(this).data("id");
                    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
              });
            $.ajax({
                          url:"{{route('admin.image_status_update')}}",
                          method:"POST",
                          data:{'id' : id},
                          dataType: 'JSON',
                          success:function(data){
                                  if(data.status==true)
                                  {
                                    location.reload();  
                                  }
                              },
                      });  
      }
    else{
        return false;
    }     
                       

        });

        });

              
            </script>            
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection


