<?= $cabecera ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Crear nueva categoria
</button>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Descripcion</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php if($categorias):?>
        <?php foreach($categorias as $cat):?>
            <tr>
                <td><?= $cat['id'];?></td>
                <td><?= $cat['descripcion'];?></td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?=$cat['id']?>">Editar</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$cat['id']?>">Borrar</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <!-- Modal Borrar -->
            <div class="modal fade" id="deleteModal<?=$cat['id']?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Realmente desea eliminar la categoria de <?= $cat['descripcion'] ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a type="button" href="<?=base_url('borrarCat/'.$cat['id']);?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Editar-->
            <div class="modal fade" id="editModal<?=$cat['id']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Editar categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title">Datos de la categoria</h5>
                            <p class="card-text">
                                <form method="post" action="<?=site_url('/actualizarCat')?>">
                                    <input type="hidden" value="<?=$cat['id']?>" name="id">
                                    <div class="form-group mb-3">
                                        <label for="descripcion">Descripcion:</label>
                                        <input id="descripcion" value="<?= $cat['descripcion'] ?>" class="form-control" type="text" name="descripcion">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<!-- Modal Crear-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="card-title">Ingresar Datos de la categoria</h5>
                <p class="card-text">
                    <form method="post" action="<?=site_url('/guardarCat')?>">
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripcion:</label>
                            <input id="descripcion" value="<?= old('descripcion') ?>" class="form-control" type="text" name="descripcion">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>


<?= $pie ?>