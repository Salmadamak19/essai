<?php
    include_once '../Model/Promo.php';
    include_once '../Controller/PromoC.php';

    $error = "";

    // create user
    $promos = null;
$date_ac = date('Y-m-d');
echo $date_ac ;
    // create an instance of the controller
    $promoC = new PromoC();
    if (
        isset($_POST["id_pack"]) && 
        isset($_POST["pourcentage"]) &&
   //     isset($_POST["date_deb"]) && 
        isset($_POST["date_fin"]) 
    ) {
        if (
            !empty($_POST["id_pack"]) && 
            !empty($_POST["pourcentage"]) && 
       //    !empty($_POST["date_deb"]) && 
            !empty($_POST["date_fin"]) 
        ) {
            $promos = new promo(
                $_POST['id_pack'],
                $_POST['pourcentage'], 
            //    $_POST['date_deb'],
                $_POST['date_fin']
            );
if ($date_ac >= $_POST['date_fin'])
{
   echo "<script>alert ('la date fin doit etre differente et superieur à la date actuelle');</script>";}
   else if  ( $_POST['pourcentage']>= 100)
    {echo "<script>alert ('verifier le pourcentage');</script>";}
   else
          {  $promoC->ajouterPromo($promos);
             header('Location:showpromo.php');
        }}
        else
            $error = "Missing information";
    }

    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Pack - Dashboard HTML Template</title>
    <script src="verifpromo.js"></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
    Product Admin CSS Template
    https://templatemo.com/tm-524-product-admin
    -->
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">Pack Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="far fa-file-alt"></i>
                <span> Reports <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Daily Report</a>
                <a class="dropdown-item" href="#">Weekly Report</a>
                <a class="dropdown-item" href="#">Yearly Report</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="products.html">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Pack.html">
                <i class="fas fa-shopping-cart"></i> Pack
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.html">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link active" href="promo.html">
                <i class="far fa-user"></i> promo
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-cog"></i>
                <span> Settings <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Billing</a>
                <a class="dropdown-item" href="#">Customize</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login.html">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Promo</h2>
              </div>
            </div>
              <div id="error">
            <?php echo $error; ?>
        </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
             <form action="" method="POST">
                  <div class="form-group mb-3">
                    <label
                      for="id_pack"
                      > ID PACK
                    </label>
                    <input
                      id="id_pack"
                      name="id_pack"
                      type="number"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="pourcentage"
                      >Pourcentage</label
                    >
                    <input
                      id="pourcentage"
                      name="pourcentage"
                      type="number"
                      class="form-control validate"

                      required
                    />
                  
                  </div>
             <!--    <div class="form-group mb-3">
                    <label
                      for="date_deb"
                      >date debut</label
                    >
                    <input
                      id="date_deb"
                      name="date_deb"
                      type="date"
                      class="form-control validate"
                      required
                    />
                  </div>  -->
                  <div class="row">
                      <div class="form-group mb-3">
                          <label
                            for="date_fin"
                            > date fin
                          </label>
                          <input
                            id="date_fin"
                            name="date_fin"
                            type="date"
                            class="form-control validate"
                             required
                          />
                        </div>
                        
                  </div>
                  
              </div>
              
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Promo Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2021</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
        </div>
    </footer> 

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
