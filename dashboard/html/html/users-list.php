
<?php 
session_start();
include "include/meta.php";
?>


  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "include/aside.php" ?>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include "include/navbar.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="me-1">
                          <p class="text-heading mb-2">Total Users</p>
                          <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">21,459</h4>
                            <p class="text-success mb-2">(+29%)</p>
                          </div>
                          <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                          <div class="avatar-initial bg-label-primary rounded">
                            <div class="mdi mdi-account-outline mdi-24px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="me-1">
                          <p class="text-heading mb-2">Paid Users</p>
                          <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">4,567</h4>
                            <p class="text-success mb-2">(+18%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <div class="avatar-initial bg-label-danger rounded">
                            <div class="mdi mdi-account-plus-outline mdi-24px scaleX-n1"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="me-1">
                          <p class="text-heading mb-2">Active Users</p>
                          <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">19,860</h4>
                            <p class="text-danger mb-2">(-14%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <div class="avatar-initial bg-label-success rounded">
                            <div class="mdi mdi-account-check-outline mdi-24px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="me-1">
                          <p class="text-heading mb-2">Pending Users</p>
                          <div class="d-flex align-items-center">
                            <h4 class="mb-2 me-1 display-6">237</h4>
                            <p class="text-success mb-2">(+42%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <div class="avatar-initial bg-label-warning rounded">
                            <div class="mdi mdi-account-search mdi-24px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Users List Table -->
              <div class="card">
                <div class="card-header border-bottom">
                  <h5 class="card-title">Search Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-users table">
                    <thead class="table-light">
                      <tr>
                        <th></th>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>School</th>
                        <th>City</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Offcanvas to add new user -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="add-user-fullname"
                          placeholder="John Doe"
                          name="userFullname"
                          aria-label="John Doe" />
                        <label for="add-user-fullname">Full Name</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="add-user-email"
                          class="form-control"
                          placeholder="john.doe@example.com"
                          aria-label="john.doe@example.com"
                          name="userEmail" />
                        <label for="add-user-email">Email</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="add-user-contact"
                          class="form-control phone-mask"
                          placeholder="+1 (609) 988-44-11"
                          aria-label="john.doe@example.com"
                          name="userContact" />
                        <label for="add-user-contact">Contact</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="add-user-company"
                          class="form-control"
                          placeholder="Web Developer"
                          aria-label="jdoe1"
                          name="companyName" />
                        <label for="add-user-company">Company</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <select id="country" class="select2 form-select">
                          <option value="">Select</option>
                          <option value="Australia">Australia</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Brazil">Brazil</option>
                          <option value="Canada">Canada</option>
                          <option value="China">China</option>
                          <option value="France">France</option>
                          <option value="Germany">Germany</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Japan">Japan</option>
                          <option value="Korea">Korea, Republic of</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Philippines">Philippines</option>
                          <option value="Russia">Russian Federation</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Emirates">United Arab Emirates</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States">United States</option>
                        </select>
                        <label for="country">Country</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <select id="user-role" class="form-select">
                          <option value="subscriber">Subscriber</option>
                          <option value="editor">Editor</option>
                          <option value="maintainer">Maintainer</option>
                          <option value="author">Author</option>
                          <option value="admin">Admin</option>
                        </select>
                        <label for="user-role">User Role</label>
                      </div>
                      <div class="form-floating form-floating-outline mb-4">
                        <select id="user-plan" class="form-select">
                          <option value="basic">Basic</option>
                          <option value="enterprise">Enterprise</option>
                          <option value="company">Company</option>
                          <option value="team">Team</option>
                        </select>
                        <label for="user-plan">Select Plan</label>
                      </div>
                      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by
                    <a href="https://pixinvent.com" target="_blank" class="footer-link fw-medium">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/Magic Of Skills-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
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

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/app-user-list.js"></script>
  </body>
</html>
