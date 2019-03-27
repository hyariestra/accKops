<!-- data pelanggan ada di var $pelanggan -->

<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">

				<form action="pengaturan_submit" method="get" accept-charset="utf-8">
					<div class="box box-form-md">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Umum</h3>
          </div>
          <div class="box-body">
            
            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Tahun<span style ="color: red"> *</span></label>
              <div class="col-sm-8">
                <input type="text" name="tahun" class="form-control">
              </div>
            </div>
          </div>
        </div>
				</form>


			</div>

			<div class="box-footer">

				<a href="<?php echo base_url("admin/pengaturan/tambah") ?>" class="btn btn-primary">Tambah data</a>

				

			</div>

			

		</div>

		

	</div>

	

</div>