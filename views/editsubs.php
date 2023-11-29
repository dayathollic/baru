<div class="container-xxl flex-grow-1 container-p-y">
            
<h4 class="py-7 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Subscriptions</span> Edit</h4>


<!-- Collapsible Section -->
<div class="row my-4">
  <div class="col">
    <div class="accordion" id="collapsibleSection">
      <div class="card accordion-item">
        <form method="POST" action="subsController.php?aksi=edit&id=<?=$this->subsEdit['id'];?>">
        <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
          <div class="accordion-body">
            <div class="row g-3">
              <div class="mb-3 mt-4 row">
    		    <label for="package" class="col-sm-2 col-form-label">Package</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="package" id="package" value="<?=$this->subsEdit['package'];?>">
    		    </div>
    		  </div>
    		  <div class="mb-3 row">
    		    <label for="profile" class="col-sm-2 col-form-label">Profile</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="profile" value="<?=$this->subsEdit['profile'];?>">
    		    </div>
    		  </div>
    		  
    		  <div class="mb-3 row">
    		    <label for="service" class="col-sm-2 col-form-label">Service</label>
    		     <div class="col-sm-10">
    		    	<select required id="service" name="service" class="form-select">
    				  <option value="Broadband" <?php if ($this->subsEdit['service'] == 'broadband'){ echo "selected";} ?>>Broadband</option>
    				  <option value="Okehome" <?php if ($this->subsEdit['service'] == 'okehome'){ echo "selected";} ?>>Okehome</option>			  
    				</select>	      
    		     </div>
    		  </div>
    		  <div class="mb-3 row">
    		    <label for="amount" class="col-sm-2 col-form-label">Amount</label>
    		    <div class="col-sm-10">
    		      <input required type="text" class="form-control" name="amount" id="amount" value="<?=$this->subsEdit['amount'];?>" >
    		    </div>
    		  </div>
    		  
    		  
    		  <div class="col">
		  		<button type="submit" name="submit" value="submit" class="btn btn-primary">
				<i class="fa-regular fa-floppy-disk me-lg-2"></i>
				Simpan
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





