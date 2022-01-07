

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

   

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h1>Update User</h1>
                            <h1>___________</h1>
                            <a href="#">
                                <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                             
                        @if(session()->get('insert'))
                   <div class="alert alert-success">
                          {{ session()->get('insert') }}
                            </div>
                            @endif

                            @if(session()->get('error'))
                   <div class="alert alert-danger">
                          {{ session()->get('error') }}
                            </div>
                            @endif
                      
                            <form action="{{url('admin/layout/updateuser/'.$admin->id) }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label>First_name</label>
                                    <input class="au-input au-input--full" value="{{$admin->fname}}" type="text" name="fname" placeholder="Enter your First Name" >
                                    @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Last_name</label>
                                    <input class="au-input au-input--full" type="text" value="{{$admin->lname}}" name="lname" placeholder="Enter your Last Name">
                                    @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" value="{{$admin->email}}" name="email" placeholder="Enter your Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" value="{{ old('password') }}" name="password" placeholder="Enter your Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Enter your Confirm Password">
                                    
                                </div> -->
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="au-input au-input--full"  id="phone"type="tel" inputmode="numeric" value="{{$admin->mobile}}" name="mobile" placeholder="your number" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('mob'))
                                        <span class="text-danger">{{ $errors->first('mob') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" value="{{$admin->address}}" name="address" placeholder="Enter Your Address">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                               
                            </form>
                            <div class="alert alert-info" style="display: none"></div>
      <div class="alert alert-error" style="display: none"></div>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{url('admin')}}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <!-- <script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
    </script> -->
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <!-- <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script> -->

    <!-- Main JS-->
    <script src="{{asset('Admin/js/main.js')}}"></script>

</body>

</html>
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    const info = document.querySelector(".alert-info");
    const error = document.querySelector(".alert-error");
    function process(event) {
      event.preventDefault();

      const phoneNumber = phoneInput.getNumber();

      info.style.display = "";
      info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    }
    else {
   error.style.display = "";
   error.innerHTML = `Invalid phone number.`;
 }
  </script>
<!-- end document-->