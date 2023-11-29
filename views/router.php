<?php
if ($this->session->get('notif_berhasil')) {
    echo "<script>Swal.fire('Berhasil', '".$this->session->get('notif_berhasil')."', 'success'); </script>";
} elseif ($this->session->get('notif_gagal')) {
    echo "<script>Swal.fire('Gagal', '".$this->session->get('notif_gagal')."', 'error'); </script>";
}

$this->session->remove('notif_berhasil');
$this->session->remove('notif_gagal');
?>


<div class="container-xxl flex-grow-2 container-p-y">
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center row py-2 gap-3 gap-md-0">
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center flex-md-row flex-column ">
                    <a href="router/add" type="button" class="btn btn-primary mb-2"><i class="fa fa-plus me-lg-2"></i>Tambah Router</a>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-bordered align-middle  table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th><center>Nama</center></th>
                        <th><center>Deskripsi</center></th>
                        <th><center>Host</center></th>
                        <th><center>Username</center></th>
                        <th><center>Port</center></th>
                        <th>Status</th>
                        <th><center>Update</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    <?php $no = 1; ?>
                    <?php foreach ($this->routerall->GET() as $value): ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><strong><?= $value['name'] ?></strong></td>
                        <td><?= $value['description'] ?></td>
                        <td><?= $value['host'] ?></td>
                        <td><?= $value['username'] ?></td>
                        <td><?= $value['port'] ?></td>
                        <td><?= $value['status'] ?></td>
                        <td><?= $value['updated_at'] ?></td>
                        <td>
                            <a href="router/edit/<?php echo $value['id']; ?>" type="button" class="btn btn-success">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="router/delete/<?php echo $value['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('apakah anda yakin menhgapus data tersebut?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>