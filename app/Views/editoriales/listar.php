<?= $cabecera ?>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editorialModal">
        Crear nueva editorial
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
        <?php if($editoriales):?>
            <?php foreach($editoriales as $editorial):?>
                <tr>
                    <td><?= $editorial['id'];?></td>
                    <td><?= $editorial['nombre'];?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-list"></i> Opciones
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal<?=$editorial['id']?>"><i class="fas fa-edit"></i> Editar</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$editorial['id']?>"><i class="fas fa-trash-alt"></i> Borrar</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!-- Modal Borrar -->
                <div class="modal fade" id="deleteModal<?=$editorial['id']?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar editorial</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Realmente desea eliminar la editorial de <strong><?= $editorial['nombre'] ?></strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <a type="button" href="<?=base_url('borrarEdit/'.$editorial['id']);?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Editar-->
                <div class="modal fade" id="editModal<?=$editorial['id']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Editar editorial</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="card-title">Datos de la editorial</h5>
                                <p class="card-text">
                                    <form method="post" action="<?=site_url('/actualizarEdit')?>">
                                        <input type="hidden" value="<?=$editorial['id']?>" name="id">
                                        <div class="form-group mb-3">
                                            <label for="descripcion">Nombre:</label>
                                            <input id="descripcionnombre" value="<?= $editorial['nombre'] ?>" class="form-control" type="text" name="nombre">
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
    <div class="modal fade" id="editorialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la editorial</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Ingresar Datos de la editorial</h5>
                    <p class="card-text">
                        <form method="post" action="<?=site_url('/guardarEdit')?>">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre:</label>
                                <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
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