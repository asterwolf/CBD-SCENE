<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title> Not Pot Shop Admin Page</title>
  <link rel="stylesheet" href="./CSS/Footer-Dark.css">
  <link rel="stylesheet" href="./fonts/ionicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
</body>
<br>
<div class = "navigation">
  <ul class="nav nav-pills justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="home.html">Home</a>
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
      <a class="nav-link active" href="#">Admin</a>
    </li>
  </ul>
</div>
<hr>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Products</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Orders</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <h2> Dashboard</h2>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Most Bought Item</a>

              <h6> product </h6>
              <hr>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Least Bought Item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Sales</a>
            </li>
          </ul>
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <h2> Add Product </h2>
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Name:</label>
            <input class="form-control" type="text" placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Product Type:</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Oils</option>
              <option>Smokes</option>
              <option>Edibles</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Price:</label>
            <input class="form-control" type="text" placeholder="Price">
          </div>
          <button type="submit" class="btn btn-primary" formmethod="post" onclick()="">Add</button>
        </form>
        <br>
        <h2> Remove Product</h2>
        <div class = "product">
          <?php
            include_once 'removeProduct.php';
            loadAll($_GET['sort']);
          ?>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <h2> Orders </h2>
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <h2> Settings </h2>
      </div>
    </div>
  </div>
</div>
</body>
</html>
