<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">ODP</span> Add</h4>


    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">


                    <form method="POST" action="InfraController.php?aksi=tambah">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class=" mt-4 row">
                                        <label for="id_odc" class="col-sm-2 col-form-label">ID ODC</label>
                                        <div class="col-sm-10">
                                        <select required id="id_odc" name="id_odc" class="form-select">
                                            <option>--Pilih ODC--</option>
                                            <?php foreach ($this->odcall->get() as $value): ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-4 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" name="nama" id="nama" placeholder="John Doe">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="port" class="col-sm-2 col-form-label">Port</label>
                                        <div class="col-sm-10">
                                            <input required type="number" class="form-control" name="port" id="port">
                                        </div>
                                    </div>
                                    
                                     <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 form-label">Status</label>
                                        <div class="col-sm-10">
                                        <select required id="status" name="status" class="form-select">
                                            <option>--Pilih status--</option>
                                            <option value="True" align="center">True</option>
                                            <option value="False" align="center">False</option>
                                        </select>
                                        </div>
                                     </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-regular fa-floppy-disk me-lg-2"></i>
                                            Tambahkan
                                        </button>
                                        <a href="/Infra/ODP" type="button" class="btn btn-danger">
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