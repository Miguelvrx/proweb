<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Descripción de la página -->
    <meta name="description" content="Vali es un tema de administración responsivo y gratuito construido con Bootstrap 4, SASS y PUG.js. Es completamente personalizable y modular.">
    <!-- Meta para Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Meta Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Tema de administración gratuito con Bootstrap 4">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali es un tema de administración responsivo y gratuito construido con Bootstrap 4, SASS y PUG.js. Es completamente personalizable y modular.">
    <title>Panel Administrativo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS principal -->
    <link href="<?php echo base_url; ?>Assets/css/main.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/datatables.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet" />
    <!-- Iconos de fuente -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Barra de navegación -->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url; ?>Configuracion/admin">Sistema de Biblioteca</a>
        <!-- Botón para mostrar/ocultar la barra lateral -->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Ocultar barra lateral"></a>
        <!-- Menú derecho de la barra de navegación -->
        <ul class="app-nav">
            <!-- Menú desplegable para el perfil de usuario -->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Abrir menú de perfil"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#" id="modalPass"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Menú de la barra lateral -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url; ?>Assets/img/logo.png" alt="Imagen de usuario" width="50">
            <div>
                <p class="app-sidebar__user-name"><?php echo $_SESSION['nombre'] ?></p>
                <p class="app-sidebar__user-designation"><?php echo $_SESSION['usuario']; ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="<?php echo base_url; ?>Prestamos"><i class="app-menu__icon fa fa-hourglass-start"></i><span class="app-menu__label">Préstamos</span></a></li>
            <li><a class="app-menu__item" href="<?php echo base_url; ?>Estudiantes"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Estudiantes</span></a></li>
            <li><a class="app-menu__item" href="<?php echo base_url; ?>Materia"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Materias</span></a></li>
            <li><a class="app-menu__item" href="<?php echo base_url; ?>Disco"><i class="app-menu__icon bi-music-note-list"></i><span class="app-menu__label">Disco</span></a></li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Libros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?php echo base_url; ?>Autor"><i class="icon fa fa-address-book-o"></i>Autores</a></li>
                    <li><a class="treeview-item" href="<?php echo base_url; ?>Editorial"><i class="icon fa fa-tags"></i>Editor</a></li>
                    <li><a class="treeview-item" href="<?php echo base_url; ?>Libros"><i class="icon fa fa-book"></i>Libros</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-wrench"></i><span class="app-menu__label">Administración</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?php echo base_url; ?>Usuarios"><i class="icon fa fa-user-o"></i>Usuarios</a></li>
                    <li><a class="treeview-item" href="<?php echo base_url; ?>Configuracion"><i class="icon fa fa-cogs"></i>Configuración</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Informes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" target="_blank" href="<?php echo base_url; ?>Prestamos/pdf"><i class="icon fa fa-file-pdf-o"></i>Libros prestados</a></li>
                </ul>
            </li>
        </ul>
    </aside>
    <main class="app-content">
    <!-- Contenido principal de la aplicación -->
