<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/css/font-awesome.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Bilbioteca pro</title>
</head>

<body>
    <!-- Sección de fondo medio-material -->
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <!-- Sección de contenido del login -->
    <section class="login-content">
        <!-- Logo y bienvenida -->
        <div class="logo">
            <h1>Bienvenido</h1>
        </div>
        <!-- Caja del login -->
        <div class="login-box">
            <!-- Formulario del login -->
            <form class="login-form" id="frmLogin" onsubmit="frmLogin(event);">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sensión</h3>
                <!-- Campo de usuario -->
                <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control" type="text" placeholder="Usuário" id="usuario" name="usuario" autofocus required>
                </div>
                <!-- Campo de contraseña -->
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password" placeholder="Password" id="clave" name="clave" required>
                    <!-- Checkbox para mostrar/ocultar la contraseña -->
                    <label>
                        <input type="checkbox" id="mostrarContrasena"> Mostrar contraseña
                    </label>
                </div>
                <div class="input-container">
                    <div style="position: relative; margin-left: -1px; top: -15px;" class="g-recaptcha" data-sitekey=""></div>
                </div>
                <!-- Alerta de error (oculta por defecto) -->
                <div class="alert alert-danger d-none" role="alert" id="alerta"></div>
                <!-- Botón de login -->
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Scripts esenciales para el funcionamiento de la aplicación -->
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/main.js"></script>
    <!-- Plugin de javascript para mostrar la carga de la página en la parte superior -->
    <script src="<?php echo base_url; ?>Assets/js/pace.min.js"></script>
    <script>
        // Definir la variable base_url en JavaScript
        const base_url = '<?php echo base_url; ?>';
    </script>
    <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    <script type="text/javascript">
        // Control de la caja flip del login
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
    <script>
        // Mostrar/ocultar contraseña
        const inputContrasena = document.getElementById('clave');
        const checkMostrarContrasena = document.getElementById('mostrarContrasena');
        //Funcion que permite mostrar y ocultar la contrasena
        checkMostrarContrasena.addEventListener('change', function() {
            if (this.checked) {
                inputContrasena.type = 'text'; // Muestra la contraseña
            } else {
                inputContrasena.type = 'password'; // Oculta la contraseña
            }
        });
    </script>
</body>

</html>