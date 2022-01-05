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