<!-- data pelanggan ada di var $pelanggan -->
<style type="text/css">
	.spanMargin{
		margin-right: 7px;
	
	}
	table, th, td{
		border: 1px solid #ddd !important;
	}
</style>
<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">




				<div style="margin-bottom: 20px" class="col-sm-3 col-sm-offset-9">
					<div class="input-group">
						<input placeholder="masukan pencarian..."  type="text" class="form-control" aria-label="...">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa fa-search"></span>
							</button>
						</div><!-- /btn-group -->
					</div><!-- /input-group -->
				</div>

				<table class="table table-striped table-bordered table-hover">
					<thead style="background-color: #ecf0f1">
						<tr>
							<th>Kode</th>
							<th>Nama</th>
							<th>Saldo Normal</th>
							<th>Saldo Normal</th>
						</tr>
					</thead>
					
					<tbody>
						<tr style="font-weight: bold">
							<td><span class="spanMargin glyphicon glyphicon-home"></span> 1</td>
							<td>ASET</td>
							<td style="text-align: center;">D</td>
							<td><button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</td>
						</tr>
						<tr style="font-weight: bold">
							<td><span style="margin-left: 20px;" class="spanMargin glyphicon glyphicon-folder-open"></span> 1.1</td>
							<td>ASET LANCAR</td>
							<td style="text-align: center;">D</td>
							<td><button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</td>
						</tr>
						<tr style="font-weight: bold">
							<td><span style="margin-left: 30px;" class="spanMargin glyphicon glyphicon-folder-open"></span> 1.1.1</td>
							<td>Kas Dan Setara Kas</td>
							<td style="text-align: center;">D</td>
							<td>
								<button buttontype="actionItems" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
								<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</td>
						</tr>
						<tr style="font-weight: bold">
							<td><span style="margin-left: 40px;" class="spanMargin glyphicon glyphicon-folder-open"></span> 1.1.1.01</td>
							<td>Kas</td>
							<td style="text-align: center;">D</td>
							<td>
								<button buttontype="actionItems" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
								<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
								<button buttontype="actionItems" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
							</td>
						</tr>
						<tr>
							<td><span style="margin-left: 50px;" class="spanMargin glyphicon glyphicon-folder-close"></span> 1.1.1.01.01</td>
							<td>Kas di Bendahara Penerimaan BLUD</td>
							<td style="text-align: center;">D</td>
							<td>
								<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</td>
						</tr>
						<tr>
							<td><span style="margin-left: 50px;" class="spanMargin glyphicon glyphicon-folder-close"></span> 1.1.1.01.02</td>
							<td>Kas di Bendahara Pengeluaran BLUD</td>
							<td style="text-align: center;">D</td>
							<td>
								<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</td>
						</tr>
					</tbody>
				</table>



			</div>



		</div>



	</div>
</div>