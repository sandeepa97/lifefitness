@extends('admin.layout.master')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{url('/admin/reports')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="monthly-earnings">Earnings (Monthly)</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. 400,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1" id="annual-earnings">Earnings (Annual)</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. 2,150,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1" id="attendance-today">Attendance Today</div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" id="next-service">Next Inventory Service</div>
                   
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- gym status card -->
            <div class="col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">


            <div class="modal-content">
            <form data-parsley-validate="" id="frmgymstatus">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="current_status"  id="editcurrent_status" class="form-control">
                                    <option value="GYM OPEN" selected>GYM OPEN</option>
                                    <option value="GYM CLOSED">GYM CLOSED</option>
                                    </select>
                                </div>
                            </div>
                      </div>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="current_trainer"  id="editcurrent_trainer" class="form-control">
                                    </select>
                                </div>
                            </div>
                      </div>
                      <button type="submit" class="btn btn-success">Update Status</button>
                </div>
            </form>
        </div>

                </div>
              </div>
            </div>
          </div>

       {{--   <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earning Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Members
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Store
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Other
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          --}}


      </div>
      <!-- End of Main Content -->
@endsection

@section('custom-js')

<script>

      // Get All Trainers
      $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainers',
            success: function(res){
                var trainerData = res.data;
                var html ='';
                html+='<option value="Trainer Unavailable">Trainer Unavailable</option>';
                for(var x=0; x<trainerData.length; x++){
                    html+='<option value="Trainer '+trainerData[x].fname+'">'+trainerData[x].fname+'</option>';
                }
               $('#editcurrent_trainer').html(html);
            }

        });

    // $(document).ready(function(){

    // });

      //Submit Status
      $('#frmgymstatus').submit(function(e){
      e.preventDefault();
          var statusID = 1;

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/gym-status/'+statusID,
                data: $('#frmgymstatus').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },1000);
                    }else{
                        alert(response.msg);
                    }
                }

            })
        });

        $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-all-monthly-payments',
          success: function(res){
            var monthly = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h5 mb-0 font-weight-bold text-gray-800">Rs. '+monthly[x].total_monthly+'</div>';
              $('#monthly-earnings').append(html);
            }
          }
        });
        $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-all-annual-payments',
          success: function(res){
            var annual = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h5 mb-0 font-weight-bold text-gray-800">Rs. '+annual[x].total_annual+'</div>';
              $('#annual-earnings').append(html);
            }
          }
        });
        $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-today-attendance',
          success: function(res){
            var attendance = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h5 mb-0 font-weight-bold text-gray-800">'+attendance[x].total_attendance+ '</div>';
              $('#attendance-today').append(html);
            }
          }
        });
        $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-next-service',
          success: function(res){
            var service = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h8 mb-0 font-weight-bold text-gray-800">'+service[x].item_name+'</div>';
              html += '<div class="h9 mb-0 font-weight-bold text-gray-800">'+service[x].service_date+ '</div>';
              $('#next-service').append(html);
            }
          }
        });

</script>

@endsection