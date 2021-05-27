<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel = 'stylesheet' href = "../CSS/bootstrap.css">
  <link rel='stylesheet' href='../CSS/product.css'>
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

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="padding-left:3%">
        <div class="sidebar-sticky pt-3">
          <!-- Section: Sidebar -->
          <section>

            <!-- Section: Filters -->
            <section>
              <!-- Section: Categories-->
              <section>

                <h5>Categories</h5>

                <div class="mb-5">
                  <a href="#!">Jeans</a></br>
                  <a href="#!">Jeggings</a>

                </div>

</section>
              <!-- Section: Categories -->
              <!-- Section: Condition-->
              <section class="mb-4">

                <h6 class="font-weight-bold ">Color</h6>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="new">
                  <label class="form-check-label" for="new">Light Blue</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input " id="used">
                  <label class="form-check-label" for="used">Navy Blue</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="collectible">
                  <label class="form-check-label" for="collectible">Dark Blue</label>
                </div>
                <div class="form-check   ">
                  <input type="checkbox" class="form-check-input " id="renewed">
                  <label class="form-check-label   " for="renewed">Rose Smoke</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input " id="renewed">
                  <label class="form-check-label" for="renewed">Grey</label>
                </div>
                <div class="form-check   ">
                  <input type="checkbox" class="form-check-input " id="renewed">
                  <label class="form-check-label" for="renewed">Carolina Stone</label>
                </div>

              </section>
              <!-- Section: Condition -->

              <!-- Section: Price -->
              <section class="mb-4">

                <h6 class="font-weight-bold ">Price</h6>

                <div class="form-check  ">
                  <input type="radio" class="form-check-input" id="under25" name="materialExampleRadios">
                  <label class="form-check-label" for="under25">Under Rs.250</label>
                </div>
                <div class="form-check  ">
                  <input type="radio" class="form-check-input" id="2550" name="materialExampleRadios">
                  <label class="form-check-label" for="2550">Rs.250 to Rs.500</label>
                </div>
                <div class="form-check  ">
                  <input type="radio" class="form-check-input" id="50100" name="materialExampleRadios">
                  <label class="form-check-label" for="50100">Rs.500 to Rs.1000</label>
                </div>
                <div class="form-check  ">
                  <input type="radio" class="form-check-input" id="100200" name="materialExampleRadios">
                  <label class="form-check-label" for="100200">Rs.1000 to Rs.2000</label>
                </div>
                <div class="form-check  ">
                  <input type="radio" class="form-check-input" id="200above" name="materialExampleRadios">
                  <label class="form-check-label" for="200above">Rs.2000 & Above</label>
                </div>
              </section>
              <!-- Section: Price -->

              <!-- Section: Size -->
              <section class="mb-4" style="color: rgba(0, 0, 0, .85);">

                <h6 class="font-weight-bold ">Size</h6>

                <div class="form-check  ">
                  <input type="checkbox" class="form-check-input " id="30">
                  <label class="form-check-label" for="30">30</label>
                </div>
                <div class="form-check  ">
                  <input type="checkbox" class="form-check-input " id="32">
                  <label class="form-check-label" for="32">32</label>
                </div>
                <div class="form-check  ">
                  <input type="checkbox" class="form-check-input " id="34">
                  <label class="form-check-label" for="34">34</label>
                </div>
                <div class="form-check  ">
                  <input type="checkbox" class="form-check-input " id="36">
                  <label class="form-check-label" for="36">36</label>
                </div>

              </section>
            </section>
          </section>
        </div>
      </nav>


      <!-- Displaying Products Start -->
      <div class="container">
        <div id="message"></div>
        <div class="row mt-2 pb-3">
          <?php
  			include 'configProductDB.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
              <div class="p-2 mb-2">
                <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
                <div class="card-body p-1">
                  <h4 class="card-title text-center" style="font-size:20px"><?= $row['product_name'] ?></h4>
                  <h5 class="card-text text-center"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

                </div>
                <div class="card-footers">
                  <form action="" class="form-submit">
                    <div class="row p-2">
                      <div class="col-md-6 py-1 pl-4">
                        <b>Quantity: </b>
                      </div>
                      <div class="col-md-6">
                        <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                      </div>
                    </div>
                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                    <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                    <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                    <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                    <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                      cart</button>
                    <button class="btn btn-info btn-block addItemBtn">Details</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <!-- Displaying Products End -->

      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

      <script type="text/javascript">
        $(document).ready(function() {

          // Send product details in the server
          $(".addItemBtn").click(function(e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            var pqty = $form.find(".pqty").val();

            $.ajax({
              url: 'action.php',
              method: 'post',
              data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pqty: pqty,
                pimage: pimage,
                pcode: pcode
              },
              success: function(response) {
                $("#message").html(response);
                window.scrollTo(0, 0);
                load_cart_item_number();
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
      <footer style="width: 100%;">
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

            <li>
              <p>HotThreads@gmail.com</p>
            </li>
            <li>
              <p>+91 6354339383</p>
            </li>
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
</body>



</html>