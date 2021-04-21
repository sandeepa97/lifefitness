<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="{{url('favicon.ico')}}" type="image/ico">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LIFE FITNESS GYMS</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('css/custom.css')}}" rel="stylesheet">
  <link href="{{url('css/select2.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


  @yield('custom-css')


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin-dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dumbbell"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LIFE FITNESS <sup>GYMS</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin-dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MAIN
      </div>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/members')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Member Management</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/payments')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Payments</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cog"></i>
          <span>Member Attendance</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="{{url('admin/member-attendance')}}">Mark Member Attendance</a>
            <a class="collapse-item" href="{{url('admin/view-member-attendance')}}">View Member Attendance</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/schedules')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Workout Schedules</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/notices')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Notices</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/member-status')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Member Status</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cog"></i>
          <span>Management Reports</span>
        </a>
        <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="{{url('admin/reports')}}">Generate Reports</a>
            <a class="collapse-item"  href="{{url('admin/reports-payment')}}">Payment Reports</a>
            <a class="collapse-item"  href="{{url('admin/reports-attendance')}}">Attendance Reports</a>
            <a class="collapse-item"  href="{{url('admin/reports-member')}}">Member Reports</a>
            <!-- <a class="collapse-item"  href="#">Inventory Reports</a> -->
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/trainer-shifts')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Trainer Shifts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/inventory')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Inventory</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/trainers')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Trainers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/trainer-payments')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Trainer Payments</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/member-feedbacks')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Member Feedbacks</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/trainer-feedbacks')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Trainer Feedbacks</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        OTHER
      </div>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/fitness-blog')}}">
          <i class="fas fa-fw fa-folder"></i>
          <span>Fitness Blog</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/online-store')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Online Store</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/online-coach')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Online Coaching</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <p class="badge badge-warning badge-counter " id="notice-count"></p>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notices Center
                </h6>
                <div id = "notices-center">
                 <!-- dynamic content -->
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="{{url('admin/notices')}}">Show All Notices</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <p class="badge badge-warning badge-counter" id="feedback-count"></p>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Feedback Center
                </h6>
                <div id = "feedback-center">
                 <!-- dynamic content -->
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="{{url('admin/member-feedbacks')}}">Read More Feedbacks</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->fname}} {{Auth::user()->lname}}</span>
                <img class="img-profile rounded-circle" src="{{url('img/pro.png')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('admin/profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{url('admin/settings')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Log Out
                </a>
                
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
            @yield('content')
        <!-- End of Main Content -->

      <!-- Footer -->

      <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sandeepa Loku 2020</span>
          </div>
        </div>
      </footer> -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Log Out" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{url('logout')}}">Log Out</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript -->
  <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  

  <!-- Custom scripts for all pages-->
  <script src="{{url('js/sb-admin-2.min.js')}}"></script>
  <script src="{{url('js/select2.min.js')}}"></script>
  <script src="{{url('js/jspdf.min.js')}}"></script>
  <script src="{{url('js/jspdf.plugin.autotable.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>

  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('js/demo/chart-pie-demo.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script src="{{asset('js/library/jquery.confirm.js')}}"></script>
  
  <script type="text/javascript">
    var baseUrl = '{{url('/')}}';

    $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-all-notice-count',
          success: function(res){
            var noticeCount = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h5 mb-0 font-weight-bold text-gray-800">'+noticeCount[x].total_notices+ '</div>';
              $('#notice-count').append(html);
            }
          }
    });
    $.ajax({
          type: 'GET',
          url: baseUrl+'/member/get-all-feedbacks-count',
          success: function(res){
            var feedbackCount = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<div class="h5 mb-0 font-weight-bold text-gray-800">'+feedbackCount[x].total_feedbacks+ '</div>';
              $('#feedback-count').append(html);
            }
          }
    });
    $.ajax({
          type: 'GET',
          url: baseUrl+'/admin/get-all-notices',
          success: function(res){
            var noticeData = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<a class="dropdown-item d-flex align-items-center" href="{{url('admin/notices')}}">';
              html += '<div class="mr-3">';
              html += '<div class="icon-circle bg-success">';
              html += '<i class="fas fa-file text-white"></i>';
              html += '</div>';
              html += '</div>';
              html += '<div>';
              html += '<div class="small text-gray-500">'+noticeData[x].notice_date+' at '+noticeData[x].notice_time+'</div>';
              html += ''+noticeData[x].notice_subject+'';
              html += '</div>';
              html += '</a>';
              $('#notices-center').append(html);
            }
          }
    });
    $.ajax({
          type: 'GET',
          url: baseUrl+'/member/get-all-feedbacks',
          success: function(res){
            var feedbackData = res.data;
            for (var x = 0; x<20; x++)
            {
              var html = '<a class="dropdown-item d-flex align-items-center" href="{{url('admin/member-feedbacks')}}">';
              html += '<div class="dropdown-list-image mr-3">';
              html += '<img class="rounded-circle" src="{{asset('img/user-img.png')}}" alt="">';
              html += '</div>';
              html += '<div>';
              html += '<div class="text-truncate">'+feedbackData[x].feedback_subject+'</div>';
              html += '<div class="small text-gray-500">'+feedbackData[x].member.fname+' '+feedbackData[x].member.lname+' '+feedbackData[x].feedback_date+'</div>';
              html += '</div>';
              html += '</a>';
              $('#feedback-center').append(html);
            }
          }
    });
  </script>
  

  @yield('custom-js')

  </body>

</html>