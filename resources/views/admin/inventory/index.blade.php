@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Inventory Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddinventory">Add Equipment</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="inventorytable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Equipment Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Service Date</th>
                            <th>Updated Date/Time</th>
                            <th>Manufacturer</th>
                            <th>Manufacturer Contact</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.inventory.components.inventory-add-modal');
@include('admin.inventory.components.inventory-edit-modal');

@endsection

@section('custom-js')

<script type="text/javascript">

$('#inventorytable').DataTable({
"pageLength": 15,

ajax: baseUrl+'/admin/get-all-inventory',
columns: 
        [
            { data: 'id' },
            { data: 'item_name' },
            { data: 'item_category.category_name' },
            { data: 'quantity' },
            { data: 'service_date' },
            { data: 'updated_at' },
            { data: 'manufacturer' },
            { data: 'manufacturer_contact' },
            {   
                data: null,
                className: "center",
                defaultContent: '<a href="" class="edit_inventory btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                        '<a href="" class="remove_inventory btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
            }
        ]
});

        // Get All Equipment Categories
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-inventory-category',
            success: function(res){
                var inventoryCategory = res.data;
                var html ='';
                html+='<option value="0">Select Category</option>';
                for(var x=0; x<inventoryCategory.length; x++){
                    html+='<option value="'+inventoryCategory[x].id+'">'+inventoryCategory[x].category_name+'</option>';
                }
               $('#item_category_id').html(html);
            }
        });

       // Add Equipment
       $('#btnaddinventory').click(function(){
            $('#inventoryaddmodal').modal('toggle');
        });

        $('#frmcreateinventory').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/inventory')}}",
                type: 'POST',
                data: $('#frmcreateinventory').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


 // Edit Inventory record
 $('#inventorytable').on('click', 'a.edit_inventory', function (e) {
        e.preventDefault();
        var data = $('#inventorytable').DataTable().row($(this).parents('tr')).data();
        var inventoryCategoryId = data.item_category_id;

        // Get All Equipment Category
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-inventory-category',
            success: function(res){
                var inventoryCategory = res.data;
                var html ='';
                html+='<option value="0">Select Category</option>';
                for(var x=0; x<inventoryCategory.length; x++){
                    if(inventoryCategoryId==inventoryCategory[x].id){
                    html+='<option selected value="'+inventoryCategory[x].id+'">'+inventoryCategory[x].category_name+'</option>';
                    }
                    else{
                    html+='<option value="'+inventoryCategory[x].id+'">'+inventoryCategory[x].category_name+'</option>';
                    }
                }
               $('#edititem_category_id').html(html);
            }

        });

        
    
        $('#hdninventoryid').val(data.id);
        $('#edititem_name').val(data.item_name);
        $('#editquantity').val(data.quantity);
        $('#editservice_date').val(data.service_date);
        $('#editmanufacturer').val(data.manufacturer);
        $('#editmanufacturer_contact').val(data.manufacturer_contact);
        $('#inventoryeditmodal').modal('toggle');

        });

        //Edit Inventory
        $('#editfrminventory').submit(function(e){
            e.preventDefault();
                var inventoryId = $('#hdninventoryid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/inventory/'+inventoryId,
                data: $('#editfrminventory').serialize(),
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


    // Delete Inventory Record
    $('#inventorytable').on('click', 'a.remove_inventory', function (e) {
        e.preventDefault();

        var data = $('#inventorytable').DataTable().row($(this).parents('tr')).data();
        var inventoryId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/inventory/'+inventoryId,
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