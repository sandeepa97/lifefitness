@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Online Coaching Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddclient">Add Online Client</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="clienttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>email</th>
                            <th>Coach Package</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.online_coach.components.client-add-modal');
@include('admin.online_coach.components.client-edit-modal');

@endsection

@section('custom-js')

<script type="text/javascript">

$('#clienttable').DataTable({

ajax: baseUrl+'/admin/get-all-online-clients',
columns: 
        [
            { data: 'id' },
            { data: 'fname' },
            { data: 'lname' },
            { data: 'gender' },
            { data: 'location' },
            { data: 'contact' },
            { data: 'email' },
            { data: 'coach_package.package_name' },
            {   
                data: null,
                className: "center",
                defaultContent: '<a href="" class="edit_client btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                        '<a href="" class="remove_client btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
            }
        ]
});

        // Get All Coach Packages
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-online-coach-packages',
            success: function(res){
                var coachPackage = res.data;
                var html ='';
                html+='<option value="0">Select Package</option>';
                for(var x=0; x<coachPackage.length; x++){
                    html+='<option value="'+coachPackage[x].id+'">'+coachPackage[x].package_name+'</option>';
                }
               $('#online_coach_package_id').html(html);
            }
        });

       // Add Client
       $('#btnaddclient').click(function(){
            $('#clientaddmodal').modal('toggle');
        });

        $('#frmcreateclient').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/online-coach')}}",
                type: 'POST',
                data: $('#frmcreateclient').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


 // Edit Client record
 $('#clienttable').on('click', 'a.edit_client', function (e) {
        e.preventDefault();
        var data = $('#clienttable').DataTable().row($(this).parents('tr')).data();
        var coachPackageId = data.online_coach_package_id;

        // Get All Coach Packages
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-online-coach-packages',
            success: function(res){
                var coachPackage = res.data;
                var html ='';
                html+='<option value="0">Select Package</option>';
                for(var x=0; x<coachPackage.length; x++){
                    if(coachPackageId==coachPackage[x].id){
                    html+='<option selected value="'+coachPackage[x].id+'">'+coachPackage[x].package_name+'</option>';
                    }
                    else{
                    html+='<option value="'+coachPackage[x].id+'">'+coachPackage[x].package_name+'</option>';
                    }
                }
               $('#editonline_coach_package_id').html(html);
            }

        });

        
    
        $('#hdnclientid').val(data.id);
        $('#editfname').val(data.fname);
        $('#editlname').val(data.lname);
        $('#editgender').val(data.gender);
        $('#editlocation').val(data.location);
        $('#editcontact').val(data.contact);
        $('#editemail').val(data.email);
        $('#clienteditmodal').modal('toggle');

        });

        //Edit Client
        $('#frmeditclient').submit(function(e){
            e.preventDefault();
                var clientId = $('#hdnclientid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/online-coach/'+clientId,
                data: $('#frmeditclient').serialize(),
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


    // Delete Client Record
    $('#clienttable').on('click', 'a.remove_client', function (e) {
        e.preventDefault();

        var data = $('#clienttable').DataTable().row($(this).parents('tr')).data();
        var clientId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/online-coach/'+clientId,
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