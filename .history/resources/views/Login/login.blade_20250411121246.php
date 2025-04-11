<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration Form</title>
    <link rel="stylesheet" href="stylesheet/style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #eef5feb8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 388px;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 343px;
        }

        .form header {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form input {
            height: 60px;
            width: 100%;
            padding: 0 15px;
            font-size: 17px;
            margin-bottom: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }

        .form input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }

        .form a {
            font-size: 16px;
            color: #009579;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form input.button {
            color: #ffffff;
            background: #ea8d2d;
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-top: 0.7rem;
            cursor: pointer;
            transition: 0.4s;
        }

        .form input.button:hover {
            background: #006653;
        }

        .text-danger {
            color: red;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle i {
            font-size: 18px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="login form">
            <header><img src="img/newlogo.png" alt=""></header>

            <form action="{{ route('Login-emp')}}" method="post">
                @csrf
                <p>Employee Code*</p>
                <input type="text" placeholder="Enter Emp-Code" name="emp_code" value="{{ !empty(old('emp_code')) ? old('emp_code') : 'SANS-00' }}">
                <span class="text-danger">
                    @error('emp_code')
                    {{ $message }}
                    @enderror
                </span>

                <p>Enter password*</p>
                <div class="password-container">
                    <input type="password" placeholder="Enter password" name="password" id="password">
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        <i class="far fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <span class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>

                <a href="/forget">Forgot password?</a>

                @if(session('error'))
                <p class="text-danger">
                    {{ session('error') }}
                </p>
                @endif

                <input type="submit" class="button" value="Login">
            </form>
        </div>
    </div>

    <!-- JavaScript for password toggle -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("far", "fa-eye");
                eyeIcon.classList.add("far", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("far", "fa-eye-slash");
                eyeIcon.classList.add("far", "fa-eye");
            }
        }
    </script>

</body>

</html>