<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="/css/login.css">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
    crossorigin="anonymous"
  />
</head>
<body>
    <div class="main-wrap">
        <div class="box-container">
            <div class="img-box">

            </div>
            <div class="form-wrap">
                <div class="top-signup">
                    <span>Don't you have an account?</span>
                    <a href="/signup" class="signup-btn">SIGN UP</a>
                </div>
                <div class="mid-container">
                    <h1>Welcome Back</h1>
                    <h6>Login your Account</h6>
                    <form action="/signin" method="POST" class="form">
                        @csrf
                        <label for="Username">email</label></br>
                        <input value="{{old('email')}}" type="email" name="email" id="" placeholder="Your email"> 
                        @error('email')
                            <p class="text-danger m-0 p-0">{{$message}}</p>
                        @enderror
                        </br>
                        <label for="Password">Password</label></br>
                        <input type="password" name="password" id="" placeholder="Your password">
                        
                          
                    
                        @error('password')
                            <p class="text-danger m-0 p-0">{{$message}}</p>
                        @enderror
                        <br>
                        <span><a href="#" class="fg-pass">Forgot password?</a></span>
                        <br>
                        <button type="submit" class="login-btn">Login</button>
                    </form>
                </div>
              
            </div>
        </div>
    </div>
</body>
</html>