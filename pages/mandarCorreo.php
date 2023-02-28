<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>E-Commerce</title>
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


    <?php   
    //Llamando a los archivos necesarios para PhpMailer
    require '../Phpmailer/Exception.php';
    require '../Phpmailer/PHPMailer.php';
    require '../Phpmailer/SMTP.php';

    //Usando clases de los archivos Phpmailer y Exception
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['enviar'])){

        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        //$archivo = file_get_contents("http://localhost/FuncionalidadXML-PDF-Correo/factura/factura.pdf");
        $archivo ='C:\wamp64\www\InvestigacionAplicadaLis_VF202313_MM200149\factura\factura.pdf';

        try {
        
            $mail = new PHPMailer(true);
            $mail->IsSMTP(); // Using SMTP.
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug = 0; // Enables SMTP debug information - SHOULD NOT be active on production servers!
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = 'true'; // Enables SMTP authentication.
            $mail->Host = "smtp.gmail.com"; // SMTP server host.
            $mail->Port = 587; // Setting the SMTP port for the GMAIL server.

            //Usuario con contraseña autorizada por gmail
            $mail->Username = "investigacion.lis1234@gmail.com"; // SMTP account username (GMail email address).
            $mail->Password = 'btpmstcgqkgpddfk'; // Contraseña creada a partir de google, para permisos de aplicacion
        
            //Envio de mensaje
            $mail->SetFrom('investigacion.lis1234@gmail.com', 'Factura de su respectiva compra'); // De quien - match the GMail email.
            $mail->AddAddress($correo, 'Someone Else'); // Para email / name.

            //Mensaje
            $mail->Subject = 'Factura de compra';
            $mail->Body = 'Hola ' .$nombre . ' a continuación está su respectiva factura, gracias por su compra! Esperamos su regreso, pase un feliz día';
            //mensaje con archivo, direccion del archivo
            $mail->addAttachment($archivo); 
        
            //Para enviar
            $mail->send();
            header('location:../index.php');

        } 
        catch (Exception $e) {
        //echo "No funciona: {$mail->ErrorInfo}";
        ?> 
            <div class="row p-5">
                <div class="mb-3">
                    <center><label class="form-label">Debes de ingresar un correo válido</label><br></center>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <a class="btn btn-primary" href="../pages/paginaCorreo.php" role="button">Regresar</a>
                </div>

            </div>
        <?php
        }
    }
    else{
    echo ('no se puede');
    }

    ?>

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