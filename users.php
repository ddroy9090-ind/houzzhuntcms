
<?php include 'includes/auth.php'; ?>

<?php include 'includes/common-header.php' ?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">User Managements</h4>
                        </div>

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                                id="create-btn" data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add User</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">

                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="name">Name</th>
                                                <th class="sort" data-sort="username">Username</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <!-- <th class="sort" data-sort="password">Password</th>
                                                <th class="sort" data-sort="confirm_password">Confirm Password</th> -->
                                                <th class="sort" data-sort="role">Role</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php include "users_list.php"; ?>
                                        </tbody>

                                    </table>

                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched all records but did not find any
                                                matching result.</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0);">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- Register User Modal -->
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>

                        <!-- ✅ Backend Connected Form -->
                        <form id="registerForm" class="tablelist-form" action="register_user.php" method="POST"
                            autocomplete="off">
                            <div class="modal-body">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name-field" class="form-label">Name</label>
                                    <input type="text" id="name-field" name="name" class="form-control"
                                        placeholder="Enter Full Name" required />
                                </div>

                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username-field" class="form-label">Username</label>
                                    <input type="text" id="username-field" name="username" class="form-control"
                                        placeholder="Enter Username" required />
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" id="email-field" name="email" class="form-control"
                                        placeholder="Enter Email" required />
                                </div>

                                <!-- Password -->
                                <div class="mb-3 position-relative toggleBtn">
                                    <label for="password-field" class="form-label">Password</label>
                                    <input type="password" id="password-field" name="password" class="form-control"
                                        placeholder="Enter Password" required />
                                    <button type="button"
                                        class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2"
                                        onclick="togglePassword('password-field', this)">
                                        👁
                                    </button>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3 position-relative toggleBtn">
                                    <label for="confirm-password-field" class="form-label">Confirm Password</label>
                                    <input type="password" id="confirm-password-field" name="confirm_password"
                                        class="form-control" placeholder="Confirm Password" required />
                                    <button type="button"
                                        class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2"
                                        onclick="togglePassword('confirm-password-field', this)">
                                        👁
                                    </button>
                                </div>

                                <!-- Role -->
                                <div class="mb-3">
                                    <label for="role-field" class="form-label">Role</label>
                                    <select class="form-control form-select" name="role" id="role-field" required>
                                        <option value="">Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Channel Partner">Channel Partner</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ✅ Toasts -->
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <!-- Success Toast -->
                <div id="toastSuccess" class="toast align-items-center text-bg-success border-0" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">User registered successfully!</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast"></button>
                    </div>
                </div>

                <!-- Error Toast -->
                <div id="toastError" class="toast align-items-center text-bg-danger border-0" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">Something went wrong!</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>

            <!-- ✅ JS -->
            <script>
                function togglePassword(fieldId, btn) {
                    let field = document.getElementById(fieldId);
                    if (field.type === "password") {
                        field.type = "text";
                        btn.innerText = "🙈";
                    } else {
                        field.type = "password";
                        btn.innerText = "👁";
                    }
                }

                document.getElementById("registerForm").addEventListener("submit", function (e) {
                    e.preventDefault();

                    let form = this;
                    let formData = new FormData(form);

                    fetch("register_user.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                // ✅ Close modal
                                let modalEl = document.querySelector('#showModal');
                                if (modalEl) {
                                    let modal = bootstrap.Modal.getInstance(modalEl);
                                    if (modal) modal.hide();
                                }

                                // ✅ Reset form
                                form.reset();

                                // ✅ Show success toast
                                let toastEl = document.getElementById("toastSuccess");
                                let toast = new bootstrap.Toast(toastEl, {
                                    delay: 5000
                                });
                                toast.show();
                            } else {
                                // ❌ Show error toast
                                let toastEl = document.getElementById("toastError");
                                toastEl.querySelector(".toast-body").innerText = data.message;
                                let toast = new bootstrap.Toast(toastEl, {
                                    delay: 5000
                                });
                                toast.show();
                            }
                        })
                        .catch(err => {
                            // ❌ Generic server error toast
                            let toastEl = document.getElementById("toastError");
                            toastEl.querySelector(".toast-body").innerText = "Server error!";
                            let toast = new bootstrap.Toast(toastEl, {
                                delay: 5000
                            });
                            toast.show();
                            console.error(err);
                        });
                });
            </script>



            <!-- Modal -->
            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548"
                                    style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you Sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record
                                        ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes,
                                    Delete It!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include 'includes/footer.php' ?>
</div>
<!-- end main content-->



<?php include 'includes/common-footer.php' ?>