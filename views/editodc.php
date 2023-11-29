<div class="container-xxl flex-grow-1 container-p-y">
     <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">ODC</span> Edit</h4>

    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">
                    <form method="POST" action="InfraController.php?aksi=ubah&id=<?=$this->odcUbah['id']; ?>">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                     <div class="mt-4 row">
                                        <label for="id_olt" class="col-sm-2 col-form-label">ID OLT</label>
                                        <div class="col-sm-10">
                                            <select required id="id_olt" name="id_olt" class="form-select">
                                                
                                                <?php foreach ($this->oltall->get() as $value): ?>
                                                <?php  
                                                if($value['id'] == $this->odcUbah['id_olt'] ){
                                                ?>
                                                    <option value="<?= $value['id'] ?>" selected><?= $value['nama'] ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                                                <?php }  ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3 mt-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="nama" value="<?= $this->odcUbah['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="port" class="col-sm-2 col-form-label">Port</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="port" id="port" value="<?= $this->odcUbah['port'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select required id="status" name="status" class="form-select">
                                                
                                                <option value="true" <?php if($this->odcUbah['status'] == 'true') {echo "selected"; } ?> >True</option>
                                                <option value="False" <?php if($this->odcUbah['status'] == 'false') {echo "selected"; } ?>>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-check-label">Koordinat Customer</label>
                                    <div class="col-md-6 cek">
                                        <label class="form-label" for="collapsible-pincode">Latitude</label>
                                        <input type="text" name="latitude" id="lat" class="form-control"  value="<?= $this->odcUbah['lat'] ?>"/>
                                    </div>
                                    <div class="col-md-6 cek">
                                        <label class="form-label" for="collapsible-pincode">Longitude</label>
                                        <input type="text" name="longitude" id="lng" class="form-control" value="<?= $this->odcUbah['lng'] ?>" />
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card text-center h-px-300 ">
                                                    <div class="card-body p-0 rounded-1">
                                                        <div id="map" class="rounded-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary"> <i class="fa-regular fa-floppy-disk me-lg-2"></i>Simpan</button>
                                        <a href="/Infra/ODC" type="button" class="btn btn-danger"> <i class="fa fa-backward me-lg-2"></i>Batal</a>
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