<?php
	require 'configProductDB.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel = 'stylesheet' href = "../CSS/bootstrap.css">
  <link rel='stylesheet' href='../CSS/cart.css'>
  <link rel ='stylesheet' href ='../CSS/header.css'>
  <link rel ='stylesheet' href = '../CSS/f-style.css'>
</head>

<body>
  <!-- Navbar start -->
  <div class="scroll">
    <nav class="navbar navbar-expand-md navbar-dark">
    <a href="../index.php">   <img  class ="image" src="../images/hotthreadslogo.png">    </a>
    
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown" data-toggle="dropdown">
            <a class="nav-link active" href="productPage.php">Collections</a>
            <ul class="dropdown-menu" >
              <a class="dropdown-item" href="#!">Men</a>
              <a class="dropdown-item" href="#!">Women</a>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="productPage.php">Feedback</a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="productPage.php">Products</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart<span id="cart-item" class="badge badge-danger"  ></span></a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="loginPage.php">Sign In</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Navbar end -->


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center p-2">Complete your order</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
<footer>
    <div class="up-section">
    <ul>
            <h1>Top Categories</h1>
            <li><a href="productPage.php">Jeans</a></li>
            <li><a href="productPage.php">Top</a></li>
          </ul>
          <ul>
          <h1>Information & Customer Service</h1>
            <li><a href="AboutUs.php">About us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="ReturnsCancellation.php">Returns & Cancellation</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>       
      <ul>
        <h1>My Account</h1>
        <li><a href="#">My Account</a></li>
        <li><a href="#">Order History</a></li>
        <li><a href="#">Track Order</a></li>
        <li><a href="#">Wish List</a></li>
      </ul>
      <ul>
        <h1>Contact Us</h1>

        <li><p>HotThreads@gmail.com</p></li>
        <li><p>+91 6354339383</p></li>
      </ul>
      
      <div class="follow">
        <h1>Follow Us</h1>
        <div class="follow-icon">
          <a href="https://www.facebook.com/Hot-Threads-113552533795196/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/invites/contact/?i=1llwsis1okxaz&utm_content=kb01cdy" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://wa.me/c/916354339383"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
    <p class="copyright">Going to Internet copyright 2009</p>
  </footer>
</html>