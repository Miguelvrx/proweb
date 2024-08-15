<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Discos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Otros estilos -->
</head>
<body>
    <?php include "Views/Templates/header.php"; ?>
    
    <div class="app-title">
        <div>
            <h1><i class="bi bi-music-note-list"></i> Discos</h1>
        </div>
    </div>
    <button class="btn btn-primary mb-2" type="button" data-bs-toggle="modal" data-bs-target="#nuevoDisco"><i class="fa fa-plus"></i></button>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-light mt-4 table-bordered table-hover dataTable no-footer" id="tblDisco">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Artista</th>
                                    <th>Genero</th>
                                    <th>Año de lanzamiento</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="nuevoDisco" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="title">Inscripción de Discos</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmDisco">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="hidden" id="id" name="id">
                                    <input id="titulo" class="form-control" type="text" name="titulo" required placeholder="Título del disco">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="artista">Artista</label>
                                    <input id="artista" class="form-control" type="text" name="artista" required placeholder="Artista del disco">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="genero">Género</label>
                                    <input id="genero" class="form-control" type="text" name="genero" required placeholder="Género del disco">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anio_lanzamiento">Año de Lanzamiento</label>
                                    <input id="anio_lanzamiento" class="form-control" type="text" name="anio_lanzamiento" required placeholder="Año de lanzamiento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio" required placeholder="Precio del disco">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input id="cantidad" class="form-control" type="text" name="cantidad" required placeholder="Cantidad de discos">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" onclick="registrarDisco(event)" id="btnAccion">Registrar</button>
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Volver</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "Views/Templates/footer.php"; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="http://localhost:82/proyecto/Assets/js/datatables.min.js"></script>
    <script src="http://localhost:82/proyecto/Assets/js/funciones.js"></script>
    <script>
          
    </script>
</body>
</html>
