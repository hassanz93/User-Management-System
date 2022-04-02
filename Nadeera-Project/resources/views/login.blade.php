<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{url('css/login.css') }}">


</head>

<body class="antialiased">
    <div class="login_container">
        <div class="login_form_container">
            <div class="left">
                <form class="form_container validate-form" method="post" action="{{ route('check.login') }}">
                    {{ csrf_field() }}

                    <p>
                        @if($success=Session::get('success'))
                        {{ $success }}
                        @endif
                    </p>


                    <h1 class="login-title">Login to Your Account</h1>

                    <div class="validate-input">
                    <input type="email" placeholder="Email" name="email" required class="input " >
                    </div>

                    <h4 style="color:red;">
                        @if($errors->has('email'))
                        {{ $errors->first('email') }}
                        @endif
                    </h4>

                    <div class="validate-input">
                    <input type="password" placeholder="Password" name="password" required class="input">
                    </div>

                    <h4 style="color:red;">
                        @if($errors->has('password'))
                        {{ $errors->first('password') }}
                        @endif
                    </h4>

                    <input type="submit" class="red_btn" value="Login"></button>

                    <h3 style="color:red;">
                        @if($errors=Session::get('error'))
                        {{ $errors }}
                        @endif
                    </h3>

                </form>
            </div>
        </div>
    </div>
</body>

</html>