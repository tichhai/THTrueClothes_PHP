<?php
  include_once "../db/db.php";
  session_start();
  if(!isset($_GET["id"])){
    echo "Không có Order ID";
    exit();
  }
  try {
    $sql = "SELECT * FROM order_detail WHERE `order`=:order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":order_id",$_GET["id"]);
    $stmt->execute(); 
    $order_details = $stmt->fetchAll();
    $sql = "SELECT * FROM `order` WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$_GET["id"]);
    $stmt->execute(); 
    $order = $stmt->fetch();
  } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
    <title>THTrueClothes</title>
    <meta charset="utf-8" />
    <meta name="author" content="themesflat.com" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <link rel="stylesheet" type="text/css" href="css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="css/animation.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/bootstrap-select.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="font/fonts.css" />
    <link rel="stylesheet" href="icon/style.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
  </head>

  <body class="body">
    <div id="wrapper">
      <div id="page" class="">
        <div class="layout-wrap">
          <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

          <div class="section-menu-left">
            <div class="box-logo">
              <a href="index.php" id="site-logo-inner">
                <img
                  class=""
                  style="width: 50px !important; height: 50px !important"
                  alt=""
                  src="../assets/images/logo1.png"
                  data-light="../assets/images/logo1.png"
                  data-dark="../assets/images/logo1.png"
                />
              </a>
              <div class="button-show-hide">
                <i class="icon-menu-left"></i>
              </div>
            </div>
            <div class="center">
              <div class="center-item">
                <div class="center-heading">Main Home</div>
                <ul class="menu-list">
                  <li class="menu-item">
                    <a href="index.php" class="">
                      <div class="icon"><i class="icon-grid"></i></div>
                      <div class="text">Dashboard</div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="center-item">
                <ul class="menu-list">
                  <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                      <div class="icon"><i class="icon-shopping-cart"></i></div>
                      <div class="text">Products</div>
                    </a>
                    <ul class="sub-menu">
                      <li class="sub-menu-item">
                        <a href="add-product.php" class="">
                          <div class="text">Add Product</div>
                        </a>
                      </li>
                      <li class="sub-menu-item">
                        <a href="products.php" class="">
                          <div class="text">Products</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                      <div class="icon"><i class="icon-layers"></i></div>
                      <div class="text">Brand</div>
                    </a>
                    <ul class="sub-menu">
                      <li class="sub-menu-item">
                        <a href="add-brand.php" class="">
                          <div class="text">New Brand</div>
                        </a>
                      </li>
                      <li class="sub-menu-item">
                        <a href="brands.php" class="">
                          <div class="text">Brands</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                      <div class="icon"><i class="icon-layers"></i></div>
                      <div class="text">Category</div>
                    </a>
                    <ul class="sub-menu">
                      <li class="sub-menu-item">
                        <a href="add-category.php" class="">
                          <div class="text">New Category</div>
                        </a>
                      </li>
                      <li class="sub-menu-item">
                        <a href="categories.php" class="">
                          <div class="text">Categories</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                      <div class="icon"><i class="icon-file-plus"></i></div>
                      <div class="text">Order</div>
                    </a>
                    <ul class="sub-menu">
                      <li class="sub-menu-item">
                        <a href="orders.php" class="">
                          <div class="text">Orders</div>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a href="slider.php" class="">
                      <div class="icon"><i class="icon-image"></i></div>
                      <div class="text">Slider</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="users.php" class="">
                      <div class="icon"><i class="icon-user"></i></div>
                      <div class="text">User</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="settings.php" class="">
                      <div class="icon"><i class="icon-settings"></i></div>
                      <div class="text">Settings</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="../index.php" class="">
                      <div class="icon"><i class="icon-shopping-cart"></i></div>
                      <div class="text">Online Store</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="section-content-right">
            <div class="header-dashboard">
              <div class="wrap">
                <div class="header-left">
                  <a href="index-2.html">
                    <img
                      class=""
                      style="width: 50px !important; height: 50px !important"
                      alt=""
                      src="../assets/images/logo1.png"
                      data-light="../assets/images/logo1.png"
                      data-dark="../assets/images/logo1.png"
                      data-width="154px"
                      data-height="52px"
                      data-retina="../assets/images/logo1.png"
                    />
                  </a>
                  <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                  </div>

                  
                </div>
                <div class="header-grid">
                  <div class="popup-wrap user type-header">
                    <div class="dropdown">
                      <button
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton3"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <span class="header-user wg-user">
                          <span class="image">
                            <img src="<?php echo $_SESSION["image"]?>" alt="" />
                          </span>
                          <span class="flex flex-column">
                            <span class="body-title mb-2"
                              ><?php echo $_SESSION["name"]?></span
                            >
                            <span class="text-tiny"
                              ><?php echo $_SESSION["role"]?></span
                            >
                          </span>
                        </span>
                      </button>
                      <ul
                        class="dropdown-menu dropdown-menu-end has-content"
                        aria-labelledby="dropdownMenuButton3"
                      >
                        
                        <li>
                          <a href="../logout.php" class="user-item">
                            <div class="icon">
                              <i class="icon-log-out"></i>
                            </div>
                            <div class="body-title-2">Log out</div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="main-content">
              <style>
                .table-transaction > tbody > tr:nth-of-type(odd) {
                  --bs-table-accent-bg: #fff !important;
                }
              </style>
              <div class="main-content-inner">
                <div class="main-content-wrap">
                  <div
                    class="flex items-center flex-wrap justify-between gap20 mb-27"
                  >
                    <h3>Order Details</h3>
                    <ul
                      class="breadcrumbs flex items-center flex-wrap justify-start gap10"
                    >
                      <li>
                        <a href="#">
                          <div class="text-tiny">Dashboard</div>
                        </a>
                      </li>
                      <li>
                        <i class="icon-chevron-right"></i>
                      </li>
                      <li>
                        <div class="text-tiny">Order Items</div>
                      </li>
                    </ul>
                  </div>

                  <div class="wg-box">
                    <div
                      class="flex items-center justify-between gap10 flex-wrap"
                    >
                      <div class="wg-filter flex-grow">
                        <h5>Ordered Items</h5>
                      </div>
                      <a class="tf-button style-1 w208" href="orders.php"
                        >Back</a
                      >
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">SKU</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($order_details as $order_detail)
                          {
                            try {
                              $sql = "SELECT * FROM product WHERE id=:order_product";
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(":order_product",$order_detail["product"]);
                              $stmt->execute();
                              $productOfOrder = $stmt->fetch(PDO::FETCH_ASSOC);
                              $sql = "SELECT * FROM brand WHERE id=:order_brand";
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(":order_brand",$productOfOrder["brand"]);
                              $stmt->execute();
                              $brandOfOrder = $stmt->fetch(PDO::FETCH_ASSOC);
                              $sql = "SELECT * FROM category WHERE id=:order_category";
                              $stmt = $pdo->prepare($sql);
                              $stmt->bindParam(":order_category",$productOfOrder["category"]);
                              $stmt->execute();
                              $categoryOfOrder = $stmt->fetch(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                echo "Lỗi: " . $e->getMessage();
                            }
                            ?>
                            <tr>
                            <td class="pname">
                              <div class="image">
                                <img
                                  src="<?php echo $productOfOrder["image"]?>"
                                  alt=""
                                  class="image"
                                />
                              </div>
                              <div class="name">
                                <div class="body-title-2"
                                  ><?php echo $productOfOrder["title"]?></div
                                >
                              </div>
                            </td>
                            <td class="text-center">$<?php echo $order_detail["price"]?></td>
                            <td class="text-center"><?php echo $order_detail["qty"]?></td>
                            <td class="text-center"><?php echo $productOfOrder["sku"]?></td>
                            <td class="text-center"><?php echo $categoryOfOrder["title"]?></td>
                            <td class="text-center"><?php echo $brandOfOrder["title"]?></td>
                            <td class="text-center">
                              <div class="list-icon-function view-icon">
                                <a href="products.php" class="item eye">
                                  <i class="icon-eye"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <?php }?>
                          
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="divider"></div>
                    <div
                      class="flex items-center justify-between flex-wrap gap10 wgp-pagination"
                    ></div>
                  </div>

                  <div class="wg-box mt-5">
                    <h5>Shipping Address</h5>
                    <div class="my-account__address-item col-md-6">
                      <div class="my-account__address-item__detail">
                        <p><?php echo $order["name"]?></p>
                        <p><?php echo $order["address"]?></p>
                        <br />
                        <p>Mobile : <?php echo $order["phone"]?></p>
                      </div>
                    </div>
                  </div>

                  <div class="wg-box mt-5" style="overflow: auto">
                    <h5>Transactions</h5>
                    <table
                      class="table table-striped table-bordered table-transaction"
                    >
                      <tbody>
                        <tr>
                          <th>Subtotal</th>
                          <td>$<?php echo $order["subtotal"]?></td>
                          <th>Tax</th>
                          <td>$0.0</td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td>$<?php echo $order["total"]?></td>
                          <th>Payment Method</th>
                          <td><?php echo $order["payment_method"]?></td>
                        </tr>
                        <tr>
                          <th>Order Date</th>
                          <td><?php echo $order["created_at"]?></td>
                          <th>Status</th>
                          <td><?php echo $order["status"]?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="bottom-page">
                <div class="body-text">Copyright © 2024 THTrueClothes</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/apexcharts/apexcharts.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
