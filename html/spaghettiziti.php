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
              <li><a href="grinders.php">Grinders</a></li> <!-- End of Category List -->
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
       
       
       <!-- Generate Menu and Forms -->
        
        <div class="span6">
        
          <!-- Spaghetti -->
        
          <div class="hero-unit">
          
            <h2>Spaghetti</h2><br />
            
            <?php 
          
         
            // Load XML document using SimpleXML.
            $xml = simplexml_load_file("../content/menu.xml");
          
            // Iterate through XML document, starting with the children of the root element.
            foreach($xml->xpath("//Category") as $category){

              // Display only the "Spaghetti" category for this page.
              if ($category['name'] == "Spaghetti"){
              
                // Save Menu Category name.  Used later to generate form name.
                $cat = "" . $category['name'] . "";
                                
                // Iterate through menu items under Spaghetti element.
                foreach($category->children() as $menu_item){
                  echo "<div class='row-fluid'>";
                  
                  // Display Menu Item.
                  echo "  <h4>" . $menu_item['name'] . "</h4><br />";
                  
                  // Save Menu Item name.  Used later to generate form name.               
                  $item = "" . $menu_item['name'] . "";
                  
                  echo "</div>";
                
                  // Iterate through prices.
                  foreach($menu_item->children() as $price){
                    
                    echo "<div class='row-fluid'>";
                      
                    // Begin form input.  Using POST method for larger data sets and to avoid cutting and pasting a 
                    // address crashing the site.
                    echo "  <form action='spaghettiziti.php' method='post'>";
         
                    // Save category name to $_POST if this item is added to the shopping cart.
                    echo "    <input type='hidden' name='category' value='" . $cat . "' />";
                      
                    // Save name of menu item to $_POST if this item is added to the shopping cart.
                    echo "    <input type='hidden' name='item_name' value='" . $item . "' />";
                     
                    // Save price to $_POST if this item is added to shopping cart.
                    echo "    <input type='hidden' name='price' value=" . $price . " />";
                                       
                    // Display the price.
                    echo "  <div class='span3'>$" . $price . "</div><!-- /.span -->";
                    
                    echo "  <div class='row-fluid'>";
                    echo "    <div class='span5'>";
                    
                    // Create hidden input in order to pass the quantity desired for the current menu item.
                    // Since the quantities of more than one size are specified, the size is appended to the input name.
                    echo "      <input type='text' class='span5' placeholder='Qty' name='Qty' />";
                     
                    echo "      <input type='submit' value='Add to Order' />";
                  
                    echo "    </div><!-- /.span -->";
                    echo "  </div><!-- /.row-fluid -->";
                    echo "  </form>";
                    echo "</div><!-- /.row-fluid -->";
                  }                  
                }
              }
            }
            
            ?>           
          
          
          </div><!-- /.hero-unit /.Spaghetti-->
          
          <!-- Ziti -->
          
          <div class="hero-unit">
          
            <h2>Ziti</h2><br />
            
            <?php 
          
         
            // Load XML document using SimpleXML.
            $xml = simplexml_load_file("../content/menu.xml");
          
            // Iterate through XML document, starting with the children of the root element.
            foreach($xml->xpath("//Category") as $category){

              // Display only the "Ziti" category for this page.
              if ($category['name'] == "Ziti"){
              
                // Save Menu Category name.  Used later to generate form name.
                $cat = "" . $category['name'] . "";
                                
                // Iterate through menu items under Ziti element.
                foreach($category->children() as $menu_item){
                  echo "<div class='row-fluid'>";
                  
                  // Display Menu Item.
                  echo "  <h4>" . $menu_item['name'] . "</h4><br />";
                  
                  // Save Menu Item name.  Used later to generate form name.               
                  $item = "" . $menu_item['name'] . "";
                  
                  echo "</div>";
                
                  // Iterate through prices.
                  foreach($menu_item->children() as $price){
                    
                    echo "<div class='row-fluid'>";
                      
                    // Begin form input.  Using POST method for larger data sets and to avoid cutting and pasting a 
                    // address crashing the site.
                    echo "  <form action='spaghettiziti.php' method='post'>";
         
                    // Save category name to $_POST if this item is added to the shopping cart.
                    echo "    <input type='hidden' name='category' value='" . $cat . "' />";
                      
                    // Save name of menu item to $_POST if this item is added to the shopping cart.
                    echo "    <input type='hidden' name='item_name' value='" . $item . "' />";
                     
                    // Save price to $_POST if this item is added to shopping cart.
                    echo "    <input type='hidden' name='price' value=" . $price . " />";
                                       
                    // Display the price.
                    echo "  <div class='span3'>$" . $price . "</div><!-- /.span -->";
                    
                    echo "  <div class='row-fluid'>";
                    echo "    <div class='span5'>";
                    
                    // Create hidden input in order to pass the quantity desired for the current menu item.
                    // Since the quantities of more than one size are specified, the size is appended to the input name.
                    echo "      <input type='text' class='span5' placeholder='Qty' name='Qty' />";
                     
                    echo "      <input type='submit' value='Add to Order' />";
                  
                    echo "    </div><!-- /.span -->";
                    echo "  </div><!-- /.row-fluid -->";
                    echo "  </form>";
                    echo "</div><!-- /.row-fluid -->";
                  }                  
                }
              }
            }
            
            ?>           
          
          
          </div><!-- /.hero-unit /.Ziti -->
          
        </div><!--/.span-->
        
        <!-- Generate Shopping Cart -->
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
            
              <!-- List all orders currently in the shopping cart -->
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

                // Allow the user to delete this order.
                ?>
                
                <!-- Create form for deleting orders. -->
                <form action='spaghettiziti.php' method='post'>
                
                <!-- Submit the index of the order the user wants to delete. -->
                <input type="hidden" name="delete" value="<?php echo $key ?>" />
                
                <!-- Submit the Deletion Form.  The index will be sent via $_POST and used to find and remove the order from the $_SESSION. -->
                <input type="submit" value="Delete" class="btn btn-danger" />
                
                <!--
                <a type='submit' class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</a>
                -->
                
                </form>
                
                <?
              
                echo "<hr>";
              
                }
              
              // Format $total to represent money.
              $total = money_format('%i', $total);
              
              // Print the shopping cart total.
              echo "<li>Total: $" . $total . "</li>";
              
              echo "<hr>";
              
              // Allow the user to progress to the check-out counter.  All current orders will automatically transferred
              // to the check-out webpage via $_SESSION.
              echo "<a class='btn btn-success' href='checkout.php'><i class='icon-shopping-cart icon-white'></i> Checkout</a>";
              
              ?></li><!-- /.nav-header -->
            </ul><!-- /.nav-list -->
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
