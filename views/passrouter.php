<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Change</span> Password</h4>

    <!-- Collapsible Section -->
    <div class="row my-4">
        <div class="col">
            <div class="accordion" id="collapsibleSection">
                <div class="card accordion-item">
                    <form method="POST" action="logicController.php?aksi=change&id=<?=$this->routerEdit['id']; ?>">
                        <div class="accordion-body">
                            <div class="row g-3">
                                <?php
                                if ($this->session->get('notif_alert_berhasil')) {
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                        <h6 class="alert-heading mb-1">berhasil</h6>
                                        <span><?php echo $this->session->get('notif_alert_berhasil') ?></span>
                                    </div>
                                    <?php
                                } elseif ($this->session->get('notif_alert_gagal')) {
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <h6 class="alert-heading mb-1">Gagal</h6>
                                        <span><?php echo $this->session->get('notif_alert_gagal') ?></span>
                                    </div>
                                    <?php
                                }

                                $this->session->remove('notif_alert_berhasil');
                                $this->session->remove('notif_alert_gagal');
                                ?>

                                <input type="hidden" name="username" value="<?=$this->routerEdit['id']; ?>">
                                <div class="col-md-7 form-password-toggle">
                                    <label for="oldpassword" class="form-label">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="oldpassword" name="oldpassword" class="form-control" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-7 form-password-toggle">
                                    <label for="new" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="new" name="new" class="form-control" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        <!--<input type="password" id="confir" name="confirm" class="form-control" pattern="^(?=.*[A-Z])(?=.*\d).{8,}$" title="Kata sandi harus memiliki setidaknya satu huruf kapital, satu angka, dan minimal 8 karakter." required ><span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>-->
                                    </div>
                                </div>
                                <div class="col-md-7 form-password-toggle">
                                    <label for="confirm" class="form-label">Confirm New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="confirm" name="confirm" class="form-control" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-outline-warning" onclick="goBack()">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</div>


