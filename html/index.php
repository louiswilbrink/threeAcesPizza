<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Three Aces Pizza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="bootstrap/docs/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/docs/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/docs/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="bootstrap/docs/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

  <?php
  
  // Start $_SESSION.
  session_start();
  $_SESSION['My Order'] = array() ;

  ?>
    <!-- Generate Fixed Project Bar at the top of the webpage -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand">Three Aces Pizza</a>
        </div>
      </div>
    </div>

    <!-- Generate Side Navigation Bar.  This will contain all of the Menu Categories, allowing the user
    easily navigate the menu -->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Categories</li>
              <li><a href="pizza.php">Pizza</a></li>
              <li><a href="specialtypizza.php">Specialty Pizza</a></li>
              <li><a href="specialdinners.php">Special Dinners</a></li>
              <li><a href="sideorders.php">Side Orders</a></li>
              <li><a href="salads.php">Salads</a></li>
              <li><a href="spaghettiziti.php">Spaghetti &amp; Ziti</a></li>
              <li><a href="lrm.php">Lasagna, Ravioli, Manicotti</a></li>
              <li><a href="calzones.php">Calzones</a></li>
              <li><a href="wraps.php">Wraps</a></li>
              <li><a href="grinders.php">Grinders</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
        <!-- Display Restaurant Name and contact information. -->
        <div class="span6">
            <h1>Three Aces Pizza</h1>
            <p>1613 Massachusetts Ave<br />Cambridge, MA 02139<br />617-491-2884<br />617-491-2889</p>
            <p><a class="btn btn-primary btn-large" href="pizza.php">Start Order &raquo;</a></p>
        </div><!--/span-->
        
        
        <!-- Display empty Shopping Cart. -->
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Shopping Cart</li>
              <li>empty</li>
            </ul>
          </div><!--/.well -->
        </div><!-- /span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/docs/assets/js/jquery.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-transition.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
