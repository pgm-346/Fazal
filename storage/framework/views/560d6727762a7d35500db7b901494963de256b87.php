<!DOCTYPE html>
<html>
<head>

 


    <title>Project work time</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->



<link rel="stylesheet" href="/assets/css/custom.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <style type="text/css">
        @import  url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        
        <a class="navbar-brand" href="#">Laravel</a>
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <!-- <div class="btn-group">
                            <img src="https://picsum.photos/200" class="dropdown-toggle" alt="Avatar" style="border-radius:50%; width:30px; height:30px;">&nbsp;&nbsp;<span><?php echo e(Auth::user()->name); ?></span>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                                </li>
                            </ul>
                        </div> -->

                        <div class="btn-group">  
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">  
                                <img src="https://picsum.photos/200" class="dropdown-toggle" alt="Avatar" style="border-radius:50%; width:30px; height:30px;">&nbsp;&nbsp;<span><?php echo e(Auth::user()->name); ?></span>  
                            </button>  
                            <div class="dropdown-menu"> 
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">&nbsp;&nbsp; Logout</a> 
                            </div>  
                        </div>  
                    </li>
                <?php endif; ?>
            </ul>
  
        </div>
    </div>
</nav>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>
<?php echo $__env->yieldContent('content'); ?>
     
</body>
</html><?php /**PATH /home/allianze/Documents/bank/resources/views/layout.blade.php ENDPATH**/ ?>