@extends('layouts.appgeneral')

@section('content')

<div class = "nav-bar">
<ul>
	  <li><a class = "active-logo"  href="{{ url('/') }}">LIFE FITNESS GYM</a></li>
      <li><a href="{{ url('/') }}">HOME</a></li>
	  <li><a href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a class="active" href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a href="{{ url('contact') }}">CONTACT US</a></li>
</ul>
</div>
<div class="container">
	<h1>ONLINE COACHING</h1>
	<img src="img/banner2.jpg" width="500px">
    <h4>Staying in shape is the best investment you will ever make and we are here to make sure your time and efforts are put into action and use, with two programs to chose from. Our services are Personalized, Affordable and Guaranteed.</h4>
    <hr>
    <h5>AFFORDABLE : Affordable Programs made to your budget. No overspending on over priced food. Easy and convenient diet plans made to your EASE.</h5>
    <h5>PERSONALISED: We will be committed with you throughout the phase of your Goal Weight, NO 1 month based limitations, offer a full time commitment, You get what you pay for, with full time whatsapp support, necessary schedule changes and dedicated follow ups.</h5>
    <h5>GURANTEED RESULTS : You get what you pay for, that’s results. Unlike more other programs, what’s unique in our program is that the program is valid till the given goal weight is achieved.</h5>
    <hr>
    <div class="m-5"><h5>Join our Online Coaching program today and change your lifestyle for the better.</h5></div>

	<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register for Online Coaching.</h5>

            </div>
            <form data-parsley-validate="" id="frmcreateclient">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text"  class="form-control" id="lname" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender"  id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact"/>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="online_coach_package_id">Coach Package</label>
                                <select name="online_coach_package_id"  id="online_coach_package_id" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>

</div>

@endsection

@section('custom-js')

<script>

var baseUrl = '{{url('/')}}';
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

		// Register Client
        $('#frmcreateclient').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/online-coach')}}",
                type: 'POST',
                data: $('#frmcreateclient').serialize(),
                success: function(response){
                    alert("Registration Successful. We will contact you soon. Thank You.");
                    location.reload();
                }
            });
        });
</script>

@endsection