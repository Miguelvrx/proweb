<!-- Modal para cambiar la contraseña -->
<div id="cambiarClave" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="my-modal-title">Cambiar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Formulario para cambiar la contraseña -->
            <form autocomplete="off" id="frmCambiarPass" onsubmit="modificarClave(event)">
                <div class="modal-body">
                    <!-- Campo para la contraseña actual -->
                    <div class="form-group">
                        <label for="clave_actual">Contraseña Actual</label>
                        <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña actual" required>
                    </div>
                    <!-- Campo para la nueva contraseña -->
                    <div class="form-group">
                        <label for="clave_nueva">Nueva Contraseña</label>
                        <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Contraseña nueva" required>
                    </div>
                    <!-- Campo para confirmar la nueva contraseña -->
                    <div class="form-group">
                        <label for="clave_confirmar">Confirmar Contraseña</label>
                        <input id="clave_confirmar" class="form-control" type="password" name="clave_confirmar" placeholder="Confirmar contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Botón para enviar el formulario -->
                    <button class="btn btn-primary" type="submit">Alterar</button>
                    <!-- Botón para cancelar y cerrar el modal -->
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Inclusión de las bibliotecas JavaScript esenciales -->
<script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/main.js"></script>

<!-- Plugin de JavaScript para mostrar la carga de la página en la parte superior -->
<script src="<?php echo base_url; ?>Assets/js/pace.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/chart.min.js" crossorigin="anonymous"></script>

<!-- Definición de la constante base_url -->
<script>
    const base_url = "<?php echo base_url; ?>";
</script>

<!-- Inclusión de bibliotecas adicionales -->
<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url; ?>Assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url; ?>Assets/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url; ?>Assets/js/datatables.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>

<!-- Script de Google Analytics -->
<script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>
</html>
