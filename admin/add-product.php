<?php
  include_once "../db/db.php";
  session_start();
  try {
    $sql = "SELECT * FROM category";
    $stmt = $pdo->query($sql);
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql = "SELECT * FROM brand";
    $stmt = $pdo->query($sql);
    $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                      class=""
                      style="width: 50px !important;height: 50px !important;"
                      alt=""
                      src="../assets/images/logo1.png"
                      data-light="../assets/images/logo1.png"
                      data-dark="../assets/images/logo1.png"
                      data-retina="../assets/images/logo1.png"
                    />
                  </a>
                  <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                  </div>

                  <form class="form-search flex-grow">
                    <fieldset class="name">
                      <input
                        type="text"
                        placeholder="Search here..."
                        class="show-search"
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
                    <div class="box-content-search" id="box-content-search">
                      <ul class="mb-24">
                        <li class="mb-14">
                          <div class="body-title">Top selling product</div>
                        </li>
                        <li class="mb-14">
                          <div class="divider"></div>
                        </li>
                        <li>
                          <ul>
                            <li class="product-item gap14 mb-10">
                              <div class="image no-bg">
                                <img src="images/products/17.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Dog Food Rachael Ray Nutrish®</a
                                  >
                                </div>
                              </div>
                            </li>
                            <li class="mb-10">
                              <div class="divider"></div>
                            </li>
                            <li class="product-item gap14 mb-10">
                              <div class="image no-bg">
                                <img src="images/products/18.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Natural Dog Food Healthy Dog Food</a
                                  >
                                </div>
                              </div>
                            </li>
                            <li class="mb-10">
                              <div class="divider"></div>
                            </li>
                            <li class="product-item gap14">
                              <div class="image no-bg">
                                <img src="images/products/19.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Freshpet Healthy Dog Food and Cat</a
                                  >
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                      <ul class="">
                        <li class="mb-14">
                          <div class="body-title">Order product</div>
                        </li>
                        <li class="mb-14">
                          <div class="divider"></div>
                        </li>
                        <li>
                          <ul>
                            <li class="product-item gap14 mb-10">
                              <div class="image no-bg">
                                <img src="images/products/20.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Sojos Crunchy Natural Grain Free...</a
                                  >
                                </div>
                              </div>
                            </li>
                            <li class="mb-10">
                              <div class="divider"></div>
                            </li>
                            <li class="product-item gap14 mb-10">
                              <div class="image no-bg">
                                <img src="images/products/21.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Kristin Watson</a
                                  >
                                </div>
                              </div>
                            </li>
                            <li class="mb-10">
                              <div class="divider"></div>
                            </li>
                            <li class="product-item gap14 mb-10">
                              <div class="image no-bg">
                                <img src="images/products/22.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Mega Pumpkin Bone</a
                                  >
                                </div>
                              </div>
                            </li>
                            <li class="mb-10">
                              <div class="divider"></div>
                            </li>
                            <li class="product-item gap14">
                              <div class="image no-bg">
                                <img src="images/products/23.png" alt="" />
                              </div>
                              <div
                                class="flex items-center justify-between gap20 flex-grow"
                              >
                                <div class="name">
                                  <a href="product-list.html" class="body-text"
                                    >Mega Pumpkin Bone</a
                                  >
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </form>
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
              <!-- main-content-wrap -->
              <div class="main-content-inner">
                <!-- main-content-wrap -->
                <div class="main-content-wrap">
                  <div
                    class="flex items-center flex-wrap justify-between gap20 mb-27"
                  >
                    <h3>Add Product</h3>
                    <ul
                      class="breadcrumbs flex items-center flex-wrap justify-start gap10"
                    >
                      <li>
                        <a href="index-2.html">
                          <div class="text-tiny">Dashboard</div>
                        </a>
                      </li>
                      <li>
                        <i class="icon-chevron-right"></i>
                      </li>
                      <li>
                        <a href="all-product.html">
                          <div class="text-tiny">Products</div>
                        </a>
                      </li>
                      <li>
                        <i class="icon-chevron-right"></i>
                      </li>
                      <li>
                        <div class="text-tiny">Add product</div>
                      </li>
                    </ul>
                  </div>
                  <!-- form-add-product -->
                  <form
                    class="tf-section-2 form-add-product"
                    method="POST"
                    enctype="multipart/form-data"
                    action="adding-product.php"
                  >
                    <input
                      type="hidden"
                      name="_token"
                      value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx"
                      autocomplete="off"
                    />
                    <div class="wg-box">
                      <fieldset class="name">
                        <div class="body-title mb-10">
                          Product name <span class="tf-color-1">*</span>
                        </div>
                        <input
                          class="mb-10"
                          type="text"
                          placeholder="Enter product name"
                          name="name"
                          tabindex="0"
                          value=""
                          aria-required="true"
                          required=""
                        />
                      </fieldset>

                      <div class="gap22 cols">
                        <fieldset class="category">
                          <div class="body-title mb-10">
                            Category <span class="tf-color-1">*</span>
                          </div>
                          <div class="select">
                            <select class="" name="category_id">
                              <?php foreach($cates as $cate){?>
                                <option value="<?php echo $cate["id"]?>"><?php echo $cate["title"]?></option>
                                <?php
                                  }?>
                            </select>
                          </div>
                        </fieldset>
                        <fieldset class="brand">
                          <div class="body-title mb-10">
                            Brand <span class="tf-color-1">*</span>
                          </div>
                          <div class="select">
                            <select class="" name="brand_id">
                              <?php foreach($brands as $brand){?>
                                <option value="<?php echo $brand["id"]?>"><?php echo $brand["title"]?></option>
                                <?php
                                  }?>
                            </select>
                          </div>
                        </fieldset>
                      </div>

                      <fieldset class="shortdescription">
                        <div class="body-title mb-10">
                          Short Description 
                        </div>
                        <textarea
                          class="mb-10 ht-150"
                          name="short_description"
                          placeholder="Short Description"
                          tabindex="0"
                        ></textarea>
                      </fieldset>

                      <fieldset class="description">
                        <div class="body-title mb-10">
                          Description 
                        </div>
                        <textarea
                          class="mb-10"
                          name="description"
                          placeholder="Description"
                          tabindex="0"
                        ></textarea>
                      </fieldset>
                    </div>
                    <div class="wg-box">
                      <fieldset>
                        <div class="body-title">
                          Upload images <span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                          <div
                            class="item"
                            id="imgpreview"
                            style="display: none"
                          >
                            <img
                              src=""
                              class="effect8"
                              alt=""
                              id="previewImage"
                            />
                          </div>
                          <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                              <span class="icon">
                                <i class="icon-upload-cloud"></i>
                              </span>
                              <span class="body-text"
                                >Drop your images here or select
                                <span class="tf-color"
                                  >click to browse</span
                                ></span
                              >
                              <input
                                type="file"
                                id="myFile"
                                name="image"
                                accept="image/*"
                              />
                            </label>
                          </div>
                        </div>
                      </fieldset>

                      <fieldset>
                        <div class="body-title mb-10">
                          Upload Gallery Images
                        </div>
                        <div class="upload-image mb-16" id="galleryPreview">
                          <!-- <div class="item">
                            <img src="../assets/images/cart-item-1.jpg" alt="" />
                          </div> -->
                          <div id="galUpload" class="item up-load">
                            <label class="uploadfile" for="gFile">
                              <span class="icon">
                                <i class="icon-upload-cloud"></i>
                              </span>
                              <span class="text-tiny"
                                >Drop your images here or select
                                <span class="tf-color"
                                  >click to browse</span
                                ></span
                              >
                              <input
                                type="file"
                                id="gFile"
                                name="images[]"
                                accept="image/*"
                                multiple=""
                              />
                            </label>
                          </div>
                        </div>
                      </fieldset>

                      <div class="cols gap22">
                        <fieldset class="name">
                          <div class="body-title mb-10">
                            Regular Price <span class="tf-color-1">*</span>
                          </div>
                          <input
                            class="mb-10"
                            type="text"
                            placeholder="Enter regular price"
                            name="regular_price"
                            tabindex="0"
                            value=""
                            aria-required="true"
                            required=""
                          />
                        </fieldset>
                        <fieldset class="name">
                          <div class="body-title mb-10">
                            Sale Price 
                          </div>
                          <input
                            class="mb-10"
                            type="text"
                            placeholder="Enter sale price"
                            name="sale_price"
                            tabindex="0"
                            value=""
                          />
                        </fieldset>
                      </div>

                      <div class="cols gap22">
                        <fieldset class="name">
                          <div class="body-title mb-10">
                            SKU <span class="tf-color-1">*</span>
                          </div>
                          <input
                            class="mb-10"
                            type="text"
                            placeholder="Enter SKU"
                            name="SKU"
                            tabindex="0"
                            value=""
                            aria-required="true"
                            required=""
                          />
                        </fieldset>
                        <fieldset class="name">
                          <div class="body-title mb-10">
                            Quantity <span class="tf-color-1">*</span>
                          </div>
                          <input
                            class="mb-10"
                            type="text"
                            placeholder="Enter quantity"
                            name="quantity"
                            tabindex="0"
                            value=""
                            aria-required="true"
                            required=""
                          />
                        </fieldset>
                      </div>

                      <div class="cols gap22">
                        <fieldset class="name">
                          <div class="body-title mb-10">Stock</div>
                          <div class="select mb-10">
                            <select class="" name="stock_status">
                              <option value="0">Out of Stock</option>
                              <option value="1">InStock</option>
                            </select>
                          </div>
                        </fieldset>
                        <fieldset class="name">
                          <div class="body-title mb-10">Featured</div>
                          <div class="select mb-10">
                            <select class="" name="featured">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </fieldset>
                      </div>
                      <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">
                          Add product
                        </button>
                      </div>
                    </div>
                  </form>
                  <!-- /form-add-product -->
                </div>
                <!-- /main-content-wrap -->
              </div>
              <!-- /main-content-wrap -->

              <div class="bottom-page">
                <div class="body-text">Copyright © 2024 THTrueClothes</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/add-product.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/apexcharts/apexcharts.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
