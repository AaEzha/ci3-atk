<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    span{
        position: absolute;
        right: 80px;
        transform: translate(0,-50%);
        top: 66.5%;
        cursor: pointer;
        }
    .fa{
        font-size: 20px;
        color: #7a797e ;
    }
    </style>

    <title>Login - Pusyantek BPPT</title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="100px" class="mb-3">
                                        <p>Silahkan Login</p>
                                    </div>
                                    <form class="user" method="POST" action="<?= site_url('auth/process') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" autofocus name="username" value="<?= set_value('username') ?>">
                                            <?= form_error('username', ' <small class="text-danger ml-3">', ' </small>'); ?>
                                        </div>



                                        <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">

                                        <!-- An element to toggle between password visibility -->
                                        <span><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="myFunction()"></i></span>
                                        <!--<input type="checkbox" onclick="myFunction()">Show Password -->
                                        <script>
                                            function myFunction() {
                                            var x = document.getElementById("exampleInputPassword");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                            }
                                        </script>
                                            <!--<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                            <span><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toogle()"></i></span>
                                            <script>
                                                var state=false;
                                                function toogle(){
                                                    if (state){
                                                        document.getElementById("password").setAttribute("type","password");
                                                            state=false;
                                                        document.getElementById("eye").style.color='#7a797e';
                                                    }
                                                    else{
                                                        document.getElementById("password").setAttribute("type","text");
                                                            state=true;
                                                        document.getElementById("eye").style.color='#5887ef';
                                                    }
                                                }
                                            </script> -->
                                            <?= form_error('password', ' <small class="text-danger ml-3">', ' </small>'); ?>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="login">
                                            Login
                                        </button>


                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>