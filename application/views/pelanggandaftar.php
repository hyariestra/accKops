<?php panggil_file("header.php") ?>
<?php if ($this->session->userdata("pelanggan")): ?>
	<br>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-2 col-md-8">


				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">SIMIBO MESSAGE</h2>
					</div>
					<div class="panel-body">
						Sorry,
						<p>
But, our records show that you have already registered under email <b><?php
 $sudah=$this->session->userdata("pelanggan"); 
 echo $sudah["email_pelanggan"];
 ?></b>

						</p>
					</div>
				</div>


			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
<?php endif ?>

<?php if (!$this->session->userdata("pelanggan")): ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			 <?php echo $this->session->userdata("pesan"); ?>
				<h2>Login Pelanggan</h2>
				<ul class="nav nav-pills" role="tablist">
				<li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Daftar</a></li>
					<li role="presentation"><a href="#deskripsi" aria-controls="deskripsi" role="tab" data-toggle="tab">Login</a></li>
				</ul>
				<br>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="detail">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email_pelanggan">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password_pelanggan">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama_pelanggan">
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="text" class="form-control" name="telepon_pelanggan">
							</div>
							<!-- <div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat_pelanggan"></textarea>
							</div> -->
							<button class="btn btn-primary" name="daftar">Daftar</button>
							<br>  
							<br>    
						</form>
						<?php echo $this->session->userdata("pesan"); ?>

					</div>
					<br>
					<div role="tabpanel" class="tab-pane" id="deskripsi">
						<form method="post" action="<?php echo base_url("Pelanggan/login") ?>">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email_pelanggan">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password_pelanggan">
							</div>

							<button type="submit" class="btn btn-primary" name="login">Login</button>

						</form>
					<?php endif ?>

					<br>
				</div>
			</div>

		</div>

	</div>
	
</div>
<?php panggil_file("footer.php") ?>