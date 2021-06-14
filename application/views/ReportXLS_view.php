
<html>
<head>
	<title>Report</title>
</head>
<body>
<h1>Cetak HSK</h1>

<?php echo form_open('ReportXLS/hsk'); ?>
	NIM <select name='vNIM'>
	<?php 
	foreach($mhs as $content){
		echo "<option value='$content[0]'>$content[0] - $content[1]</option>";
	}
	?>
	</select>
	<input type="submit" value="cetak" />
</form>
</body>
	
</html>
