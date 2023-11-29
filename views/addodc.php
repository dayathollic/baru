<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">ODC</span> Add</h4>

    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">
                    <form method="POST" action="InfraController.php?aksi=plus">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6 cek">
                                        <label for="id_olt" class="col-sm-2 col-form-label">ID OLT</label>
                                        <select required id="id_olt" name="id_olt" class="form-select">
                                            <option>--Pilih OLT--</option>
                                            <?php foreach ($this->oltall->get() as $value): ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="col-md-6 cek">
                                        <label for="nama" class="col-form-label">Nama</label>
                                        <input required type="text" class="form-control" name="nama" id="nama" placeholder="John Doe">
                                    </div>
                                   
                                    <div class="col-md-6 cek">
                                        <label for="port" class="col-sm-2 col-form-label">Port</label>
                                        <input required type="number" class="form-control" name="port" id="port">
                                    </div>

                                    <div class="col-md-6 cek">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <select required id="status" name="status" class="form-select">
                                            <option>--Pilih status--</option>
                                            <option value="True" >True</option>
                                            <option value="False" >False</option>
                                        </select>
                                    </div>

                                    <label class="form-check-label mt-4"><strong>Koordinat Customer</strong></label>
                                    <div class="col-md-6 cek">
                                        <label class="form-label" for="collapsible-pincode">Latitude</label>
                                        <input type="text" name="lat" id="latitude" class="form-control" />
                                </div>
                                <div class="col-md-6 cek">
                                    <label class="form-label" for="collapsible-pincode">Longitude</label>
                                    <input type="text" name="lng" id="longitude" class="form-control" />
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
                                <button type="submit" class="btn btn-primary"> <i class="fa-regular fa-floppy-disk me-lg-2"></i>
                                    Tambahkan</button>
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