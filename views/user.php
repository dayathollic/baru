<?php
if ($this->session->get('notif_berhasil')) {
    echo "<script> Swal.fire('Berhasil', '".$this->session->get('notif_berhasil')."', 'success'); </script>";
} elseif ($this->session->get('notif_gagal')) {
    echo "<script> Swal.fire('Gagal', '".$this->session->get('notif_gagal')."', 'error'); </script>";
}

$this->session->remove('notif_berhasil');
$this->session->remove('notif_gagal');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center flex-md-row flex-column mb-3 mb-md-0">
                    <a href="user/add" type="button" class="btn btn-primary mb-2">
                        <i class="fa fa-plus me-lg-2"></i>
                        Tambah User
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Permission_Level</th>
                            <th>Role</th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        <?php foreach ($this->userall as $value): ?>
                        <tr>
                            <td><strong><?= $value['name'] ?></strong></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><center><?= $value['permission_levels'] ?></center></td>
                            <td><?= $value['role'] ?></td>
                            <td>
                                <a href="user/edit/<?php echo $value['id']; ?>" type="button" class="btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="user/hapus/<?php echo $value['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('apakah anda yakin menhgapus data tersebut?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>