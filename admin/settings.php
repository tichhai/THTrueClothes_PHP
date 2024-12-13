<?php 
  include_once "../db/db.php";
  session_start();
  try {
    $sql = "SELECT * FROM setting";
    $stmt = $pdo->query($sql);
    $setting = $stmt->fetch(PDO::FETCH_ASSOC);
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
                  alt=""
                  src="../assets/images/logo1.png"
                  data-light="../assets/images/logo1.png"
                  data-dark="../assets/images/logo1.png"
                  style="width: 50px !important;height: 50px !important;"
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
                      alt=""
                      src="../assets/images/logo1.png"
                      data-light="../assets/images/logo1.png"
                      data-dark="../assets/images/logo1.png"
                      data-width="154px"
                      data-height="52px"
                      data-retina="../assets/images/logo1.png"
                      style="width: 50px !important;height: 50px !important;"
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
                .text-danger {
                  font-size: initial;
                  line-height: 36px;
                }

                .alert {
                  font-size: initial;
                }
              </style>

              <div class="main-content-inner">
                <div class="main-content-wrap">
                  <div
                    class="flex items-center flex-wrap justify-between gap20 mb-27"
                  >
                    <h3>Settings</h3>
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
                        <div class="text-tiny">Settings</div>
                      </li>
                    </ul>
                  </div>

                  <div class="wg-box">
                    <div class="col-lg-12">
                      <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                          <form
                            name="account_edit_form"
                            action="edit-setting.php"
                            method="POST"
                            class="form-new-product form-style-1 needs-validation"
                            novalidate=""
                          >
                            <fieldset class="name">
                              <div class="body-title">
                                Name <span class="tf-color-1">*</span>
                              </div>
                              <input
                                class="flex-grow"
                                type="text"
                                placeholder="Full Name"
                                name="name"
                                tabindex="0"
                                value="<?php echo $setting["name"]?>"
                                aria-required="true"
                                required=""
                              />
                            </fieldset>

                            <fieldset class="name">
                              <div class="body-title">
                                Mobile Number <span class="tf-color-1">*</span>
                              </div>
                              <input
                                class="flex-grow"
                                type="text"
                                placeholder="Mobile Number"
                                name="mobile"
                                tabindex="0"
                                value="<?php echo $setting["phone"]?>"
                                aria-required="true"
                                required=""
                              />
                            </fieldset>

                            <fieldset class="name">
                              <div class="body-title">
                                Email Address <span class="tf-color-1">*</span>
                              </div>
                              <input
                                class="flex-grow"
                                type="text"
                                placeholder="Email Address"
                                name="email"
                                tabindex="0"
                                value="<?php echo $setting["email"]?>"
                                aria-required="true"
                                required=""
                                disabled
                              />
                            </fieldset>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="my-3">
                                  <h5 class="text-uppercase mb-0">
                                    Password Change
                                  </h5>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <fieldset class="name">
                                  <div class="body-title pb-3">
                                    Old password
                                    <span class="tf-color-1">*</span>
                                  </div>
                                  <input
                                    class="flex-grow"
                                    type="password"
                                    placeholder="Old password"
                                    id="old_password"
                                    name="old_password"
                                    aria-required="true"
                                    required=""
                                  />
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <fieldset class="name">
                                  <div class="body-title pb-3">
                                    New password
                                    <span class="tf-color-1">*</span>
                                  </div>
                                  <input
                                    class="flex-grow"
                                    type="password"
                                    placeholder="New password"
                                    id="new_password"
                                    name="new_password"
                                    aria-required="true"
                                    required=""
                                  />
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <fieldset class="name">
                                  <div class="body-title pb-3">
                                    Confirm new password
                                    <span class="tf-color-1">*</span>
                                  </div>
                                  <input
                                    class="flex-grow"
                                    type="password"
                                    placeholder="Confirm new password"
                                    cfpwd=""
                                    data-cf-pwd="#new_password"
                                    id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    aria-required="true"
                                    required=""
                                  />
                                  <?php if(isset($_SESSION["error_setting"])){?>
                                  <div style="color:red;font-size: 19px;margin-top: 5px;">
                                    <?php echo $_SESSION["error_setting"]?>
                                  </div>
                                  <?php }?>
                                  <?php if(isset($_SESSION["changed_password"])){?>
                                  <div style="color:blue;font-size: 19px;margin-top: 5px;">
                                    <?php echo $_SESSION["changed_password"]?>
                                  </div>
                                  <?php }?>
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <div class="my-3">
                                  <button
                                    type="submit"
                                    class="btn btn-primary tf-button w208"
                                  >
                                    Save Changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
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
