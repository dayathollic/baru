<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Subscriptions</span> Add</h4>
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">
                    <form method="POST" action="subsController.php?aksi=plus">
                        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="row mb-3 mt-4">
                                        <label class="col-sm-2 col-form-label" for="package">Package</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge ">
                                                <input type="number" id="package" class="form-control" name="package" id="package" aria-label="john.doe" aria-describedby="email2">
                                                <span class="input-group-text" id="mail2">Mbps</span>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="profile" class="col-sm-2 col-form-label">Profile</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" name="profile" id="profile">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="service" class="col-sm-2 col-form-label">Service</label>
                                            <div class="col-sm-10">
                                                <select required id="service" name="service" class="form-select">
                                                    <option selected>--Pilih Service--</option>
                                                    <option value="Broadband">Broadband</option>
                                                    <option value="Okehome">Okehome</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" name="amount" id="amount">
                                            </div>
                                        </div>


                                        <div class="col">
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                                <i class="fa-regular fa-floppy-disk me-lg-2"></i>
                                                Tambahkan
                                            </button>
                                            <a href="/subs/subs" type="button" class="btn btn-danger">
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