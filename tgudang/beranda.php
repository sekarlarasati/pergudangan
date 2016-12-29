<?php
session_start();
if(!isset($_SESSION['login_hash']))
{
	echo "<script>window.location='index.php'</script>";
}
include("koneksi.php");
?>

<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT DNSL</title>
    <?php include("src.php"); ?>
    
</head>

<body class="fixed-sn blue-skin">


    <!--Double navigation-->
    <header>

        <?php include 'main_nav.php'; ?>

        <!--Navbar-->
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="pull-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn">
                <p><a href="beranda.php">Beranda</a></p>
            </div>

            <ul class="nav navbar-nav pull-right">
                <li class="nav-item ">
                    <a class="nav-link">
                        <span class="hidden-sm-down">Anda login sebagai <?php 
                            echo "".$_SESSION['login_user'];
                            ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Profile
                    </a>
                    <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item" href="beranda.php?cat=web&page=ubhpass">Ubah Password</a>
                        <a class="dropdown-item" href="beranda.php?cat=web&page=keluar">Keluar</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double navigation-->

    <!--Main layout-->
    <main>
        <div class="container-fluid">

            <?php
            echo date("d M Y");
            $v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
            $v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
            if(file_exists("pages/".$v_cat."/".$v_page.".php"))
            {
                include("pages/".$v_cat."/".$v_page.".php");
            }else{
                include("pages/".$_SESSION['login_hash']."/home.php");

            }


            ?>

        </div>
    </main>
    <!--/Main layout-->


   <!--FOOTER-->
   <?php include("footer.php"); ?>

</div><!--mainwrapper-->
<!--SLIDE NAVIGASI-->
<!-- <?php include("_nav-slider.php"); ?> -->

<?php include("src1.php"); ?>
</body>
</html>
