<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">USER</span> Add</h4>


    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">


                    <form method="POST" action="staffController.php?aksi=tambah">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="mb-3 mt-4 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="name" placeholder="John Doe">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="username" id="username">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="email" id="email" placeholder=".....@oke.net.id">
                                        </div>
                                    </div>

                                    <div class="row form-password-toggle mb-3">
                                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="············" aria-describedby="multicol-password2">
                                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="level" class="col-sm-2 col-form-label">Permisson_level</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="level" id="level">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="role" class="col-sm-2 col-form-label">role</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="role" id="role">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-regular fa-floppy-disk me-lg-2"></i>
                                            Tambahkan
                                        </button>
                                        <a href="/staff/user" type="button" class="btn btn-danger">
                                            <i class="fa fa-backward me-lg-2"></i>Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>