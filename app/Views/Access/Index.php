<html>
	<head>
		<title>Native MVC Example</title>
		<link rel="stylesheet" href="/task/assets/css/bootstrap.css" />
		<script type="text/javascript" src="/task/assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4"><h3>Login</h3>
					<form method="post" action="/task/?act=login">
					  <div class="form-group">
					    <label for="exampleInputNim">NIM</label>
					    <input type="text" class="form-control" id="username" name="username" placeholder="NIM">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputNama">Nama</label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="Nama">
					  </div>

					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				<div class="col-md-4">&nbsp;</div>
			</div>
		</div>
	</body>
</html>