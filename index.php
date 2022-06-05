<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="frontend/libraries/bootstrap/css/bootstrap.css"
    />
    <link rel="stylesheet" href="frontend/styles/main.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
  require_once("sparqllib.php");
  $test = "";
  if (isset($_POST['search-data'])) {
    $test = $_POST['search-data'];
    $data = sparql_get(
      "http://localhost:3030/toko",
      "
      PREFIX p: <http://learningsparql.com/ns/shop#> 
      PREFIX d:  <http://learningsparql.com/ns/data#>

      SELECT ?Produk ?JenisProduk ?Toko ?Desc ?Harga ?Stok 
      WHERE
      { 
          ?s  d:namaProduk ?Produk ;
              d:JenisProduk ?JenisProduk;
              d:Toko ?Toko;
              d:Desc ?Desc;
              d:Harga ?Harga;
              d:Stok ?Stok;.
              FILTER (regex (?Produk,  '$test', 'i') || regex (?JenisProduk,  '$test', 'i') || regex (?Toko,  '$test', 'i') || regex (?Desc,  '$test', 'i') || regex (?Harga,  '$test', 'i') || regex (?Stok,  '$test', 'i'))
            }"
    );
  } else {
    $data = sparql_get(
      "http://localhost:3030/toko",
      "
      PREFIX p: <http://learningsparql.com/ns/shop#> 
      PREFIX d:  <http://learningsparql.com/ns/data#>

      SELECT ?Produk ?JenisProduk ?Toko ?Desc ?Harga ?Stok
      WHERE
      { 
          ?s  d:namaProduk ?Produk ;
              d:JenisProduk ?JenisProduk;
              d:Toko ?Toko;
              d:Desc ?Desc;
              d:Harga ?Harga;
              d:Stok ?Stok;.
              
      }

            "
    );
  }

  if (!isset($data)) {
    print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
  }

  ?>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <div class="container">
      <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
          <img src="frontend/images/logo.png" alt="" />
        </a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navb"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navb">
          <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item mx-md-2">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item mx-md-2">
              <a class="nav-link" href="#">Produk</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbardrop"
                data-toggle="dropdown"
              >
                Services
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
              </div>
            </li>
            <li class="nav-item mx-md-2">
              <a class="nav-link" href="#">Testimonial</a>
            </li>
          </ul>

          <!-- Mobile button -->
          <form class="form-inline d-sm-block d-md-none">
            <button class="btn btn-login my-2 my-sm-0">
              Masuk
            </button>
          </form>
          <!-- Desktop Button -->
          <form class="form-inline my-2 my-lg-0 d-none d-md-block">
            <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
              Masuk
            </button>
          </form>
        </div>
      </nav>
    </div>
    <header class="text-center">
      <h1>
        Toko Bapak
        <br />
        Ananda
      </h1>
      <p class="mt-3">
        Harga Murah dan Terjangkau
        <br />
        Barang Baru dan Berkualitas
      </p>
      <a href="#" class="btn btn-get-started px-4 mt-4">
        Get Started
      </a>
    </header>
    <main>
      <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
          <div class="col-3 col-md-2 stats-detail">
            <h2>20K</h2>
            <p>Produk</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>12</h2>
            <p>Negara</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>Penjual</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>72</h2>
            <p>Partners</p>
          </div>
        </section>
      </div>
      <section class="section-popular" id="popular">
        <div class="container">
          <div class="row">
            <div class="col text-center section-popular-heading">
              <h2>Barang Popular</h2>
              <p>
                Ayo ikuti tren masa kini
                <br />
                jangan mau ketinggalan!
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="section-popular-content" id="popularContent">
        <div class="container">
          <div class="section-popular-product row justify-content-center">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-product text-center d-flex flex-column"
                style="background-image: url('frontend/images/product-1.jpg');"
              >
                <div class="product-country">LAPTOP GAMING</div>
                <div class="product-location">ROG Strix</div>
                <div class="product-button mt-auto">
                  <a href="#" class="btn btn-product-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-product text-center d-flex flex-column"
                style="background-image: url('frontend/images/product-2.jpg');"
              >
                <div class="product-country">FASHION</div>
                <div class="product-location">GAMIS KATUN</div>
                <div class="product-button mt-auto">
                  <a href="#" class="btn btn-product-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-product text-center d-flex flex-column"
                style="background-image: url('frontend/images/product-3.jpeg');"
              >
                <div class="product-country">FOOD</div>
                <div class="product-location">JCO DONUT</div>
                <div class="product-button mt-auto">
                  <a href="#" class="btn btn-product-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-product text-center d-flex flex-column"
                style="background-image: url('frontend/images/product-4.jpg');"
              >
                <div class="product-country">IPHONE</div>
                <div class="product-location">IPHONE 13 PRO MAX</div>
                <div class="product-button mt-auto">
                  <a href="#" class="btn btn-product-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="text-center">
        <form action="" method="post" id="nameform">
        <div class="search-box">
          <input type="text" name="search-data" placeholder="Cari Produk" />
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <i class="bi bi-search"></i>
        </form>
      </section>
      <section class="text-center">
      <div class="row text-center mb-3 hasil">
          <div class="col">
            <h2>Hasil Pencarian</h2>
          </div>
        </div>
        <div class="row fs-5">
          <div class="col-md-5">
            <p>
              <span>
          <?php
          if ($test != NULL) {
            echo $test;
          } else {
            echo "Produk yang dicari :";
          }
          ?></span>
            </p>
          </div>
        </div>


 <div class="cari text-center">
    <table class="table" style="margin-bottom: 50px ;">
      <tr>
      <th>Nama Produk</th>
      <th>Jenis Produk</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Toko</th>
      <th>Stok</th>
      </tr>
      <?php $i = 0; ?>
  <?php foreach ($data as $dat) : ?>
      <tr>
      <td><?= $dat['Produk'] ?></td>
      <td><?= $dat['JenisProduk'] ?></td>
      <td><?= $dat['Desc'] ?></td>
      <td><?= $dat['Harga'] ?></td>
      <td><?= $dat['Toko'] ?></td>
      <td><?= $dat['Stok'] ?></td>
      </tr>
      <?php endforeach; ?>  
    </table>
  </div>

      </section>
    </main>
    <footer class="section-footer mt-5 mb-4 border-top">
      <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <h5>FEATURES</h5>
                    <ul class="list-unstyled">
                      <li>
                        <a href="#">Reviews</a>
                      </li>
                      <li>
                        <a href="#">Community</a>
                      </li>
                      <li>
                        <a href="#">Social Media Kit</a>
                      </li>
                      <li>
                        <a href="#">Affiliate</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-3">
                    <h5>ACCOUNT</h5>
                    <ul class="list-unstyled">
                      <li><a href="#">Refund</a></li>
                      <li><a href="#">Security</a></li>
                      <li><a href="#">Rewards</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-3">
                    <h5>COMPANY</h5>
                    <ul class="list-unstyled">
                      <li><a href="#">Career</a></li>
                      <li><a href="#">Help Center</a></li>
                      <li><a href="#">Media</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-3">
                    <h5>Get Connected</h5>
                    <ul class="list-unstyled">
                      <li>Jatinangor</li>
                      <li>Indonesia</li>
                      <li>0821 - 2222 - 8888</li>
                      <li>support@nanda.id</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div
          class="row border-top justify-content-center align-items-center pt-4"
        >
          <div class="col-auto text-gray-500 font-weight-light">
            2022 Copyright Ananda Miftakhul Syifa • 140810190071 • Made in Jatinangor
          </div>
        </div>
      </div>
    </footer>
    <script src="frontend/libraries/retina/retina.js"></script>
    <script src="frontend/libraries/jquery/jquery-3.4.1.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
  </body>
</html>
