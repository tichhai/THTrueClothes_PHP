<?php 
  include_once "../db/db.php";
  session_start();
  $limit = 1;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $offset = ($page - 1) * $limit;
  $orders = [];
  $name = "";
  if (isset($_GET['name'])) {
    $name = trim($_GET['name']); 
    try {
      $countSql = "SELECT COUNT(*) FROM `order` WHERE name LIKE :name";
      $countStmt = $pdo->prepare($countSql);
      $searchTerm = "%" . $name . "%";
      $countStmt->bindParam(':name', $searchTerm);
      $countStmt->execute();
      
      $total = $countStmt->fetchColumn();
      
      $sql = "SELECT * FROM `order` WHERE name LIKE :name LIMIT :limit OFFSET :offset";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':name', $searchTerm);
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      
      $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  } else {
    try {
      $countSql = "SELECT COUNT(*) FROM `order`";
      $countStmt = $pdo->query($countSql);
      $total = $countStmt->fetchColumn();
     
      $sql = "SELECT * FROM `order` LIMIT :limit OFFSET :offset";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      
      $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }

  $totalPages = ceil($total / $limit);
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
                  style="width: 50px !important;height: 50px !important;"
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
                      style="width: 50px !important;height: 50px !important;"
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
              <div class="main-content-inner">
                <div class="main-content-wrap">
                  <div
                    class="flex items-center flex-wrap justify-between gap20 mb-27"
                  >
                    <h3>Orders</h3>
                    <ul
                      class="breadcrumbs flex items-center flex-wrap justify-start gap10"
                    >
                      <li>
                        <a href="index.php">
                          <div class="text-tiny">Dashboard</div>
                        </a>
                      </li>
                      <li>
                        <i class="icon-chevron-right"></i>
                      </li>
                      <li>
                        <div class="text-tiny">Orders</div>
                      </li>
                    </ul>
                  </div>

                  <div class="wg-box">
                    <div
                      class="flex items-center justify-between gap10 flex-wrap"
                    >
                      <div class="wg-filter flex-grow">
                        <form class="form-search">
                          <fieldset class="name">
                            <input
                              type="text"
                              placeholder="Search here..."
                              class=""
                              name="name"
                              tabindex="2"
                              value=""
                              aria-required="true"
                              required=""
                            />
                          </fieldset>
                          <div class="button-submit">
                            <button class="" type="submit">
                              <i class="icon-search"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="wg-table table-all-user">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 70px">OrderNo</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Phone</th>
                              <th class="text-center">Subtotal</th>
                              <th class="text-center">Tax</th>
                              <th class="text-center">Total</th>

                              <th class="text-center">Status</th>
                              <th class="text-center">Order Date</th>
                              <th class="text-center">Total Items</th>
                              <th class="text-center">Delivered On</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach($orders as $order){?>
                            <tr>
                              <td class="text-center"><?php echo $order["id"]?></td>
                              <td class="text-center"><?php echo $order["name"]?></td>
                              <td class="text-center"><?php echo $order["phone"]?></td>
                              <td class="text-center">$<?php echo $order["subtotal"]?></td>
                              <td class="text-center">$0.0</td>
                              <td class="text-center">$<?php echo $order["total"]?></td>

                              <td class="text-center"><?php echo $order["status"]?></td>
                              <td class="text-center"><?php echo $order["created_at"]?></td>
                              <td class="text-center">
                                <?php 
                                  try{
                                    $sql="SELECT * FROM order_detail WHERE `order`=:order_id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindParam(":order_id",$order["id"]);
                                    $stmt->execute();
                                    echo $stmt->rowCount();
                                  }catch(PDOException $e){
                                    echo $e->getMessage();
                                  }
                                ?>
                              </td>
                              <td></td>
                              <td class="text-center">
                                <a href="order-details.php?id=<?php echo $order["id"]?>">
                                  <div class="list-icon-function view-icon">
                                    <div class="item eye">
                                      <i class="icon-eye"></i>
                                    </div>
                                  </div>
                                </a>
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="divider"></div>
                    <div
                      class="flex items-center justify-between flex-wrap gap10 wgp-pagination"
                    ><?php 
                          echo "<div class='pagination'>";
                          for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $page) {
                              echo "<span class='page-link bg-info'>$i</span>";
                            } else {
                              echo "<a href='?page=$i&name=$name' class='page-link'>$i</a>";
                            }
                          }
                          echo "</div>";
                      ?></div>
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
