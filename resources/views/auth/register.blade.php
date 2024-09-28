@extends('layout.app')
@section('content')
    

    <!-- Sign In Area -->
  <!-- Sign Up Area -->
  <div class="sign-up-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <span class="sp-color">Sign Up</span>
                            <h2>Create an Account!</h2>
                        </div>
                       
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your Username" placeholder="Your Name">
                                    </div>
                                </div>
                               

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="phone" name="phone" id="phone" class="form-control" required data-error="Please enter your Username" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button onclick="onRegistration()" class="default-btn btn-bg-three border-radius-5">
                                        Sign Up
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="account-desc">
                                        Already have an account? 
                                        <a href="/userLogin">Sign In</a>
                                    </p>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Sign In Area End -->
    <script>
        async function onRegistration(){
        let email = document.getElementById("email").value;
        let name = document.getElementById("name").value;
        let phone = document.getElementById("phone").value;
        let password = document.getElementById("password").value;

        if(email.length === 0){
            alert("Email required")
        }
        else if(name.length === 0){
            alert(" Name required")
        }
        else if(phone.length === 0){
            alert("Phone required")
        }
     
        else if(password.length === 0){
            alert("Password required")
        }
        else{
           
            let res = await axios.post('/user-registration',{
                email:email,
                name:name,
                phone:phone,
                password:password
            });

            alert("Registration Success");
            window.location.href="/userLogin";

            
        }
    }
        
    </script>








@endsection