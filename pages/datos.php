<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>E-Commerce</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
        <div div class="container-fluid">
            <br>
            <br>
        </div>
    </header>
    <div class="container">
    <br><br>
    <div class="alert alert-dark" role="alert">
    <h1 class="page-header text-center">Factura</h1>
    </div>
        <div class="row">
            <div class="col-sm-20 col-sm-offset-2"> 
                <div class="row p-2">
                    <!-- Columna carrito -->
                    <center><h3>Carrito</h3></center>
                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <th><center>Codigo</center></th>
                            <th><center>Nombre</center></th>
                            <th><center>Marca</center></th>
                            <th><center>Descripcion</center></th>
                            <th><center>Precio</center></th>
                            <th><center>Unidades</center></th>
                            <th><center>Cantidad</center></th>
                        </thead>
                        <tbody>
                        <?php

                            $sumPrecio=0;
                            $precioF;
                            //Abrimos donde están todos los productos guardados
                            $productos = simplexml_load_file('../data/factura.xml');
                            foreach ($productos->Producto as $producto) {  //producto es cada uno de los productos que se han guardado

                            $sumPrecio+=$producto->Precio*$producto->Cantidad;
            
                        ?>
                        <tr>
                            <td><?=$producto->Codigo?></td>
                            <td><?=$producto->Nombre?></td>
                            <td><?=$producto->Marca?></td>
                            <td><?=$producto->Descripcion?></td>
                            <td><?=$producto->Precio?>$</td>
                            <td><?=$producto->Unidades?></td>
                            <td><?=$producto->Cantidad?></td>
                        </tr>
                        <?php
                        } //Cerramos el foreach anterior
                        ?>
                        </tbody>
                    </table>
                    <h3>Total a pagar: <?=$sumPrecio?>$</h3>
                    <center><h3>Muchas gracias por su compra, lo esperamos pronto!</h3></center>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>