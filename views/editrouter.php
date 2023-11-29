 <style>
    .button{
      float: right; 
    }
    
  </style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">ROUTER</span> Edit</h4>
    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">
                    <form method="POST" action="logicController.php?aksi=update&id=<?=$this->routerEdit['id']; ?>">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="mb-3 mt-4 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="nama" value="<?=$this->routerEdit['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="deskripsi" id="type" value="<?=$this->routerEdit['description']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="host" class="col-sm-2 col-form-label">Host</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="host" id="host" value="<?=$this->routerEdit['host']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="username" id="username" value="<?=$this->routerEdit['username']; ?>">
                                        </div>
                                    </div>
                                    <!--<div class="row form-password-toggle mb-3">-->
                                    <!--    <label class="col-sm-2 col-form-label" for="password">Password Baru</label>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--        <div class="input-group input-group-merge">-->
                                    <!--            <input type="password" id="password" name="password" class="form-control" placeholder="············" aria-describedby="multicol-password2">-->
                                    <!--            <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <div class="mb-3 row">
                                        <label for="port" class="col-sm-2 col-form-label">Port</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="port" id="port" value="<?=$this->routerEdit['port']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="service" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select required id="status" name="status" class="form-select">
                                                <option value="True" <?php if ($this->routerEdit['status'] == 'true') { echo "selected"; } ?>>True</option>
                                                <option value="False" <?php if ($this->routerEdit['status'] == 'false') { echo "selected"; } ?>>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="/logic/router" type="button" class="btn btn-danger">Batal</a>
                                        <div class="button"><a href="/logic/router/edit/passrouter/<?=$this->routerEdit['id']; ?>" type="button" class="btn btn-success">Ubah Password</a></div> 
                                        
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
<i class="fa fa-backward me-lg-2"></i>
<i class="fa-regular fa-floppy-disk me-lg-2"></i>