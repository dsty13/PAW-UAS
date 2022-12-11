<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ABG-SMANTAB | Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="guru/img/smantab.png">
	
  </head>
</head>
<body class="bg-gradient-success">
	<div class="container">
		<div class="row vh-100 align-items-center justify-content-center">
			<div class="col-sm-8 col-md-6 col-lg-4 bg-white rounded p-4 shadow">
				<div class="row justify-content-center mb-4">
					<img src="guru/img/smantab.png" class="w-50" alt="Logo SMANTAB">
				</div>
				<div class="text-center"><h5>SMAN 1 Tanjung Bumi</h5></div>
				<form action="cek_login.php" method="POST" class="row g-4">
					<div class="col-12">
						<label for="email">Email<span class="text-danger">*</span></label>
						<div class="input-group">
							<div class="input-group-text"><i class="bi bi-person-fill"></i></div>
							<input type="email" name="email" class="form-control" placeholder="Email">	
						</div>
					</div>
					<div class="col-12">
						<label for="email">Password<span class="text-danger">*</span></label>
						<div class="input-group">
							<div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
							<input type="password" name="password" class="form-control" placeholder="Password">	
						</div>	
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-success w-100">
							Login	
						</button>
					</div>
				</form>	
			</div>
			
		</div>
	</div>

	

</body>
</html>