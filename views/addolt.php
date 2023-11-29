<div class="container-xxl flex-grow-1 container-p-y">
            
<h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">OLT</span> Add</h4>


<!-- Collapsible Section -->
<div class="row my-4">
  <div class="col">
    <div class="accordion" id="collapsibleSection">
      <div class="card accordion-item">
          
          
        <form method="POST" action="logicController.php?aksi=tambah">
        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
          <div class="accordion-body">
            <div class="row g-3">
              <div class="mb-3 mt-4 row">
    		    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="nama" id="nama" placeholder="John Doe">
    		    </div>
    		  </div>
    		  <div class="mb-3 row">
    		    <label for="deskripsi" class="col-sm-2 col-form-label">Type</label>
    		    <div class="col-sm-10">
    		      <input required type="number" class="form-control" name="type" id="deskripsi" placeholder="ex : 658468">
    		    </div>
    		  </div>

    		  <div class="mb-3 row">
    		    <label for="host" class="col-sm-2 col-form-label">Merk</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="merk" id="host" placeholder=" ex : ZTE,Mikrotik">
    		    </div>
    		  </div>
    		  
    		  <div class="col">
		  		<button type="submit" class="btn btn-primary">
				<i class="fa-regular fa-floppy-disk me-lg-2"></i>
				Tambahkan
				</button>
				<a href="/logic/olt" type="button" class="btn btn-danger">
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

