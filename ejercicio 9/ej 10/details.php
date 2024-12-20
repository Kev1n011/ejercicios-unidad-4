<?php
include('./detalle_producto.php');


//print_r(value: $_SESSION['test']);
$productsController = new ProductController();

$producto =$productsController->detalle_producto();
$tags = [];
foreach ($producto['tags'] as $key => $value) {
    //print_r($value['name']);
    $tags[] = $value['name'];
}



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
        .separar-item {
            margin-top: 50px;
        }
        .etiquetas {
            gap: 10px;
            
        }
        .btn-ir{
            margin-top: 30px;
        }
        .carousel img{
            height: 250px;
            width: 230px;
        }
    </style>
</head>

<body>


    <div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="d-flex"></div>

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

        <!-- sidebar & content -->
        <div class="row ">


            <div class="col-lg-2 col-md-3 col-sm-4 g-0 d-none d-sm-block">
                <div class="d-flex flex-column min-vh-100 flex-shrink-0 p-3 text-white bg-dark ">
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

                    <div class="row">

                        <div class="card">
                            <h5 class="card-header">Detalles del producto</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-5">
                                    <div id="carouselExampleControlsNoTouching" class="carousel slide"
                                        data-bs-touch="false">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="<?php echo $producto['cover'] ?>" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./producto.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./producto.jpg" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['name'] ?></h5>
                                        <p class="card-text"><?php echo $producto['description'] ?></p>
                                        <div class></div>
                                        <div class="etiquetas d-flex">
                                            <?php
                                                if (isset($producto['brand']['name'])) {
                                                    echo '<button type="button" class="btn btn-success btn-sm">'.$producto['brand']['name'].'</button>';
                                                }
                                            ?>
                                            
                                            <?php
                                            foreach ($tags as $value) {
                                                echo ' <button type="button" class="btn btn-danger">
                                                      ' . $value . '
                                                </button>';
                                            }
                                            ?>

                                        </div>
                                        <div class="btn-ir">
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                       
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>



                    <div class="row separar-item">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
            <script>
                $('.carousel').carousel({
                    interval: 2000
                })
            </script>
</body>

</html>