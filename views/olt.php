<?php
    if($this->session->get('notif_berhasil')){
        echo "<script>Swal.fire('Berhasil', '".$this->session->get('notif_berhasil')."', 'success'); </script>";
    }elseif($this->session->get('notif_error')){
        echo "<script>Swal.fire('Oopss....', '".$this->session->get('notif_error')."', 'error'); </script>";
    }elseif($this->session->get('notif_gagal')){
        echo "<script>Swal.fire('Gagal', '".$this->session->get('notif_gagal')."', 'error'); </script>";
    }
    
    $this->session->remove('notif_berhasil');
    $this->session->remove('notif_gagal');
    $this->session->remove('notif_error');
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center flex-md-row flex-column mb-3 mb-md-0">
                    <a href="olt/addolt" type="button" class="btn btn-primary mb-2"><i class="fa fa-plus me-lg-2"></i>Tambah Olt</a>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table id="dt" class="table table-bordered align-middle table-hover">
                    <thead>
                        <tr>
                            <th class="col-1">No</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Merek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                      <?php   $no = 1; ?>
                        <?php foreach ($this->oltall->get() as $value): ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><strong><?= $value['nama'] ?></strong></td>
                            <td><?= $value['type'] ?></td>
                            <td><?= $value['merk'] ?></td>
                            <td>
                                <a href="olt/edit/<?php echo $value['id']; ?>" type="button" class="btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                 <a href="olt/delete/<?php echo $value['id']; ?>" type="button" class="btn btn-danger" id="myButton" onclick="return confirm ('apakah anda yakin menhgapus data tersebut?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!--<button id="myButton" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
                                
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        

                    </tbody>
                </table>
            </div>
        </div>
        

