<html>
	<head>
		<title>Native MVC Example</title>
		<link rel="stylesheet" href="/trainingphp2/assets/css/bootstrap.css" />
		<script type="text/javascript" src="/trainingphp2/assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4"><h3>Login</h3>
					<form method="post" action="/trainingphp2/?act=login">
					  <div class="form-group">
					    <label for="exampleInputNim">Username</label>
					    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputNama">Password</label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
					  </div>

					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				<div class="col-md-4">&nbsp;</div>
			</div>
		</div>
	</body>
</html>