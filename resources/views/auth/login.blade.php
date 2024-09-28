@extends('layout.app')
@section('content')
    

    <!-- Sign In Area -->
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Log In</span>
                                <h2>Log In to Your Account!</h2>
                            </div>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your Email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button onclick="SubmitLogin()" class="default-btn btn-bg-three border-radius-5">
                                            Sign In Now
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <p class="account-desc">
                                            Not a Member?
                                            <a href="{{route('register')}}">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Area End -->
    <script>
        async function SubmitLogin(){
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;


            if(email.length === 0){
                alert('Please Enter your email');
            }
            else if(email.length === 0){
                alert('Please Enter your email');
            }
            else{
                let res = await axios.post("/user-login",{email:email,password:password});

                if(res.status === 200 && res.data['data'] === 'success')
                {
                    // window.location.href="/dashboard";
                    if(email === 'admin@mail.com'){
                        window.location.href="/dashboard";
                    }
                    else{
                        window.location.href="/";
                    }
               }
              
            }

        }
    </script>








@endsection