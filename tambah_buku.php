<!DOCTYPE html>
<html>
<head>
	<title>Tambah Buku</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
	<form action="actions/tambah.php" method="POST">
		<div class="form-group">
			<label for="judul">Judul Buku:</label>
			<input type="text" class="form-control" placeholder="Judul Buku" name="judul" id="judul" required="">
		</div>
		<div class="form-group">
			<label for="pengarang">Pengarang:</label>
			<input type="text" class="form-control" placeholder="Pengarang" name="pengarang" id="pengarang" required="">
		</div>
		<div class="form-group">
			<label for="penerbit">Penerbit:</label>
			<input type="text" class="form-control" placeholder="Penerbit" name="penerbit" id="penerbit" required="">
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tahun Terbit:</label>
			<input type="text" class="form-control" placeholder="Tahun Terbit" name="tahun_terbit" id="tahun_terbit" required="">
		</div>
		<button type="submit" class="btn btn-primary" name="add_book" id="add_book">Tambah Buku</button>
	</form>
	<a href="daftar_buku.php" class="btn btn-secondary mt-3">Kembali</a>
</div>

<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
