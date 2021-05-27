<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
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
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center m-0">Products in your cart</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'configProductDB.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3" >
                  <a href="productPage.php" class="btn btn-success" ><i class="fas fa-cart-plus" ></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
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
    <p class="copyright">Going to Internet copyright 2020</p>
  </footer>
</html>