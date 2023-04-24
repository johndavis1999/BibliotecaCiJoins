<?= $cabecera ?>
    Formulario de creacion
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar Datos del libro</h5>
            <p class="card-text">
                <form method="post" action="<?=site_url('/guardar')?>" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagen">Imagen:</label>
                        <input id="imagen" class="form-control" type="file" name="imagen">
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="<?=base_url('listar')?>" class="btn btn-info">Cancelar</a>
                </form>
            </p>
        </div>
    </div>

<?= $pie ?>