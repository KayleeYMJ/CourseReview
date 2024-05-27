<html>
    <head>
        <title>Welcome to Course Review</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        
        <style>
        #home_icon{
            width: 50px;
        }
        .bg-light {
            background-color: #BBD1FF !important;
        }
        .nav{
            position: absolute;
            left:150px;
        }
        .nav-tabs{
            border-bottom: 0px;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- home button -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>" > <img src="<?php echo base_url(); ?>assets/img/home_icon.png" alt="home" id='home_icon'> </a>
                    </li>
                </ul>

<!-- check idntity -->
                <!-- main nav -->
                <?php if($this->session->userdata('logged_in')) : ?>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if($current_page=="favourite")echo "active"; ?>" href="<?php echo base_url(); ?>favourite">Collection</a>
                        </li>
                    </ul>
                <?php endif; ?>

                <!-- log in / sign up -->
                <ul class="navbar-nav my-lg-0"> 
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                        <li class="nav-item"> 
                            <a href="<?php echo base_url(); ?>login" class="<?php if($current_page=="log_in")echo "nav-link active"; ?>"> Login  </a>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        

