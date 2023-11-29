<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">ODP</span> Edit</h4>


    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">


                    <form method="POST" action="InfraController.php?aksi=edit&id=<?=$this->odpEdit['id']; ?>">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class=" mt-4 row">
                                        <label for="id_odc" class="col-sm-2 col-form-label">ID ODC</label>
                                        <div class="col-sm-10">
                                            <select required id="id_odc" name="id_odc" class="form-select">
                                               
                                                <?php foreach ($this->odcall->get() as $value): ?>
                                                <?php if($value['id'] == $this->odpEdit['id_odc'] ){ ?>
                                                    <option value="<?= $value['id'] ?> " selected><?= $value['nama'] ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                                                <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-4 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="nama" value="<?=$this->odpEdit['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="port" class="col-sm-2 col-form-label">Port</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="port" id="port" value="<?=$this->odpEdit['port']; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3 row">
                                        <label for="service" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select required id="status" name="status" class="form-select">
                                                <!--<option>--Pilih Status--</option>-->
                                                <option value="true" <?php if ($this->odpEdit['status'] == 'true') {echo "selected" ;} ?>>True</option>
                                                <option value="False" <?php if($this->odpEdit['status'] == 'false') {echo "selected" ;} ?>>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk me-lg-2"></i>Simpan</button>
                                        <a href="/Infra/ODP" type="button" class="btn btn-danger"><i class="fa fa-backward me-lg-2"></i>Batal</a>
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