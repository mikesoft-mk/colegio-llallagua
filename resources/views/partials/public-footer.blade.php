<footer class="public-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4"><div class="footer-brand"><img src="{{ asset('theme/img/logo.png') }}" alt="Logotipo de la Unidad Educativa Llallagua"><div><h5>Unidad Educativa Llallagua</h5><p>Formamos estudiantes con valores, excelencia académica y compromiso con la sociedad.</p></div></div></div>
            <div class="col-sm-6 col-lg-3 mb-4"><h5>Enlaces rápidos</h5><ul class="list-unstyled"><li><a href="{{ route('inicio') }}">Inicio</a></li><li><a href="{{ route('comunicados') }}">Comunicados</a></li><li><a href="{{ route('publicaciones') }}">Publicaciones</a></li><li><a href="{{ route('calificaciones') }}">Calificaciones</a></li></ul></div>
            <div class="col-sm-6 col-lg-4 mb-4"><h5>Información de contacto</h5><ul class="list-unstyled footer-contact"><li><i class="fas fa-map-marker-alt"></i> Llallagua, Potosí</li><li><i class="fas fa-phone-alt"></i> +591 12345678</li><li><i class="fas fa-envelope"></i> secretaria@colegio.edu.bo</li></ul></div>
        </div>
        <div class="footer-bottom">© {{ date('Y') }} Unidad Educativa Llallagua. Todos los derechos reservados.</div>
    </div>
</footer>
