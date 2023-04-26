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
                        <label for="id_categoria">Categoria:</label>
                        <select id="id_categoria" class="form-control" name="id_categoria" required>
                            <option value="">Seleccione una categoria</option>
                            <?php if($categorias):?>
                                <?php foreach($categorias as $cat):?>
                                    <option value="<?=$cat['id']?>"><?= $cat['descripcion'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_autor">Autor:</label>
                        <select id="id_autor" class="form-control" name="id_autor" required>
                            <option value="">Seleccione al autor</option>
                            <?php if($autores):?>
                                <?php foreach($autores as $autor):?>
                                    <option value="<?=$autor['id']?>"><?= $autor['nombres'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_editorial">Editorial:</label>
                        <select id="id_editorial" class="form-control" name="id_editorial" required>
                            <option value="">Seleccione la editorial</option>
                            <?php if($editoriales):?>
                                <?php foreach($editoriales as $editorial):?>
                                    <option value="<?=$editorial['id']?>"><?= $editorial['nombre'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagen">Imagen:</label>
                        <input id="imagen" class="form-control" type="file" name="imagen">
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="<?=base_url('listar')?>" class="btn btn-secondary">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
<?= $pie ?>