<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); 
    exit();
  }
  if(isset($_SESSION["role"])){
    if($_SESSION["role"] != "ADMIN"){
      header("Location: ../login.php");
      exit();
    }
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
    <link rel="stylesheet" type="text/css" href="css/sweetalert.min.css" />
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
                      style="width: 50px !important;height: 50px !important;"
                      class=""
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
                            <span class="body-title mb-2"><?php echo $_SESSION["name"]?></span>
                            <span class="text-tiny"><?php echo $_SESSION["role"]?></span>
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
                  <div class="tf-section-2 mb-30">
                    <div class="flex gap20 flex-wrap-mobile">
                      <div class="w-half">
                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">Total Orders</div>
                                <h4>3</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">Total Amount</div>
                                <h4>481.34</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">Pending Orders</div>
                                <h4>3</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">
                                  Pending Orders Amount
                                </div>
                                <h4>481.34</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="w-half">
                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">
                                  Delivered Orders
                                </div>
                                <h4>0</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">
                                  Delivered Orders Amount
                                </div>
                                <h4>0.00</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default mb-20">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">
                                  Canceled Orders
                                </div>
                                <h4>0</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="wg-chart-default">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                              <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                              </div>
                              <div>
                                <div class="body-text mb-2">
                                  Canceled Orders Amount
                                </div>
                                <h4>0.00</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="wg-box">
                      <div class="flex items-center justify-between">
                        <h5>Earnings revenue</h5>
                        <div class="dropdown default">
                          <button
                            class="btn btn-secondary dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <span class="icon-more"
                              ><i class="icon-more-horizontal"></i
                            ></span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                              <a href="javascript:void(0);">Last Week</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="flex flex-wrap gap40">
                        <div>
                          <div class="mb-2">
                            <div class="block-legend">
                              <div class="dot t1"></div>
                              <div class="text-tiny">Revenue</div>
                            </div>
                          </div>
                          <div class="flex items-center gap10">
                            <h4>$37,802</h4>
                            <div class="box-icon-trending up">
                              <i class="icon-trending-up"></i>
                              <div class="body-title number">0.56%</div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="mb-2">
                            <div class="block-legend">
                              <div class="dot t2"></div>
                              <div class="text-tiny">Order</div>
                            </div>
                          </div>
                          <div class="flex items-center gap10">
                            <h4>$28,305</h4>
                            <div class="box-icon-trending up">
                              <i class="icon-trending-up"></i>
                              <div class="body-title number">0.56%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="line-chart-8"></div>
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
    <script src="js/sweetalert.min.js"></script>
    <script src="js/apexcharts/apexcharts.js"></script>
    <script src="js/main.js"></script>
    <script>
      (function ($) {
        var tfLineChart = (function () {
          var chartBar = function () {
            var options = {
              series: [
                {
                  name: "Total",
                  data: [
                    0.0, 0.0, 0.0, 0.0, 0.0, 273.22, 208.12, 0.0, 0.0, 0.0, 0.0,
                    0.0,
                  ],
                },
                {
                  name: "Pending",
                  data: [
                    0.0, 0.0, 0.0, 0.0, 0.0, 273.22, 208.12, 0.0, 0.0, 0.0, 0.0,
                    0.0,
                  ],
                },
                {
                  name: "Delivered",
                  data: [
                    0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0,
                  ],
                },
                {
                  name: "Canceled",
                  data: [
                    0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0,
                  ],
                },
              ],
              chart: {
                type: "bar",
                height: 325,
                toolbar: {
                  show: false,
                },
              },
              plotOptions: {
                bar: {
                  horizontal: false,
                  columnWidth: "10px",
                  endingShape: "rounded",
                },
              },
              dataLabels: {
                enabled: false,
              },
              legend: {
                show: false,
              },
              colors: ["#2377FC", "#FFA500", "#078407", "#FF0000"],
              stroke: {
                show: false,
              },
              xaxis: {
                labels: {
                  style: {
                    colors: "#212529",
                  },
                },
                categories: [
                  "Jan",
                  "Feb",
                  "Mar",
                  "Apr",
                  "May",
                  "Jun",
                  "Jul",
                  "Aug",
                  "Sep",
                  "Oct",
                  "Nov",
                  "Dec",
                ],
              },
              yaxis: {
                show: false,
              },
              fill: {
                opacity: 1,
              },
              tooltip: {
                y: {
                  formatter: function (val) {
                    return "$ " + val + "";
                  },
                },
              },
            };

            chart = new ApexCharts(
              document.querySelector("#line-chart-8"),
              options
            );
            if ($("#line-chart-8").length > 0) {
              chart.render();
            }
          };

          /* Function ============ */
          return {
            init: function () {},

            load: function () {
              chartBar();
            },
            resize: function () {},
          };
        })();

        jQuery(document).ready(function () {});

        jQuery(window).on("load", function () {
          tfLineChart.load();
        });

        jQuery(window).on("resize", function () {});
      })(jQuery);
    </script>
  </body>
</html>
