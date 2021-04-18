@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Fitness Blog Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddblog">Add Blog</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="blogtable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Blog Type</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.fitness_blog.components.blog-add-modal');
@include('admin.fitness_blog.components.blog-edit-modal');

@endsection

@section('custom-js')

<script type="text/javascript">

$('#blogtable').DataTable({

ajax: baseUrl+'/admin/get-all-fitness-blog',
columns: 
        [
            { data: 'id' },
            { data: 'blog_type.blog_type' },
            { data: 'blog_subject' },
            { data: 'blog_content' },
            {   
                data: null,
                className: "center",
                defaultContent: '<a href="" class="edit_blog btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                        '<a href="" class="remove_blog btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
            }
        ]
});

        // Get All Blog types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-fitness-blog-types',
            success: function(res){
                var blogType = res.data;
                var html ='';
                html+='<option value="0">Select Blog Type</option>';
                for(var x=0; x<blogType.length; x++){
                    html+='<option value="'+blogType[x].id+'">'+blogType[x].blog_type+'</option>';
                }
               $('#blog_type_id').html(html);
            }
        });

       // Add Blog
       $('#btnaddblog').click(function(){
            $('#blogaddmodal').modal('toggle');
        });

        $('#frmcreateblog').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/fitness-blog')}}",
                type: 'POST',
                data: $('#frmcreateblog').serialize(),
                success: function(response){
                    console.log(response.msg);
                    alert(response.msg);
                    location.reload();
                }
            });
        });


 // Edit Blog record
 $('#blogtable').on('click', 'a.edit_blog', function (e) {
        e.preventDefault();
        var data = $('#blogtable').DataTable().row($(this).parents('tr')).data();
        var blogTypeId = data.blog_type_id;

        // Get All Equipment Category
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-fitness-blog-types',
            success: function(res){
                var blogType = res.data;
                var html ='';
                html+='<option value="0">Select Category</option>';
                for(var x=0; x<blogType.length; x++){
                    if(blogTypeId==blogType[x].id){
                    html+='<option selected value="'+blogType[x].id+'">'+blogType[x].blog_type+'</option>';
                    }
                    else{
                    html+='<option value="'+blogType[x].id+'">'+blogType[x].blog_type+'</option>';
                    }
                }
               $('#editblog_type_id').html(html);
            }

        });

        
    
        $('#hdnblogid').val(data.id);
        $('#editblog_subject').val(data.blog_subject);
        $('#editblog_content').val(data.blog_content);
        $('#blogeditmodal').modal('toggle');

        });

        //Edit Blog
        $('#frmeditblog').submit(function(e){
            e.preventDefault();
                var blogId = $('#hdnblogid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/fitness-blog/'+blogId,
                data: $('#frmeditblog').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },1000);
                    }else{
                        // alert(response.msg);
                        console.log(response.msg);
                    }
                }

            })
        });


    // Delete Blog Record
    $('#blogtable').on('click', 'a.remove_blog', function (e) {
        e.preventDefault();

        var data = $('#blogtable').DataTable().row($(this).parents('tr')).data();
        var blogId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/fitness-blog/'+blogId,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },1000)
                  }
              })
            },
            cancel: function() {
                // nothing to do.

            }
        });

    });

</script>
@endsection