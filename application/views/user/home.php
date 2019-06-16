<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">
 

    <title>SYO Store</title>
</head>
<body>
    <section class="header-nav">
        <div class="navbar-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img class="img-logo" src="<?= base_url('assets/'); ?>img/logoSyo.png" alt=""></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav"> 
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Category</a></li>
                                    </ul>
                                </li> 
                            </ul>

                            <input type="text" class="search" placeholder="Search">
                            <button class="btn src-btn">
                                <i class="fa fa-search"></i>
                            </button>

                            <ul class="nav navbar-nav pull-right">
                                <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="count">1</span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Teknologi Big Data - Rp 12,000 </a></li>
                                    </ul>
                                </li>
                                
                                <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as  <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Change Password</a></li>
                                        <li><a href="#">My Profile</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="ribbon ribbon-top-left">
                                <span>Recommended</span>
                            </div>
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                               <div class="title-disc">
                                    <span class="cost">
                                        Rp. 24,000
                                    </span>  
                                    <span class="percent">
                                        [50 %]
                                    </span>
                               </div>
                               <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="ribbon ribbon-top-left">
                                <span>Recommended</span>
                            </div>
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                                <div class="title-disc">
                                    <span class="cost">
                                        Rp. 24,000
                                    </span>  
                                    <span class="percent">
                                        [50 %]
                                    </span>
                               </div>
                               <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="ribbon ribbon-top-left">
                                <span>Recommended</span>
                            </div>
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                                <div class="title-disc">
                                    <span class="cost">
                                        Rp. 24,000
                                    </span>  
                                    <span class="percent">
                                        [50 %]
                                    </span>
                               </div>
                               <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                                <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                                <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-img">
                                <img src="https://via.placeholder.com/350x400">
                            </div>
                            <div class="box-text">
                                <p class="title">
                                    Teknologi Big Data
                                </p>
                                <p class="sub-title">
                                    Rp. 12,0000
                                </p>
                                <button class="btn add-cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="footer">

    </section>
    
</body>
</html>
 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
