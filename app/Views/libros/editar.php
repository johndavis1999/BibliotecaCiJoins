<?= $cabecera ?>
    Editar informacion del libro
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar Datos del libro</h5>
            <p class="card-text">
                <form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$libro['id']?>">
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?=$libro['nombre']?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagen">Imagen:</label>
                        <br>
                        <img class="img-thumbnail" src="<?= base_url('/uploads/'.$libro['imagen']);?>" alt="portada_libro" width="100px">
                        <input id="imagen" class="form-control" type="file" name="imagen" value="<?=$libro['imagen']?>">
                    </div>
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a href="<?=base_url('listar')?>" class="btn btn-info">Cancelar</a>
                </form>
            </p>
        </div>
    </div>

<?= $pie ?>