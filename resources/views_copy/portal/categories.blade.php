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
              <h2 class="no-margin-bottom">Category List</h2>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#category_create_modal" class="btn btn-primary btn-sm" style="float: right;" data-backdrop="static" data-keyboard="false">+Add New</a>
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

              <table class="table table-bordered" id="data_table_category">
								<thead>
										<tr>
												<th>No</th>
												<th>Category Name </th>
                        <th>Parent Category Name</th>
                        <th>Category Image</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>

            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Category Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                  <form enctype="multipart/form-data" action="{{ route('admin.categories_update')}}" method="POST" role="form" id="catrgories_edit_form" >

                  {{ csrf_field() }}             
				<div class="form-group">
                   <input type="text" name="categoery_name" id="category_name_modal">
                  </div>
                  <div class="form-group">
                   <input type="file" name="category_image" id="category_image_modal">
					</div>
                   <input type="hidden" name="category_id" id="category_id_modal">
                        <div class="form-group">
                          <label for="usr">Size</label> 
                          <select name="size_val[]" id="size_val" class="form-control" multiple="multiple" onChange="getSelectedOptions(this)">
                          @foreach($options_varaints as $pov)
                          @if($pov->product_option_id == 1)
                          <option @if($pov->id == 1) selected @endif value="{{$pov->name}}">{{$pov->name}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>
                  
                         <div class="form-group">
                          <label for="usr">Color</label> 
                          <select name="color_val[]" id="color_val" class="form-control" multiple="multiple">
                          @foreach($options_varaints as $pov)
                          @if($pov->product_option_id == 2)
                          <option @if($pov->id == 2) selected @endif value="{{$pov->name}}">{{$pov->name}}</option>
                          @endif
                          @endforeach
                          </select>
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
            <div class="modal" id="category_create_modal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <form  enctype="multipart/form-data" action="" method="POST" role="form" id="catrgories_save_form">
                      {{ csrf_field() }}             
                      <input type="hidden" name="status" value="0">                  
                        <div class="form-group">
                          <label for="usr">Category Name <span class="mandatory_field">*<span></label>
                          <input type="text" class="form-control" name="category_name" id="category_name" value="{{ old('category_name') }}">
                          <div class="error" id="category_name_error"></div>  
                        </div>
                        <div class="form-group">
                          <label for="usr">Category Image </label> 
                          <input type="file" name="category_image" id="category_image">
                        </div>
                        <div class="form-group">
                          <label for="usr">Size</label> 
                          <select name="size_val[]" id="size_val" class="form-control" multiple="multiple">
                          @foreach($options_varaints as $pov)
                          @if($pov->product_option_id == 1)
                          <option @if($pov->id == 1) selected @endif value="{{$pov->name}}">{{$pov->name}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="usr">Color</label> 
                          <select name="color_val[]" id="color_val" class="form-control" multiple="multiple">
                          @foreach($options_varaints as $pov)
                          @if($pov->product_option_id == 2)
                          <option @if($pov->id == 2) selected @endif value="{{$pov->name}}">{{$pov->name}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>                        
                        <div class="form-group mb-0">
                          <label for="parent category name">Parent Category</label>
                        </div>
                        <div class="form-group"> 
                          <select name="category_name_dropdown" id="category_name_dropdown">
                              <!-- @foreach($category_list as $list)
                              <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                              @endforeach -->
                          </select>
                        </div> 
                        <div class="form-group">
                          <input type="submit" class="" id="usr">
                        </div>               
                  </form> 
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" id="category_create_modal_close" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>              

            </div>
            <div id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete Categories</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setUserId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/categories/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
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
  
		$('#userId').val(id);
	}
 
</script>
  <!-- end of plugin scripts -->
@endsection
