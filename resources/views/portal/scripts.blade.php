<script>
  
 $(document).ready(function() {
   
   
   var x;

   $('body').on('click', '.edit_category', function (e) {
            // $('#size_val').prop("disabled", null);
            // $('#color_val').prop("disabled", null);

            size_array_multiselect = ['XL','L','S','M','XS','XXL'];
            color_array_multiselect = ['Red','Blue','Green','Orange','Purple','Pink'];
            for(i=0; i<size_array_multiselect.length; i++)
            {
                //alert(trainindIdArray[i]);
                $("#size_val option[value="+size_array_multiselect[i]+"]").prop('selected', false);
                $("#size_val option[value="+size_array_multiselect[i]+"]").prop("disabled",false);
              }
              for(i=0; i<color_array_multiselect.length; i++)
              {
                $("#color_val option[value="+color_array_multiselect[i]+"]").prop('selected', false);
                $("#color_val option[value="+color_array_multiselect[i]+"]").prop("disabled",false);
              }            


              var category_id = $(this).data("id");
              var category_name = $(this).attr("data-module-type");
              var category_image = $(this).attr("data-image");
              var color_val = $(this).attr("data-color");
              var size_val = $(this).attr("data-size");
              
              size_array = jQuery.parseJSON(size_val);
              size_array.substring(1, size_array.length-1);
              size_array = size_array.replace(/\"/g, "");
              traingIds = size_array.replace('[','').replace(']','');
              var trainindIdArray = traingIds.split(',');
              x = traingIds.split(',');

              color_val_array = jQuery.parseJSON(color_val);
              color_val_array.substring(1, color_val_array.length-1);
              color_val_array = color_val_array.replace(/\"/g, "");
              color_val_array = color_val_array.replace('[','').replace(']','');
              
              var trainind_color_IdArray = color_val_array.split(',');
              
              var type = typeof(trainind_color_IdArray);
            //alert(type);
            for(i=0; i<trainindIdArray.length; i++)
            {
                //alert(trainindIdArray[i]);
                $("#size_val option[value="+trainindIdArray[i]+"]").prop('selected', true);
                // $("#size_val option[value="+trainindIdArray[i]+"]").attr('disabled','disabled');                 
              }
              for(i=0; i<trainind_color_IdArray.length; i++)
              {
                $("#color_val option[value="+trainind_color_IdArray[i]+"]").prop('selected', true);
                // $("#color_val option[value="+trainind_color_IdArray[i]+"]").attr('disabled','disabled');
              }          

              
              $("#category_name_modal").val(category_name);
              $("#category_id_modal").val(category_id);
            //$('#myModal').modal('toggle');
         //alert();
       });
   
   
   
   
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   category_dropdown_get();
   
   $( "#search11" ).autocomplete({
    source: function(request, response) {
           // alert();
           $.ajax({
            url: "{{route('admin.autocomplete')}}",
            data: {
              term : request.term
            },
            dataType: "json",
            success: function(data){
                //alert(data);
                  //category_dropdown_get();
                  var resp = $.map(data,function(obj){
                    console.log(obj);
                    return obj.category_name;
                  }); 

                  response(resp);
                }
              });
         },
         minLength: 1
       });  

   function category_dropdown_get()
   {
    $.ajax({
      url:"{{route('admin.category_dropdown')}}",
      type:'GET',
      data:{
        "_token": "{{ csrf_token() }}",
      },
      success:function(data){
                            //$("#category_name_dropdown").empty();
                            $('select[name="category_name_dropdown"]').append('<option value="0" selected="selected">Please select a category name</option>');
                            $.each(data.category_name, function (key, val) {
                              $('select[name="category_name_dropdown"]').append('<option value="'+ val.id +'">'+ val.category_name +'</option>');
                             // console.log(val.category_name);  
                           });                             
                          },
                        });             
  }   

}); 
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.supplier_datatable') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'Email'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  }); 

        // var roles_table = $('.data-table').DataTable({
        // processing: true,
        // serverSide: true,
        // ajax: "{{ route('admin.roles.index') }}",
        // columns: [
        //     {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //     {data: 'name', name: 'name'},
        //     {data: 'action', name: 'action', orderable: false, searchable: false},
        // ]
        // }); 

        

        var category_table = $('#data_table_category').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.categories_datatable') }}",
          columns: [
          {data: 'parent_id', name: 'parent_id'},
          {data: 'category_name', name: 'category_name'},
          {data: 'parent_name', name: 'category_name'},
          {data: 'category_image', name: 'category_image',orderable: false, searchable: false},
          {data: 'action',   name: 'action', orderable: false, searchable: false},
          ],
          "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
          },
          "createdRow": function (row, data, index) {
            var info = category_table.page.info();
            $('td', row).eq(0).html(index + 1 + info.page * info.length);
          },
        });   

        // color data-table
        var color_table = $('#data_table_color').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.colors_datatable') }}",
          columns: [ 
          {data: 'id', name: 'id'}, 
          {data: 'name', name: 'name'}, 
          {data: 'action',   name: 'action', orderable: false, searchable: false},
          ],
          "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
          },
          "createdRow": function (row, data, index) {
            var info = color_table.page.info();
            $('td', row).eq(0).html(index + 1 + info.page * info.length);
          },
        });         
        // alert(JSON.stringify(table));  
        
        var catrgories_save_form = $("#catrgories_save_form");
        catrgories_save_form.submit(function(e){
          // alert(123);
            // $("#category_name_error").hide();

            e.preventDefault();
            var category_name = $("#category_name").val();
            var category_image = $("#category_image").val();
            var category_name_dropdown=$("#category_name_dropdown").val();
            var color_val = $("#color_val").val();
            var size_val = $("#size_val").val();
            if(color_val == '')
            {
              alert("Please select any color");
              return false;
            }
            if(size_val == '')
            {
              alert("Please select any Size");
              return false;
            }
            $('#category_name_error ').append($('<div id="prepend_img"> <img src="{{ asset('portal/img/loading-icon-gif.gif') }}" style="height:15%;width:15%;"></div>'));
            //alert(size_val); 
            var form = new FormData($(this)[0]);

            $.ajax({
              url:"{{route('admin.categoriesSave')}}",
              method:"POST",
              data:form,
              dataType: 'JSON',
              processData: false,
              contentType: false,
              success:function(data){
                if(data.status==false)
                {
                  
                  $.each(data.errors,function(index,value){
                    $("#validation_prepend").remove();
                    $("#prepend_img").remove();                                    
                    $('#category_name_error ').append($('<div id="validation_prepend">'+value[0]+'</div>'));
                    
                    
                  });                                  
                }
                else
                {
                  
                  $("#validation_prepend").remove();
                  $("#prepend_img").remove();                                  
                  $('#category_name_error ').append($('<div id="validation_prepend"></div>'));   
                  $("#category_name").val('');
                  $("#category_name_dropdown").empty();
                  
                  $("#category_create_modal").modal("hide");
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove();
                  
                  category_dropdown_get();
                  category_table.draw(); 
                  location.reload();

                }
              },
            }); 
          });   


        var color_save_form = $("#color_save_form");
        color_save_form.submit(function(e){
          // alert(123);colorsSave
            // $("#category_name_error").hide();

            e.preventDefault();
            var color_name = $("#color_name").val(); 
            $('#color_name_error ').append($('<div id="prepend_img"> <img src="{{ asset('portal/img/loading-icon-gif.gif') }}" style="height:15%;width:15%;"></div>'));
            // alert(color_name); 
            var form = new FormData($(this)[0]); 
            $.ajax({
              url:"{{route('admin.colorsSave')}}",
              method:"POST",
              data:form,
              dataType: 'JSON',
              processData: false,
              contentType: false,
              success:function(data){
                if(data.status==false)
                {
                  
                  $.each(data.errors,function(index,value){
                    $("#validation_prepend").remove();
                    $("#prepend_img").remove();                                    
                    $('#color_name_error ').append($('<div id="validation_prepend">'+value[0]+'</div>')); 
                  });                                  
                }
                else
                { 
                  $("#validation_prepend").remove();
                  $("#prepend_img").remove();                                  
                  $('#color_name_error').append($('<div id="validation_prepend"></div>'));   
                  $("#color_name").val(''); 
                  
                  $("#color_create_modal").modal("hide");
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove(); 
                  color_table.draw(); 
                  location.reload(); 
                }
              },
            }); 
          });

           var color_edit_form = $("#color_edit_form");
        color_edit_form.submit(function(e){ 
            e.preventDefault();
            var color_name = $("#color_name").val(); 
            var color_code = $("#color_code").val(); 
            
            $('#color_update_name_error ').append($('<div id="prepend_img"> <img src="{{ asset('portal/img/loading-icon-gif.gif') }}" style="height:15%;width:15%;"></div>')); 
            var form = new FormData($(this)[0]); 
            $.ajax({
              url:"{{route('admin.colors_update')}}",
              method:"POST",
              data:form,
              dataType: 'JSON',
              processData: false,
              contentType: false,
              success:function(data){
                if(data.status==false)
                { 
                  $.each(data.errors,function(index,value){
                    $("#validation_prepend").remove();
                    $("#prepend_img").remove();
                    if(value[0]){
                      $('#color_update_name_error').append($('<div id="validation_prepend">'+value[0]+'</div>')); 
                    }                                    
                  });      
                   if(data.exist_errors){
                      $('#color_update_name_error').append($('<div id="validation_prepend">'+data.exist_errors+'</div>')); 
                    }                            
                }
                else
                { 
                  $("#validation_prepend").remove();
                  $("#prepend_img").remove();                                  
                  $('#color_update_name_error').append($('<div id="validation_prepend"></div>'));   
                  $("#color_name").val(''); 
                  $("#color_code").val(''); 
                  
                  $("#editcolor_Modal").modal("hide");
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove(); 
                  color_table.draw(); 
                  location.reload(); 
                }
              },
            }); 
          });   

        $('body').on('click', '.edit_category', function (e) { 
          var category_id = $(this).data("id");
          var category_name = $(this).attr("data-module-type");
          var category_image = $(this).attr("data-image");
          $("#category_name_modal").val(category_name);
          $("#category_id_modal").val(category_id);
          $('#myModal').modal('toggle');
        });

        $('body').on('click', '.edit_color', function (e) { 
          var color_id = $(this).data("id");
          var color_name = $(this).attr("data-name"); 
          var color_code = $(this).attr("data-color_code"); 
          $("#color_name").val(color_name);
          $("#color_code").val(color_code);
          $("#color_id").val(color_id);
          $('#editcolor_Modal').modal('toggle');
        });
         
          // $('body').on('submit', '#catrgories_edit_form', function () {
          //   e.preventDefault();
            // var category_id_val=$("#category_id_modal").val();
            // var category_name_val=$("#category_name_modal").val();
            // var category_image_val=$("#category_image_modal").html();
            // var form = new FormData($(this)[0]);
            // form.append('_method','POST');
            // $.ajax({
            //               url:"{{route('admin.categories_update')}}",
            //               type:'method',
            //               data:form,
            //               processData: false,
            //               contentType: false,
            //               success:function(data){
            //                         $("#category_name_dropdown").empty();
            //                         // category_dropdown_get();
            //                         category_table.draw();       
            //                   },
            //           }); 
          // }); 
          // var catrgories_edit_form = $("#catrgories_edit_form");
          // catrgories_edit_form.submit(function(e){
          //   $.ajax({
          //     url:"{{ url('/admin/cupdate') }}"
          //   });
          // });
        });

                  // var sub_catrgories_save_form = $("#sub_catrgories_save_form");
                  // sub_catrgories_save_form.submit(function(e){
                  //   e.preventDefault();
                  //   alert();
                  // });

                  function category_dropdown_get()
                  {
                    $.ajax({
                      url:"{{route('admin.category_dropdown')}}",
                      type:'GET',
                      data:{
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){
                            //$("#category_name_dropdown").empty();
                            $('select[name="category_name_dropdown"]').append('<option value="0" selected="selected">Please select a category name</option>');
                            $.each(data.category_name, function (key, val) {
                              $('select[name="category_name_dropdown"]').append('<option value="'+ val.id +'">'+ val.category_name +'</option>');
                             // console.log(val.category_name);  
                           });                             
                          },
                        });             
                  }                  
                </script>

                