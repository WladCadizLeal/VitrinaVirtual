<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo site_url('resources/css/style.css'); ?>">
    <title>Mall Virtual</title>
</head>

<body>
    
    <div class="login-page">
        <div class="form">
            <form action="<?php echo base_url();?>Login/login" class="login-form" method="post">
                <input type="text" name="correo" value="<?php echo $this->input->post('correo'); ?>" placeholder="Ingrese su Correo"/>
                <input type="password" name="contrasena" value="<?php echo $this->input->post('contrasena'); ?>" placeholder="Ingrese su Contraseña"/>
                <button type="submit" class="btn btn-success" name="login">
                    <i class="fa fa-check"></i>LOGIN
                </button>
            </form>
        </div>
    </div>
    <script src="<?php echo site_url('resources/js/script.js'); ?>"></script>
</body>

</html>