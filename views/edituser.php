  <style>
    .button{
      float: right; 
    }
    
  </style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">User</span> Edit</h4>

    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">


                    <form method="POST" action="staffController.php?aksi=edit&id=<?=$this->userEdit['id']; ?>">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                
                                <div class="row g-3">
                                    <div class="mb-3 mt-4 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="nama" value="<?=$this->userEdit['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="username" id="username" value="<?=$this->userEdit['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="email" id="email" value="<?=$this->userEdit['email']; ?>">
                                        </div>
                                    </div>
                                    
                                    <!--<div class="row form-password-toggle mb-3">-->
                                    <!--    <label class="col-sm-2 col-form-label" for="password">Password</label>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--        <div class="input-group input-group-merge">-->
                                    <!--            <input type="password" id="password" name="password" class="form-control">-->
                                    <!--            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <div class="mb-3 row">
                                        <label for="permission" class="col-sm-2 col-form-label">Permission Level</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="permission" id="permission" value="<?=$this->userEdit['permission_levels']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="role" class="col-sm-2 col-form-label">role</label>
                                        <div class="col-sm-10">
                                            <input required type="test" class="form-control" name="role" id="role" value="<?=$this->userEdit['role']; ?>">
                                        </div>
                                    </div>


                                    <div class="col">
                                        <button type="submit" class="btn btn-primary me-lg-2">Simpan</button>
                                        <a href="/staff/user" type="button" class="btn btn-outline-danger me-lg-2">Batal</a>
                                        <div class="button"><a href="/staff/user/edit/change/<?=$this->userEdit['id']; ?>" type="button" class="btn btn-success">Ubah Password</a></div>
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


