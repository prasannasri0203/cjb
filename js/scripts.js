   $(document).ready(function() {
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

        var category_table = $('#data_table_category').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.categories_datatable') }}",
        columns: [
            {data: 'parent_id', name: 'parent_id'},
            {data: 'category_name', name: 'category_name'},
            {data: 'parent_name', name: 'category_name'},
            // {data: 'parent_id', name: ''},
            {data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
        }); 

// color
        var category_table = $('#data_table_color').DataTable({
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
        }
        });         
        // alert(JSON.stringify(table));  
        $('body').on('click', '.deleteProduct', function () {
        var product_id = $(this).data("id");
        var module_type=$(this).attr("data-module-type");
        if(module_type=="category")
        {
          var url="{{'category_datatable_status'}}";
          data_table=category_table;
        }
        else
        {
          var url="{{'supplier_datatable_status'}}";
          data_table=table;
        }
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "get",
            url: url+'/'+product_id,
            success: function (data) {
              data_table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        });
        var catrgories_save_form = $("#catrgories_save_form");
        catrgories_save_form.submit(function(e){
            // $("#category_name_error").hide();
             $('#category_name_error ').append($('<div id="prepend_img"> <img src="{{ assets(portal/img/loading-icon-gif.gif) }}" style="height:15%;width:15%;"></div>'));
            e.preventDefault();
            var category_name = $("#category_name").val();
            var category_name_dropdown=$("#category_name_dropdown").val();
            //alert(category_name_dropdown); 
            $.ajax({
                          url:"{{route('admin.categoriesSave')}}",
                          type:'POST',
                          data:{
                                "_token": "{{ csrf_token() }}",
                                "category_name": category_name,
                                "category_name_dropdown": category_name_dropdown,
                               },
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
                                  $('#category_name_error ').append($('<div id="validation_prepend">Succesfully saved</div>'));   
                                  $("#category_name").val('');
                                  $("#category_name_dropdown").empty();
                                  $("#category_create_modal").modal("hide");
                                  category_dropdown_get();
                                  category_table.draw(); 
 
                                }
                              },
                      }); 
          });   

          $('body').on('click', '.edit_category', function () {
            var category_id = $(this).data("id");
            var category_name = $(this).attr("data-module-type");
            $("#category_name_modal").val(category_name);
            $("#category_id_modal").val(category_id);
            $('#myModal').modal('toggle');
          });
          $('body').on('click', '#category_update', function () {
            var category_id_val=$("#category_id_modal").val();
            var category_name_val=$("#category_name_modal").val();
            $.ajax({
                          url:"{{route('admin.categoriesUpdate')}}",
                          type:'POST',
                          data:{
                                "_token": "{{ csrf_token() }}",
                                "category_id": category_id_val,
                                "category_name": category_name_val,
                               },
                          success:function(data){
                                    $("#category_name_dropdown").empty();
                                    category_dropdown_get();
                                    category_table.draw();       
                              },
                      }); 
          }); 

                  var sub_catrgories_save_form = $("#sub_catrgories_save_form");
                  sub_catrgories_save_form.submit(function(e){
                    e.preventDefault();
                    // alert();
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
    
    