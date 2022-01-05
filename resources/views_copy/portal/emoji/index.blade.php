@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Artwork List</h2>
							<a href="{{ route('admin.emojiCreate') }}" class="btn btn-primary" style="float: right;">Create Artwork</a>
            </div>
          </header>
          <section>
            <div class="container-fluid">
            <div class="status-section cate table-responsive">
            <div class="filters_wr"></div>
           
						<table class="table table-bordered emoji">
            <!-- <div>
            <span>User Type Filter</span>
            <select class="change_status">
              <option value="">Change status</option>
              <option value="0">Admin</option>
              <option value="1">Artist</option>
              <option value="2">Customer</option>
            </select>
            </div> -->
								<thead>
										<tr>
                                                <th>No</th>
                                                <th>User Type</th>
												                        <th>Emoji Name</th>
                                                <th>Image</th>
                                                <th>Commision</th>
                                                <th>status</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
                                    @foreach ($emojis as $key=>$emoji)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>@if($emoji->user_type == 0)Admin @else Artist @endif</td>
                                        <td>{{$emoji->image_name}}</td>
                                        <td><div><img style="width: 100px; height: 100px;" src="{{asset('/uploads/emoji/'.$emoji->file)}}"></div></td>
                                        <td>{{$emoji->commision}}</td>
                                       <td>@if($emoji->status == '0')<div class="btn-group"><button type="button" id="status{{$emoji->id}}" class="status btn btn-warning">Pending</button></div>@elseif($emoji->status == '1')<div class="btn-group"><button type="button" id="status{{$emoji->id}}" data-id="{{$emoji->id}}" class="status btn btn-success">Active</button></div>@else<div class="btn-group"><button type="button" id="status{{$emoji->id}}" data-id="{{$emoji->id}}" class="status btn btn-danger">Inactive</button></div>@endif</td>
                                        <td width="280px"><div><select class="change_status" data-id="{{$emoji->id}}" ><option value="">Change status</option><option value="1">Active</option><option value="0">Pending</option><option value="2">inactive</option></select></div></td>
                                    </tr>
                                    @endforeach

								</tbody>
						</table>
			  		</div>
            </div>
			<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setUserId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/emoji/delete')}}">
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
<script>
$(document).ready( function() {
				$('.success').delay(1000).fadeOut();
				});
		function setUserId(id){
		$('#userId').val(id);
		}

        $('.emoji').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
      })


      $('.change_status').on("change",function(){
            var id= $(this).attr("data-id");
            var value=$(this).find(':selected').val();

            $.ajax({
              url:'/admin/emoji_list/status',
              dataType: 'JSON',
              type:'get',
              cache:true,
              data: {
                id: id,
                value: value
              },
              success:  function (response) {
                  var status= response.status;
                  $('#status'+id).toggleClass('status');
                  if(status == '0'){
                    $('#status'+id).removeClass().addClass('status btn btn-warning');
                    $('#status'+id).text('Pending');
                  }else if(status == '1')
                  {
                    $('#status'+id).removeClass().addClass('status btn btn-success');
                    $('#status'+id).text('Active');
                  }else
                  {
                    $('#status'+id).removeClass().addClass('status btn btn-danger');
                    $('#status'+id).text('Inactive');
                  }

              },
      });
        });
		</script>
  <!-- end of plugin scripts -->
@endsection


