<html>
  <head>
    <title> Not Pot Shop </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Not Pot Shop</title>
    <link rel="stylesheet" href="./fonts/ionicons.min.css">
    <link rel="stylesheet" href="./CSS/Contact-Form-Clean.css">
    <link rel="stylesheet" href="./CSS/Footer-Dark.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body class ="body">
    <div class="container">
      <div class="jumbotron">
        <img class = "logo" src = "./images/logo.png"> </img>
      </div>
      <div class = "navigation">
        <ul class="nav nav-pills justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="./index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.html">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="./products.html"> All Product</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Drops</a>
              <a class="dropdown-item" href="#">Smoke</a>
              <a class="dropdown-item" href="#">Edibles</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./contact.html">Contact</a>
          </li>
        </ul>
      </div>
      <hr>
      <br>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Filter Results
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Price(High to Low)</a>
    <a class="dropdown-item" href="#">Price(Low to High)</a>
  </div>
</div>
      <br>
    <div class = "product">
      <?php
        include_once 'loadProduct.php';
      ?>
        <!--  Will have the php populate page. Will remove this later

      <div class="row">
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card border border-dark" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="viewProduct.html" class="btn btn-primary">View Product</a>
            </div>
          </div>
        </div>
      </div>
    -->
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