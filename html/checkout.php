<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
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
  
  // Transfer $_POST data into array variable.
  $myarray = $_POST;

  // Check to see if $_POST has returned data to be deleted from the shopping cart.
  if(isset($myarray['delete'])){
    
    // Store index to be deleted.
    $index = $myarray['delete'] ;
    
    // Unset the element from 'My Order' array.
    unset($_SESSION['My Order'][$index]);
  } 
  
  // Since the last submission was not to delete an order from the shopping cart, continue with $_SESSION update.
  else{
 
    // If array contains order information, commit it to $_SESSION.
    // If the array is empty or if the specified quantity is non-numeric, do NOT commit it to $_SESSION.
    if(!empty($myarray) && is_numeric($myarray['Qty'])){
      array_push($_SESSION['My Order'], $myarray);
    }
  }
              
  ?>


    <!-- Generate fixed top bar -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand">Three Aces Pizza</a>
        </div><!-- /.container-fluid -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar-fixed-top -->


    <!-- Generate Side Navigation Bar. -->
    <!-- The user will navigate the menu using these links. -->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
            
              <!-- List all Menu Categories -->
              <li class="nav-header">Shopping Cart</li>

              <?php
              
              // Initialize running total variable.
              $total = 0;
              
              // Iterate through each order and print them to the shopping cart.
              foreach($_SESSION['My Order'] as $key=>$order){
              
                // Initialize the $plural variable.
                $plural = "";
              
                // Check if the quantity warrants pluralizing the item.
                if($order['Qty'] > 1){
                  $plural = "s";
                }
              
                // Print the order to the shopping cart.  ex: "2 Tomato and Cheese Pizzas @ $9.99 each."
                echo "<li>" . $order['Qty'] . " " . $order['item_name'] . " " . $order['category'] . $plural . " @ $" . $order['price'] . " each.</li>";
              
                // Calculate Running Total.
                $total = $total + ($order['Qty'] * $order['price']);

                echo "<hr>";
              
                }
              
              // Format $total to represent money.
              $total = money_format('%i', $total); 
              
              // Allow the user to start a new order.  index.php will restart the session.
              echo "<a class='btn btn-success' href='index.php'><i class='icon-shopping-cart icon-white'></i> Start A New Order</a>";

              // DESTROY $_SESSION! ($total has already been saved.)
              session_destroy();

              ?>
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
       
       
        <!-- Generate Thank You Ticket -->
        
        <div class="span9">
          <div class="hero-unit">           
            <h1>Thank you!</h1>
            <hr>
            <p>Your order has been placed.  The total is $<?php echo $total ?>.</p>
          </div><!-- /.hero-unit -->
        </div><!--/.span-->
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
