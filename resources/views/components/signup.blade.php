<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form </title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="main-wrap">
        <div class="box-container">
            <div class="img-box">

            </div>
            <div class="form-wrap">
                <div class="top-signup">
                    <span><a href="/signin">I've already account.</a></span>
                   
                </div>
                <div class="mid-container">
                    <h1>Welcome</h1>
                    <h6>Create New Account</h6>
                    <form action="/signup" method="post" class="form">
                        @csrf
                        <label for="name">Enter Your Name</label></br>
                        <input value="{{old('name')}}" type="text" name="name" id="" placeholder="Your name"> 
                        @error('name') 
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                        </br></br>

                        <label for="Username">Enter Your username</label></br>
                        <input value="{{old('username')}}" type="text" name="username" id="" placeholder="Your username">
                        @error('username') 
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </br></br>
                        <label for="Username">Enter Your Email</label></br>
                        <input type="email" name="email" id="" placeholder="Your email"> 
                        @error('email') 
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                        </br></br>
                        <label for="">Create Password</label></br>
                        <input type="password" name="password" id="" placeholder="Your password">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    
                        <br>
                        <button type="submit" class="login-btn">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>