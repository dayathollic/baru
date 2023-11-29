<div class="container-xxl flex-grow-1 container-p-y">
            
<h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Anual</span> Edit</h4>


<!-- Collapsible Section -->
<div class="row my-4">
  <div class="col">
    <div class="accordion" id="collapsibleSection">
      <div class="card accordion-item">
          
          
        <form method="POST" action="subsController.php?aksi=update&id=<?=$this->anEdit['id'];?>">
        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
          <div class="accordion-body">
            <div class="row g-3">
              <div class="mb-3 mt-4 row">
    		    <label for="package" class="col-sm-2 col-form-label">Periode</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="periode" id="periode" value="<?=$this->anEdit['period_name'];?>">
    		    </div>
    		  </div>
    		  <div class="mb-3 row">
    		    <label for="profile" class="col-sm-2 col-form-label">Value</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="value" value="<?=$this->anEdit['value'];?>">
    		    </div>
    		  </div>
    		 
    		  <div class="col">
		  		<button type="submit" name="submit" value="submit" class="btn btn-primary">
				<i class="fa-regular fa-floppy-disk me-lg-2"></i>
				Simpan
				</button>
				<a href="/subs/anual" type="button" class="btn btn-danger">
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





