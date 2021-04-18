@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Online Store Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddstore">Add Item</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="storetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Manufacturer</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.online_store.components.store-add-modal');
@include('admin.online_store.components.store-edit-modal');

@endsection

@section('custom-js')

<script type="text/javascript">

$('#storetable').DataTable({

ajax: baseUrl+'/admin/get-all-online-store',
columns: 
        [
            { data: 'id' },
            { data: 'item_name' },
            { data: 'item_category.category_name' },
            { data: 'item_description' },
            { data: 'manufacturer' },
            { data: 'price' },
            { data: 'img_url' },
            {   
                data: null,
                className: "center",
                defaultContent: '<a href="" class="edit_store btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                        '<a href="" class="remove_store btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
            }
        ]
});

        // Get All Item Categories
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-online-store-category',
            success: function(res){
                var storeCategory = res.data;
                var html ='';
                html+='<option value="0">Select Category</option>';
                for(var x=0; x<storeCategory.length; x++){
                    html+='<option value="'+storeCategory[x].id+'">'+storeCategory[x].category_name+'</option>';
                }
               $('#item_category_id').html(html);
            }
        });

       // Add Item
       $('#btnaddstore').click(function(){
            $('#storeaddmodal').modal('toggle');
        });

        $('#frmcreatestore').submit(function(e){
            e.preventDefault();
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/admin/online-store')}}",
                type: 'POST',
                data: $('#frmcreatestore').serialize(),
                success: function(response){
                    // console.log(response.msg);
                    alert(response.msg);
                    location.reload();
                }
            });
        });


 // Edit Store record
 $('#storetable').on('click', 'a.edit_store', function (e) {
        e.preventDefault();
        var data = $('#storetable').DataTable().row($(this).parents('tr')).data();
        var storeCategoryId = data.item_category_id;

        // Get All Store Category
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-online-store-category',
            success: function(res){
                var storeCategory = res.data;
                var html ='';
                html+='<option value="0">Select Category</option>';
                for(var x=0; x<storeCategory.length; x++){
                    if(storeCategoryId==storeCategory[x].id){
                    html+='<option selected value="'+storeCategory[x].id+'">'+storeCategory[x].category_name+'</option>';
                    }
                    else{
                    html+='<option value="'+storeCategory[x].id+'">'+storeCategory[x].category_name+'</option>';
                    }
                }
               $('#edititem_category_id').html(html);
            }

        });

        
    
        $('#hdnstoreid').val(data.id);
        $('#edititem_name').val(data.item_name);
        $('#edititem_description').val(data.item_description);
        $('#editmanufacturer').val(data.manufacturer);
        $('#editprice').val(data.price);
        // $('#editimg_url').val(data.img_url);
        $('#storeeditmodal').modal('toggle');

        });

        //Edit store
        $('#frmeditstore').submit(function(e){
            e.preventDefault();
                var storeId = $('#hdnstoreid').val();

            $.ajax({
                // headers: {
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                type: 'PUT',
                url: baseUrl+'/admin/online-store/'+storeId,
                data: $('#frmeditstore').serialize(),
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


    // Delete Store Record
    $('#storetable').on('click', 'a.remove_store', function (e) {
        e.preventDefault();

        var data = $('#storetable').DataTable().row($(this).parents('tr')).data();
        var storeId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/online-store/'+storeId,
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