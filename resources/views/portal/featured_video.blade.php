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
.video_hint{
    color: #f00;
    font-size: 12px;
    font-style: italic;
}
.hint_url{
    /* color: #f00; */
    font-size: 10px;
    /* font-style: italic; */
}
</style>
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Featured Video</h2>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#category_create_modal" class="btn btn-primary btn-sm" style="float: right;" data-backdrop="static" data-keyboard="false">Add Featured Video</a>
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
                        <th>Page Type</th>
                        <th>Modified On</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>						   
			  		</div>
            </div>
 <div class="modal" id="category_create_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <form  action="" method="POST" role="form" id="you_tube_link_save_form"  class="custom-form">

                      {{ csrf_field() }}             
                      <input type="hidden" name="status" value="0"> 
                      <input type="hidden" name="event" value="create"> 
                        <div class="form-group">
                          <label for="usr">Page Type: <span class="mandatory_field">*<span></label>
                          <select requried class="form-control" name="type" id="type">
                            <option value="">{{ 'Please Select Page Type' }} </option>
                            <option value="Home">{{ 'Home' }} </option>
                            <option value="Help">{{ 'Help' }} </option>
                            <option value="Category">{{ 'Category' }} </option>
                          </select>
                          <div class="error" id="type_error"></div>  
                        </div>    
                        <div class="form-group">
                          <label for="usr">Video Description: <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="video_description" id="video_description" value="">
                          <div class="error" id="video_description_error"></div>  
                        </div>                                        
                        <div class="form-group">
                          <label for="usr">Youtube Link: <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="video_link" id="video_link" onchange="validateYouTubeUrl(this)" value="">
                          <span class="video_hint">*Watch Url <span class="hint_url">(https://www.youtube.com/watch?v=DrbIoDLIaQo)</span></span>
                          <div class="error" id="video_link_error"></div>  
                        </div> 
                        <div class="form-group">
                        <input type="submit" class="" id="usr">
                        </div>               
                  </form> 
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="button" id="" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>

              <div class="modal" id="editYoutubeLink">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <form  action="" method="POST" role="form" id="you_tube_link_edit_form"  class="custom-form">
                      {{ csrf_field() }}             
                      <input type="hidden" name="status" value="0"> 
                      <input type="hidden" name="event" value="update"> 
                      <input type="hidden" name="video_edit_id" id="video_edit_id"> 
                        <div class="form-group">
                          <label for="usr">Page Type: <span class="mandatory_field">*<span></label>
                          <select requried class="form-control" name="type" id="type_edit">
                            <option value="">{{ 'Please Select Page Type' }} </option>
                            <option value="Home">{{ 'Home' }} </option>
                            <option value="Help">{{ 'Help' }} </option>
                            <option value="Category">{{ 'Category' }} </option>
                          </select>
                          <div class="error" id="type_edit_error"></div>  
                        </div> 
                        <div class="form-group">
                          <label for="usr">Video Description: <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="video_description" id="video_description_edit" value="">
                          <div class="error" id="video_description_edit_error"></div>  
                        </div>                                        
                        <div class="form-group">
                          <label for="usr">Youtube Link: <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="video_link" id="video_link_edit" onchange="validateYouTubeUrl(this)" value="">
                          <div class="error" id="video_link_edit_error"></div>  
                        </div> 
                        <div class="form-group">
                        <input type="submit" class="" id="usr">
                        </div>               
                  </form> 
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="button" id="" class="btn btn-danger" data-dismiss="modal">Close</button>
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
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setVideoId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/featured_video/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setVideoId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>


<script>
            $(document).ready(function(){

                    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
              });
              
              var featured_video_table = $('.featured_video_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.featured_video') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'video_description', name: 'video_description'},
                  {data: 'image',   name: 'image', orderable: false, searchable: false},
                  {data: 'type', name: 'type'},
                  {data: 'date',   name: 'date', orderable: false, searchable: false},
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
  

              $('body').on('click', '.video', function () {
                      var theModal = $(this).data("target"),
                      videoSRC = $(this).attr("data-video"),
                      videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                      $(theModal + ' iframe').attr('src', videoSRCauto);
                      $(theModal + ' button.close').click(function () {
                        $(theModal + ' iframe').attr('src', videoSRC);
                      });
              });      

              $("#you_tube_link_save_form").submit(function(e) {
                e.preventDefault(); 
                var data = document.getElementById("you_tube_link_save_form");
                var form_data=new FormData(data);
                $.ajax({
                          url:"{{route('admin.featured_videoAdd')}}",
                          type:'POST',
                          headers:  {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }, 
                          processData: false,
                          contentType: false,        
                          data:form_data,  
                          success:function(data){
                                if(data.status==false)
                                {
                                  $.each(data.errors, function (key, val) {
                                    $("#" + key + "_error").text(val[0]);
                                  });  
                                } 
                                else
                                {
                                  $('.success_message').show();
                                  $('.success_message').html(data.message);
                                  $('.close').trigger('click');
                                  $('.modal-backdrop.show').hide();
                                  $('#you_tube_link_save_form').trigger("reset");
                                  myFunction();
                                  featured_video_table.draw();
                                }                             
                              },
                      }); 
              });

              $("#you_tube_link_edit_form").submit(function(e) {
                e.preventDefault(); 
                var data = document.getElementById("you_tube_link_edit_form");
                var form_data=new FormData(data);
                $.ajax({
                          url:"{{route('admin.featured_videoEdit')}}",
                          type:'POST',
                          headers:  {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }, 
                          processData: false,
                          contentType: false,        
                          data:form_data,  
                          success:function(data){
                                if(data.status==false)
                                {
                                  $.each(data.errors, function (key, val) {
                                   
                                    $("#" + key + "_edit_error").text(val[0]);
                                  });  
                                } 
                                else
                                {
                                  $('.success_message').show();
                                  $('.success_message').html(data.message);
                                  $('.close').trigger('click');
                                  myFunction();
                                  featured_video_table.draw();
                                }                             
                              },
                      });                 

              });

          


              $('body').on('click', '.edit_video_link', function () {
            var video_id = $(this).data("id");
             var video_description = $(this).attr("data-video-description");
             var video_link = $(this).attr("data-video-link");
             var video_type = $(this).attr("data-video-type");
            $("#type_edit").val(video_type);
            $("#video_description_edit").val(video_description);
            $("#video_link_edit").val(video_link);
            $("#video_edit_id").val(video_id);
             $('#editYoutubeLink').modal('toggle');
          });
          // $('body').on('click', '#category_update', function () {
          //   var category_id_val=$("#category_id_modal").val();
          //   var category_name_val=$("#category_name_modal").val();
          //   $.ajax({
          //                 url:"{{route('admin.categoriesUpdate')}}",
          //                 type:'POST',
          //                 data:{
          //                       "_token": "{{ csrf_token() }}",
          //                       "category_id": category_id_val,
          //                       "category_name": category_name_val,
          //                      },
          //                 success:function(data){
          //                           $("#category_name_dropdown").empty();
          //                           category_dropdown_get();
          //                           category_table.draw();       
          //                     },
          //             }); 
          // }); 



            });

            function validateYouTubeUrl(link)
              {
                //alert($(link).attr('id'));
                    var error_id=$(link).attr('id');
                    //alert("#"+error_id+"_error");
                    var url = $(link).val()
                      if (url != undefined || url != '') {
                          var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                          var match = url.match(regExp);
                          if (match && match[2].length == 11) {
                              //alert('dd');
                              $("#"+error_id+"_error").text('');
                          }
                          else {
                              //alert('Enter a URL or the embed code of youtube link');
                              $(link).val('')
                              $("#"+error_id+"_error").text('Enter a URL or the embed code of youtube link');
                          }
                      }
              }

              $(document).ready( function() {
                // $('.success').delay(1000).fadeOut();
              });
              function setVideoId(id){
              $('#userId').val(id);
              }

              function myFunction() {
                setTimeout(function() {
                    $('.success_message').fadeOut('fast');
                }, 6000);
              }
              
            </script>            
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection


