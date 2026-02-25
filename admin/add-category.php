<?php include "../misc/connect.php";

function getEnumValues($conn, $table, $column)
{
  $sql = "SHOW COLUMNS FROM `$table` LIKE '$column'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if ($row && preg_match("/^enum\((.*)\)$/i", $row['Type'], $matches)) {
    return str_getcsv($matches[1], ',', "'");
  }

  return [];
}

$statusEnum = getEnumValues($conn, 'item', 'status');
$categoryEnum = getEnumValues($conn, 'item', 'categories');

?>
<!doctype html>
<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />

  <title>Enrollment System</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../assets/vendor/fonts/iconify-icons.css" />

  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css -->

  <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

  <link rel="stylesheet" href="../assets/vendor/css/core.css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->

  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- endbuild -->

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/style.css">

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

  <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->

  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
              <span class="text-primary">
                <img src="../assets/img/icon/company-icon.png" alt="Company Icon" style="width: 40px; height: 34px;" />
              </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">LJH</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item">
            <a href="index.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-dashboard-fill"></i>
              <div data-i18n="Dashboards">Dashboard</div>

            </a>
          </li>



          <!-- Apps & Pages -->

          <!-- Item Verification Sidebar -->
          <li class="menu-header mt-7">
            <span class="menu-header-text">Item Verification</span>
          </li>

          <li class="menu-item">
            <a href="lost-submit.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-bard-fill"></i>
              <div data-i18n="Basic">Submitted Lost Item</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="found-submit.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-bard-line"></i>
              <div data-i18n="Basic">Submitted Found Item</div>
            </a>
          </li>

          <!-- Category Management -->
          <li class="menu-header mt-7">
            <span class="menu-header-text">Category Management</span>
          </li>

          <li class="menu-item">
            <a href="view.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-list-view"></i>
              <div data-i18n="Basic">View Categories</div>
            </a>
          </li>
          <li class="menu-item active open">
            <a href="add-category.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-file-add-line"></i>
              <div data-i18n="Basic">Add Categories</div>
            </a>
          </li>
          <li class="menu-item">
            <a class="menu-link">
              <i class="menu-icon icon-base ri ri-file-edit-line"></i>
              <div data-i18n="Basic">Update Categories</div>
            </a>
          </li>

          <!-- Matchmaking Tool -->
          <li class="menu-header mt-7">
            <span class="menu-header-text">Matchmaking Tool</span>
          </li>

          <li class="menu-item">
            <a href="all-items.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-file-paper-2-line"></i>
              <div data-i18n="Basic">All Items</div>
            </a>
          </li>

          <!-- Reports Management -->
          <li class="menu-header mt-7">
            <span class="menu-header-text">Reports Management</span>
          </li>

          <li class="menu-item">
            <a href="view.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-find-replace-line"></i>
              <div data-i18n="Basic">Found Item Reports</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="view.php" class="menu-link">
              <i class="menu-icon icon-base ri ri-hand-coin-line"></i>
              <div data-i18n="Basic">Claims Reports</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link">
              <i class="menu-icon icon-base ri ri-hourglass-2-fill"></i>
              <div data-i18n="Basic">Unsolved Reports</div>
            </a>
          </li>

          <!-- / SIDEBAR-->

        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ri ri-menu-line icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="icon-base ri ri-search-line icon-lg lh-0"></i>
                <input
                  type="text"
                  class="form-control border-0 shadow-none"
                  placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-md-auto">
              <!-- Place this tag where you want the button to render. -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a
                  class="nav-link dropdown-toggle hide-arrow p-0"
                  href="javascript:void(0);"
                  data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt="alt" class="rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt="alt" class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">John Doe</h6>
                          <small class="text-body-secondary">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="icon-base ri ri-user-line icon-md me-3"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="icon-base ri ri-settings-4-line icon-md me-3"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 icon-base ri ri-bank-card-line icon-md me-3"></i>
                        <span class="flex-grow-1 align-middle ms-1">Billing Plan</span>
                        <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <div class="d-grid px-4 pt-2 pb-1">
                      <a class="btn btn-danger d-flex" href="../login/login.php">
                        <small class="align-middle">Logout</small>
                        <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- CONTENT AREA -->

            <h3 class="mb-1"> Add Lost Item</h3>
            <div class="row mb-6 gy-6">
              <div class="col-xl">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Details</h5>

                  </div>
                  <div class="card-body">

                    <form action="insert-category.php" method="POST">
                      <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="itemName" class="form-control" id="itemName" placeholder="Bag" />
                        <label for="itemName">Item Name</label>
                      </div>

                      <div class="form-floating form-floating-outline mb-6">
                        <select name="categories" id="categories" class="form-select" required>
                          <?php
                          foreach ($categoryEnum as $value) {
                            $safeValue = htmlspecialchars($value);
                            $isSelected = ($selectedCategory === $value) ? ' selected' : '';
                            echo '<option value="' . $safeValue . '"' . $isSelected . '>' . ucfirst($safeValue) . '</option>';
                          }
                          ?>
                        </select>

                        <label for="categories">Category</label>
                      </div>

                      <div class="form-floating form-floating-outline mb-6">
                        <select name="status" id="status" class="form-select" required>
                          <?php
                          foreach ($statusEnum as $value) {
                            $safeValue = htmlspecialchars($value);
                            $isSelected = ($selectedStatus === $value) ? ' selected' : '';
                            echo '<option value="' . $safeValue . '"' . $isSelected . '>' . ucfirst($safeValue) . '</option>';
                          }
                          ?>
                        </select>
                        <label for="status">Status</label>
                      </div>

                      <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="description" class="form-control" id="description" placeholder="Description of the item" />
                        <label for="description">Description</label>
                      </div>


                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>




              <!-- / CONTENT AREA-->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    &#169;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    Enrollment Management System

                  </div>

                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>

    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>

    <script src="..//assets/js/sweetalert.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>
</body>

</html>