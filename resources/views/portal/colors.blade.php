@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
<style>
div.modal div.modal-backdrop {
    z-index: 0;
}
</style>
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Color List</h2>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#color_create_modal" class="btn btn-primary btn-sm" style="float: right;" data-backdrop="static" data-keyboard="false">Add New</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
              <div class="row">
  
                <!-- <div class="col-lg-6">
                  <form action="" method="POST" role="form" id="sub_catrgories_save_form">
                  {{ csrf_field() }}             
                  <input type="hidden" name="status" value="0">                  
                    <div class="form-group">
                      <label for="usr">@lang('general.Category_Name')</label>
                      <input id="search11" name="search" type="text" class="form-control" placeholder="Search" />
                    </div>  
                    <div class="form-group">
                      <label for="usr">@lang('general.Subcategory_Name')</label>
                      <input id="sub_category_name" name="sub_category_name" type="text" class="form-control" />
                    </div>                    
                    <div class="form-group">
                      <input type="submit" class="" id="usr">
                    </div>               
                  </form>
                </div>                              -->
              </div>

              <table class="table table-bordered" id="data_table_color">
								<thead>
										<tr>
												<th>S No</th>
												<th>Color Name </th> 
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>

            <div class="modal" id="editcolor_Modal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Color Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body {{route('admin.colors_update')}} -->
                  <div class="modal-body">
                  <form enctype="multipart/form-data" action="" method="POST" role="form" id="color_edit_form" > 

                  {{ csrf_field() }}              
                   <input type="hidden" name="color_id" id="color_id" value="">  
                        <div class="form-group">
                          <label for="usr">Color Name <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="color_name" id="color_name" value="">
                          <div class="error" id="color_update_name_error"></div>  
                        </div>
                        <div class="form-group">
                          <label for="usr">Color Code <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="color_code" required id="color_code" value="">
                          <div class="error" id="color_update_code_error"></div>  
                        </div>
                           
                             
                  
                   <button type="submit" class="btn btn-primary" id="category_update" >Update</button>
                   </form>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
                  </div> 
                </div>
              </div>
            </div> 
            <div class="modal" id="color_create_modal">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Create Color </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div> 
                  <!-- Modal body -->
                  <form  enctype="multipart/form-data" action="" method="POST" role="form" id="color_save_form">
                      {{ csrf_field() }}                            
                        <div class="form-group">
                          <label for="usr">Color Name <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" required name="name" id="color_name" value="{{ old('color_name') }}">
                          <div class="error" id="color_name_error"></div>  
                        </div>                     
                        <div class="form-group">
                          <label for="usr">Color Code <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="color_code" id="color_code" required value="{{ old('color_code') }}">
                          <div class="error" id="color_code_error"></div>  
                        </div>
                           
                        <div class="form-group">
                          <input type="submit" class="" id="color_add">
                        </div>               
                  </form> 
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" id="color_create_modal_close" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>              

            </div>
            <div id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete Color</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setUserId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{route('admin.color-delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="colorid" name="colorid">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setUserId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>
@endsection

@section('footer_script')
<script type="text/javascript">
	$(document).ready( function() {
		$('.success').delay(1000).fadeOut();

    $("#category_name_dropdown").change(function(){
      var val =$("#category_name_dropdown").val();
      if(val != 0)
      {
        $("#size_val").prop("disabled", true);
        $("#color_val").prop("disabled", true);
      }
      else
      {
        $("#size_val").prop("disabled", false);
        $("#color_val").prop("disabled", false);
      }
    });
	});
	function setUserId(id){
  // alert(id);
		$('#colorid').val(id);
	}
 
</script>
  <!-- end of plugin scripts -->
@endsection
