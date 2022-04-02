<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(url('css/login.css')); ?>">


</head>

<body class="antialiased">
    <div class="login_container">
        <div class="login_form_container">
            <div class="left">

                <!-- <?php if(Auth::check()): ?>
                <script>
                    window.location = "/login_success";
                </script>
                <?php endif; ?> -->

                <form class="form_container validate-form" method="post" action="<?php echo e(route('insert.data')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <p>
                        <?php if($success=Session::get('success')): ?>
                        <?php echo e($success); ?>

                        <?php endif; ?>
                    </p>


                    <h1 class="login-title">Register an Account</h1>

                    <div class="validate-input">
                        <input type="text" placeholder="Name" name="name" required class="input ">
                    </div>

                    <h4 style="color:red;">
                        <?php if($errors->has('name')): ?>
                        <?php echo e($errors->first('name')); ?>

                        <?php endif; ?>
                        <h4>

                            <div class="validate-input">
                                <input type="email" placeholder="Email" name="email" required class="input ">
                            </div>

                            <h4 style="color:red;">
                                <?php if($errors->has('email')): ?>
                                <?php echo e($errors->first('email')); ?>

                                <?php endif; ?>
                            </h4>

                            <div class="validate-input">
                                <input type="password" placeholder="Password" name="password" required class="input">
                            </div>

                            <h4 style="color:red;">
                                <?php if($errors->has('password')): ?>
                                <?php echo e($errors->first('password')); ?>

                                <?php endif; ?>
                            </h4>

                            <!-- <div class="validate-input">
                                <input type="password" placeholder="Retype password" name="password_confirmation" required   class="input">
                            </div>
                            <h4 style="color:red;">
                                <?php if($errors->has('password')): ?>
                                <?php echo e($errors->first('password')); ?>

                                <?php endif; ?>
                            </h4> -->
                           

                            <input type="submit" class="red_btn" value="Login"></button>

                            <h3 style="color:red;">
                                <?php if($errors=Session::get('error')): ?>
                                <?php echo e($errors); ?>

                                <?php endif; ?>
                            </h3>

                </form>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\hassa\Desktop\laravel\Nadeera-Project\resources\views/register.blade.php ENDPATH**/ ?>