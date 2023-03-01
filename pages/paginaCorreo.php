<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Investigación Aplicada</title>
   <style>
        h3 { text-decoration: underline; text-align: center }
        footer { position: absolute; bottom: 0; width:100%}
        input {background-color: #04AA6D; border: none; color: white; padding: 16px 32px; text-decoration: none; margin: 4px 2px; cursor: pointer;}
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-dark bg-dark">
        <div div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
        <h3>Invetigación Aplicada LIS</h3>
        </a>
        </div>
        </nav>
    </header>
    
    <?php //Esta sección se encargará de transformar la factura.xml en un pdf y lo guardará en la carpeta "factura"
    require '../vendor/autoload.php';

    //$html = file_get_contents("http://localhost/InvestigacionAplicadaLis_VF202313_MM200149/pages/datos.php");
    $html = '../pages/datos.php';

    use Dompdf\Dompdf;
    $rutaGuardado = '../factura/';
    $dompdf = new Dompdf();
    $dompdf->load_html(utf8_decode($html));
    $dompdf->render();
    //$dompdf->stream("factura.pdf", array('Attachment'=>'0')); //Para mostrar el pdf
    $pdf = $dompdf->output();
    file_put_contents($rutaGuardado."factura.pdf", $pdf);

    ?>

    <form action="mandarCorreo.php" method="post">

        <h2></h2>
        <div class="row p-5">
            <div class="mb-3">
                <label for="nombre" class="form-label">Ingrese su nombre:</label>
                <textarea class="form-control" id="nombre" name="nombre" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Ingrese su correo</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com">
            </div>
            <input type="submit" value="Enviar" name="enviar">

            <br><br>
            <h6>Si no encuentra su factura revise su bandeja de Spam</h6>

        </div>
    </form>


<br>
    <footer class="bg-dark text-center text-white">
        <br>
        <h4 class="page-header text-center">Velasco Flores, Luis Pablo VF202313</h4>
        <h4 class="page-header text-center">Montes Martinez, Adilson Arian MM200149</h4>
        <h4 class="page-header text-center">Portillo Mendoza, Edwin Alexis PM170926</h4>
        <h4 class="page-header text-center">Miranda López, Daniel Santos ML201799</h4>
        <br>
    </footer>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>