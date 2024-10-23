

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .imagen-icono {
            align-items: center;
        }

        .imagen-icono img {
            width: 50px;
            height: 50px;
        }

        .text-center img {
            margin-top: 20px;
            height: 70px;
            width: 70px;
        }
        .login-container{
            margin-top: 150px;
        }
        .imagen img {
            margin-top: 170px;
            
            width: 600px;
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="imagen">
                    <img src="/los-10-sonidos-principales-del-perro.jpg" alt="">

                </div>
                
               
            </div>




            <div class="col">
                <div class="login-container">
                    <div class="text-center">
                        <h1>Inicio de sesión</h1>
                    </div>
                    <div class="text-center">
                        <p class="text-justify">Inicie su sesión ingresando sus datos en cada uno de los campos</p>
                    </div>
                    
    
    
                    <div class="text-center">
                        <img src="/3276535.png" alt="">
    
                    </div>
                    <form method="POST" action="/auth/authController.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" value="enviar">Enviar</button>
                        </div>
                    </form>
                    

                </div>
              

            </div>

        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>