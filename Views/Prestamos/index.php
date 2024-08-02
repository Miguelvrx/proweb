<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php include "Views/Templates/header.php"; ?>
<div class="app-title">
    <div>
        <h1><i class="bi bi-journal-bookmark-fill"></i> Préstamos</h1>
    </div>
</div>
<button class="btn btn-primary mb-2" onclick="frmPrestar()"><i class="fa fa-plus"></i></button>
<div class="tile">
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped mt-4" id="tblPrestar">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Libro</th>
                        <th>Estudiante</th>
                        <th>Fecha de préstamo</th>
                        <th>Fecha de regreso</th>
                        <th>En cuanto a.</th>
                        <th>observacion</th>
                        <th>Situación</th>
                        <th>Reportes</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="prestar" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Libro prestado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmPrestar" onsubmit="registroPrestamos(event)">
                    <div class="form-group">
                        <label for="libro">Libro</label><br>
                        <select id="libro" class="form-control libro" name="libro" onchange="verificarLibro()" required style="width: 100%;">

                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="estudiante">Estudiante</label><br>
                                <select name="estudiante" id="estudiante" class="form-control estudiante" required style="width: 100%;">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cantidad">En cuanto a.</label>
                                <input id="cantidad" class="form-control" min="1" type="number" name="cantidad" min="1" required onkeyup="verificarLibro()">
                                <strong id="msg_error"></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_prestamo">Fecha de préstamo</label>
                                <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" value="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_devolucion">Fecha de regreso</label>
                                <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" value="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observación</label>
                        <textarea id="observacion" class="form-control" placeholder="Observación" name="observacion" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" id="btnAccion">Prestar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>