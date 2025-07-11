<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme Config Js -->
    <script src="/assets/backend/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="/assets/backend/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />
    
    <!-- Icons css -->
    <link href="/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="/" class="logo-dark"> 
                        <span><img src="{{ asset('/assets/frontend/images/cropped-header-logo-1.webp') }}" alt="dark logo" style="width:200px; height:50px;" ></span>
                    </a>
                    <a href="/" class="logo-light">
                        <span><img src="{{ asset('/assets/frontend/images/cropped-header-logo-1.webp') }}" alt="logo" style="width:200px; height:50px;" ></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- title-->
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    @if($errors->has('invalid_credential'))  
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('invalid_credential') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                                                 
                    @endif  

                    <!-- form -->
                    <form method="post" action="{{route('backend.login')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <!--<a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Forgot your password?</small></a>-->
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password" required>
                        </div>


                        <div class="mb-3">
                            <label for="contact" class="form-label">Request OTP To</label>
                            <select class="form-select required" name="contact" id="contact" required>
                                <option value="">-- Select --</option>
                                <!--<option value="webdeveloper@nexgeno.in">Developer</option>-->
                                <!--<option value="oza.janakraj@gmail.com">SEO</option>-->
                                <!--<option value="attaridesk@gmail.com">Support Desk</option>-->
                                <!--<option value="ms122592@gmail.com">ms122592@gmail.com</option>-->
                                <!--<option value="+917738375431">Super Admin - +91 7738375431</option>-->
                            </select> 
                        </div>

                        <input type="hidden" class="form-check-input" name="method" id="method">

                        <!--<div class="mb-3">-->
                        <!--    <div class="form-check">-->
                        <!--        <input type="checkbox" class="form-check-input" id="checkbox-signin">-->
                        <!--        <label class="form-check-label" for="checkbox-signin">Remember me</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                        </div>
                        <!-- social-->
                        {{--
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Sign in with</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                </li>
                            </ul>
                        </div>
                        --}}
                    </form>
                    <!-- end form-->
                </div>

                <!-- Footer-->
                <footer class="footer footer-alt">
                   {{-- <p class="text-muted">Don't have an account? <a href="pages-register-2.html" class="text-muted ms-1"><b>Sign Up</b></a></p> --}}
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <!--<div class="auth-user-testimonial">
                <h2 class="mb-3">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Nexgeno
                </p>
            </div>--> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="/assets/backend/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/backend/js/app.min.js"></script>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // document.getElementById('contact').addEventListener('change', function() {
        //     var selectedValue = this.value;
        //     var methodInput = document.getElementById('method');
    
        //     // Check if the selected value contains '@'
        //     if (selectedValue.includes('@')) {
        //         methodInput.value = 'email';
        //     } else {
        //         methodInput.value = 'phone';
        //     }
        // });
        
        
         $(document).ready(function() {
        // Function to validate email
        // function isValidEmail(email) {
        //     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //     return emailRegex.test(email);
        // }

        // Email validation on input change
        // $('#emailaddress').on('input', function() {
        //     var email = $(this).val();
        //     if (!isValidEmail(email)) {
        //         // Display error message if email is invalid
        //         $('#emailError').text('Please enter a valid email address.');
        //     } else {
        //         // Clear error message if email is valid
        //         $('#emailError').text('');
        //     }
        // });


var typingTimer;
var doneTypingInterval = 1000; // 1 second (adjust as needed)

$('#emailaddress').on('keyup', function() {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

$('#emailaddress').on('keydown', function() {
    clearTimeout(typingTimer);
});

function doneTyping() {
    var email = $('#emailaddress').val();
    $.ajax({
        url: '{{ route('getRoleId') }}',
        method: 'POST',
        data: { email: email, _token: '{{ csrf_token() }}' },
        success: function(response) {
            $('#contact').empty(); // Clear existing options
            $('#contact').append(response);
            //$('#contact').val(response.role_id);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

        // AJAX request when emailaddress field is change
        // $('#emailaddress').on('change keyup', function() {
        //     var email = $('#emailaddress').val();
        //     // if (isValidEmail(email)) {
        //         // Send AJAX request to retrieve role_id
        //         $.ajax({
        //             url: '{{ route('getRoleId') }}',
        //             method: 'POST',
        //              data: { email: email, _token: '{{ csrf_token() }}' },
        //             success: function(response) {
        //             $('#contact').empty(); // Clear existing options
        //             $('#contact').append(response);
        //                 //$('#contact').val(response.role_id);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //             }
        //         });
                
                
                
        //     // } else {
        //     //     $('#emailError').text('Please enter a valid email address before clicking the password field.');
        //     // }
            
            
        // });
        
        
    });
    </script>

</body>
</html>