
<html>
<head>
	<title>Report</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card mt-5">
				<div class="card-body">
					<h1>Cetak Laporan Nilai</h1>

					<form action="ReportPDF/hsk" method="POST">
					<div class="row mb-3 align-items-center">
						<div class="col-3">
							<label class="col-form-label">Matakuliah</label>
						</div>
						<div class="col-9">
							<select class="form-select" name="vKDMATKUL">
								<option value=''>kode  -  namamatakuliah</option>
								<?php 
									foreach($mtk as $content){
										echo "<option value='$content[0]'>$content[0] - $content[1]</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row mb-3 align-items-center">
						<div class="col-3">
							<label class="col-form-label">Output</label>
						</div>
						<div class="col-9">
							<button type="button" class="btn btn-sm btn-pdf active btn-outline-danger">
								<i class="fa fa-file-pdf-o"></i> PDF
							</button>

							<button type="button" class="btn ms-3 btn-sm btn-excel btn-outline-success">
								<i class="fa fa-file-excel-o"></i> XLS
							</button>
						</div>
					</div>

					<div class="row mb-3 align-items-center">
						<div class="col-3">
						</div>
						<div class="col-9">
							<button type="submit" class="btn btn-cetak btn-success btn-lg">
								<i class="fa fa-print"></i> Cetak
							</button>
						</div>
					</div>

					</form>
				</div>
			</div>	

		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.0.js"></script>

<script>
	$(()=>{
		$('.btn-pdf').click(function(){
			$(this).addClass('active');
			$('form').attr('action', 'ReportPDF/hsk');
			$('.btn-excel').removeClass('active');
		})

		$('.btn-excel').click(function(){
			$(this).addClass('active');
			$('form').attr('action', 'ReportXLS/hsk');
			$('.btn-pdf').removeClass('active');
		})
	})
</script>
</body>
	
</html>
