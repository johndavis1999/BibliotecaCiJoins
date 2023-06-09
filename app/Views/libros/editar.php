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
                        <label for="id_categoria">Categoria:</label>
                        <select id="id_categoria" class="form-control" name="id_categoria" required>
                            <option value="">Seleccione una categoria</option>
                            <?php if($categorias):?>
                                <?php foreach($categorias as $cat):?>
                                    <option value="<?=$cat['id']?>" <?php if($cat['id'] == $libro['id_categoria']) echo 'selected'; ?>>
                                        <?= $cat['descripcion'] ?>
                                    </option>
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
                                    <option value="<?=$autor['id']?>" <?php if($autor['id'] == $libro['id_autor']) echo 'selected'; ?>>
                                        <?= $autor['nombres'] ?>
                                    </option>
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
                                    <option value="<?=$editorial['id']?>" <?php if($editorial['id'] == $libro['id_editorial']) echo 'selected'; ?>>
                                        <?= $editorial['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
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