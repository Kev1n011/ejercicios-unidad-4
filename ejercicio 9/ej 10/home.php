<?php
session_start();

$email = $_SESSION['username'];
$password = $_SESSION['password'];
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		.carta-botones {
			row-gap: 10px;
		}

		.cartas {
			margin-top: 100px;
		}

		.btn-agregar {
			float: right;
		}

		.bg-dark {
			position: sticky;
			top: 0;
		}
	</style>
</head>

<body>
	

	<div class="container-fluid min-vh-100 d-flex flex-column">

		<!-- nav -->
		<div class="row">
			<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Navbar scroll</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarScroll">
						<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
							style="--bs-scroll-height: 100px;">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Link</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
									aria-expanded="false">
									Link
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Another action</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" aria-disabled="true">Link</a>
							</li>
						</ul>
						<form class="d-flex" role="search">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Search</button>
						</form>
					</div>
				</div>
			</nav>
		</div>


		<div class="row ">

			<div class="col-lg-2 col-md-3 col-sm-4 g-0 d-none d-sm-block">
				<div class="d-flex flex-column min-vh-100 flex-shrink-0 text-white bg-dark">
					<a href="/"
						class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
						<svg class="bi me-2" width="40" height="32">
							<use xlink:href="#bootstrap"></use>
						</svg>
						<span class="fs-4">Sidebar</span>
					</a>
					<hr>
					<ul class="nav nav-pills flex-column mb-auto">
						<li class="nav-item">
							<a href="#" class="nav-link active" aria-current="page">
								<svg class="bi me-2" width="16" height="16">
									<use xlink:href="#home"></use>
								</svg>
								Home
							</a>
						</li>
						<li>
							<a href="#" class="nav-link text-white">
								<svg class="bi me-2" width="16" height="16">
									<use xlink:href="#speedometer2"></use>
								</svg>
								Dashboard
							</a>
						</li>
						<li>
							<a href="#" class="nav-link text-white">
								<svg class="bi me-2" width="16" height="16">
									<use xlink:href="#table"></use>
								</svg>
								Orders
							</a>
						</li>
						<li>
							<a href="#" class="nav-link text-white">
								<svg class="bi me-2" width="16" height="16">
									<use xlink:href="#grid"></use>
								</svg>
								Products
							</a>
						</li>
						<li>
							<a href="#" class="nav-link text-white">
								<svg class="bi me-2" width="16" height="16">
									<use xlink:href="#people-circle"></use>
								</svg>
								Customers
							</a>
						</li>
					</ul>
					<hr>
					<div class="dropdown">
						<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
							id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://github.com/mdo.png" alt="" width="32" height="32"
								class="rounded-circle me-2">
							<strong>mdo</strong>
						</a>
						<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
							<li><a class="dropdown-item" href="#">New project...</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Sign out</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col-lg-10 col-md-9 col-sm-8">

				<div class="main p-2">
					<h3>Nombre de usuario <?php echo $email ?></h3>
					<div class="btn-agregar">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#exampleModal">Agregar</button>

					</div>
					<div class="row cartas">
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="card" style="width: 18rem;">
								<img src="./producto.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Refresco</h5>
									<p class="card-text">Refresco de 600ml</p>
									<div class="row carta-botones">

										<div class="row">
											<div class="col-7">
												<a href="./producto.html" class="btn btn-primary">Ir al producto</a>
											</div>
											<div class="col-4">
												<button type="button" class="btn btn-danger">Eliminar</button>
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												<button type="button" class="btn btn-warning" data-bs-toggle="modal"
													data-bs-target="#exampleModal">Editar</button>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="card" style="width: 18rem;">
								<img src="./producto.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Refresco</h5>
									<p class="card-text">Refresco de 600ml</p>
									<div class="row carta-botones">

										<div class="row">
											<div class="col-7">
												<a href="./producto.html" class="btn btn-primary">Ir al producto</a>
											</div>
											<div class="col-4">
												<button type="button" class="btn btn-danger">Eliminar</button>
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												<button type="button" class="btn btn-warning" data-bs-toggle="modal"
													data-bs-target="#exampleModal">Editar</button>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="card" style="width: 18rem;">
								<img src="./producto.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Refresco</h5>
									<p class="card-text">Refresco de 600ml</p>
									<div class="row carta-botones">

										<div class="row">
											<div class="col-7">
												<a href="./producto.html" class="btn btn-primary">Ir al producto</a>
											</div>
											<div class="col-4">
												<button type="button" class="btn btn-danger">Eliminar</button>
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												<button type="button" class="btn btn-warning" data-bs-toggle="modal"
													data-bs-target="#exampleModal">Editar</button>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">
								<div id="emailHelp" class="form-text">We'll never share your email with anyone else.
								</div>
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1">
							</div>
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Check me out</label>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>
					</div>
				</div>
			</div>
		</div>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"></script>
		<script></script>
</body>

</html>