<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Not Pot Shop </title>
    <link rel="stylesheet" href="./CSS/Footer-Dark.css">
    <link rel="stylesheet" href="./fonts/ionicons.min.css">
    <link rel="stylesheet" href="./CSS/cart.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
<body class="body">
  <div class="container home">
    <div class="jumbotron">
      <img class = "logo" src = "./images/logo.png"> </img>
    </div>
    <div class = "navigation">
      <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="./home.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="./product.php?sort='name'">All Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./product.php?sort=drops">Drops</a>
            <a class="dropdown-item" href="./product.php?sort=smoke">Smoke</a>
            <a class="dropdown-item" href="./product.php?sort=edible">Edibles</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./cart.php">Cart</a>
        </li>
      </ul>
    </div>
    <hr>
    <br>
    <div class="container">
	     <table id="cart" class="table table-hover table-condensed">
    				<thead>
  						<tr>
  							<th style="width:50%">Product</th>
  							<th style="width:10%">Price</th>
  							<th style="width:8%">Quantity</th>
  							<th style="width:22%" class="text-center">Subtotal</th>
  							<th style="width:10%"></th>
  						</tr>
					  </thead>
					  <tbody>
              <?php
              include_once 'loadProduct.php';
              loadCart();
              ?>
              <!-- <tr>
                <td data-th="Product">
  								<div class="row">
  									<div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
  									<div class="col-sm-9">
  										<h4 class="nomargin">Product 1</h4>
  										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
  									</div>
  								</div>
  							</td>
  							<td data-th="Price">$1.99</td>
  							<td data-th="Quantity">
  								<input type="number" class="form-control text-center" value="1">
  							</td>
  							<td data-th="Subtotal" class="text-center">1.99</td>
  							<td class="actions" data-th="">
  								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
  								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
  							</td>
  						</tr> -->
  					</tbody>
  					<tfoot>
  						<tr class="visible-xs">
  							<td class="text-center"><strong>Total 1.99</strong></td>
  						</tr>
  						<tr>
  							<td><a href="./product.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
  							<td colspan="2" class="hidden-xs"></td>
  							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
  							<td><a href="./checkout.html" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
  						</tr>
					 </tfoot>
				</table>
      </div>
    </div>
      <br>
      <div class="footer-dark">
          <footer>
              <div class="container">
                  <div class="row">
                      <div class="col-sm-6 col-md-3 item">
                          <h3>Services</h3>
                          <ul>
                              <li><a href="#">Web design</a></li>
                              <li><a href="#">Development</a></li>
                              <li><a href="#">Hosting</a></li>
                          </ul>
                      </div>
                      <div class="col-sm-6 col-md-3 item">
                          <h3>About</h3>
                          <ul>
                              <li><a href="#">Company</a></li>
                              <li><a href="#">Team</a></li>
                              <li><a href="#">Careers</a></li>
                          </ul>
                      </div>
                      <div class="col-md-6 item text">
                          <h3>Company Name</h3>
                          <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                      </div>
                      <div class="col item social"><a href="https://facebook.com"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com"><i class="icon ion-social-twitter"></i></a><a href="https://snapchat.com"><i class="icon ion-social-snapchat"></i></a><a href="https://instagram.com"><i class="icon ion-social-instagram"></i></a></div>
                  </div>
                  <p class="copyright">Company Name © 2017</p>
              </div>
          </footer>
      </div>

  </body>
</html>
