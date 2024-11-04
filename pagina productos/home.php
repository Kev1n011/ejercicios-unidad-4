<?php

include './auth/productController.php';
//print_r($arreglo[11]['name']);
$productsController = new ProductController();
$productos = $productsController->obtener_productos();

include './auth/brandController.php';
$brandsController = new BrandController();

$brands = $brandsController->obtenerMarcas();

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
			margin-top: 60px;
		}

		.card {
			margin-top: 40px;
			min-width: 330px;
		}

		.card img {
			height: 200px;
		}

		.card-body {
			min-height: 400px;

		}

		.carta-botones {
			position: absolute;
			bottom: 0;
			margin-bottom: 14px;
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
					<div class="btn-agregar">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#exampleModal">Agregar</button>

					</div>
					<div class="row cartas">
						<?php
						foreach ($productos as $valor) {

							echo '
								<div class="col-lg-4 col-md-6 col-sm-12">

								<div class="card" style="width: 18rem;">
								<img src= "' . $valor['cover'] . '" class="card-img-top" alt="...">
								<div class="card-body">


									<h5 class="card-title">' . $valor['name'] . '</h5>
									<p class="card-text">' . $valor['description'] . '</p>
									<div class="row carta-botones">

										<div class="row">
											<div class="col-8">
												
												 <form action="./details/'.$valor['slug'].'" method="GET">
													<button type="submit" class="btn btn-primary">Ir al producto</button>
												</form>
											</div>
											
											<div class="col-4">
												<form method="POST" id="eliminar_producto_' . $valor['id'] . '">
													 <input type="hidden" name="id_producto" value="' . $valor['id'] . '">
													 <input type="hidden" name="global_token" value='.$_SESSION['global_token'].'>	
													 <input type="hidden" name="borrar" value="borrar">
													<button onclick="abrir_sweet_alert(' . $valor['id'] . ')" type="button" class="btn btn-danger">Eliminar</button>

												</form>
												
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												<button type="button" class="btn btn-warning" data-bs-toggle="modal"
													data-bs-target="#exampleModal' . $valor['id'] . '">Editar</button>
											</div>
										</div>
									</div>
									 

								</div>
							</div>
								</div>
								';

						}

						$id_producto = $valor['id']

							?>



					</div>


				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Añadir producto</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="POST" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="nombre" class="form-label">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre">

							</div>
							<div class="mb-3">
								<label for="slug" class="form-label">Slug</label>
								<input type="text" class="form-control" id="slug" name="slug">
							</div>
							<div class="mb-3">
								<label for="descripcion" class="form-label">Descripción</label>
								<textarea name="descripcion" class="form-control" id="descripcion"
									name="descripcion"></textarea>
							</div>
							<div class="mb-3">
								<label for="features" class="form-label">Features</label>
								<input type="text" class="form-control" id="features" name="features">
							</div>
							<div class="mb-3">
								<select class="form-select" name="brand_dropdown" id="brand_dropdown" aria-label="Default select example">
									<?php
									foreach ($brands as $brand) {
										echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
									}
									?>
								</select>
							</div>
							<div class="mb-3">
								<label for="cover" class="form-label">Imagen</label>
								<input type="file" class="form-control" id="cover" name="cover">
							</div>
							<input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">	
							<input type="hidden" name="agregarProducto" value="agregarProducto">
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-bs-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary">Añadir producto</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<?php
		foreach ($productos as $valor) {
			echo '
			<div class="modal fade" id="exampleModal' . $valor['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Editar producto</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST">
								<div class="mb-3">
									<label for="nombre" class="form-label">Nombre</label>
									<input type="text" class="form-control" id="nombre" name="nombre" value="' . $valor['name'] . '"> 
								</div>
								<div class="mb-3">
									<label for="slug" class="form-label">Slug</label>
									<input type="text" class="form-control" id="slug" name="slug" value="' . $valor['slug'] . '">
								</div>
								<div class="mb-3">
									<label for="descripcion" class="form-label">Descripción</label>
									<textarea name="descripcion" class="form-control" id="descripcion">' . $valor['description'] . '</textarea>
								</div>
								<div class="mb-3">
									<label for="features" class="form-label">Features</label>
									<input type="text" class="form-control" id="features" name="features" value="' . $valor['features'] . '">
								</div>
								<div class="mb-3">
									<label for="brand_dropdown" class="form-label">Marca</label>
									<select class="form-select" name="brand_dropdown" id="brand_dropdown" aria-label="Default select example">';
									if($valor['brand_id']){
										echo '<option value="' . $valor['brand']['id'] . '">' . $valor['brand']['name'] . '</option>';
										foreach ($brands as $brand) {
											if($valor['brand']['id'] == $brand['id']){ //No repetir la marca dos veces
	
											}else{
												echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
											}
											
										}
									}else{
										echo '<option disabled selected value> -- Selecciona una marca </option>';
										foreach ($brands as $brand) {		
											echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
										
									}
									}
									
		
								echo '</select>
								</div>
								<input type="hidden" name="global_token" value='.$_SESSION['global_token'].'>	
								<input type="hidden" name="PUT" value="PUT">
								<input type="hidden" name="id_producto" value="' . $valor['id'] . '">
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Guardar cambios</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>';
		}

		$id_producto = $valor['id']

			?>



		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script>
			function abrir_sweet_alert(id) {
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
					.then((willDelete) => {
						if (willDelete) {
							swal("Poof! Your imaginary file has been deleted!", {
								icon: "success",

							}).then(() => {
								document.getElementById('eliminar_producto_' + id).submit();
							});

						} else {
							swal("Your imaginary file is safe!");
						}
					});


			}


		</script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"></script>
		
		
		<script>
			var e = document.getElementById("brand_dropdown");
			e.onchange = function () {
				var id_marca = e.options[e.selectedIndex].value; console.log('id marca: ', id_marca);
			}
		</script>
</body>

</html>