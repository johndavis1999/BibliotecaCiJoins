<?= $cabecera ?>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearAutorModal">
        Crear nueva autor
    </button>

    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($autores):?>
                <?php foreach($autores as $autor):?>
                    <tr>
                        <td><?= $autor['id']; ?></td>
                        <td><?=  $autor['nombres']; ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-list"></i> Opciones
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal<?=$autor['id']?>"><i class="fas fa-edit"></i> Editar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$autor['id']?>"><i class="fas fa-trash-alt"></i> Borrar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- Modal Borrar -->
                    <div class="modal fade" id="deleteModal<?=$autor['id']?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Autor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Realmente desea eliminar al autor: <?= $autor['nombres'] ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <a type="button" href="<?=base_url('borrarAut/'.$autor['id']);?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Editar-->
                    <div class="modal fade" id="editModal<?=$autor['id']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel">Editar Autor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="card-title">Datos del autor</h5>
                                    <p class="card-text">
                                        <form method="post" action="<?=site_url('/actualizarAut')?>">
                                            <input type="hidden" value="<?=$autor['id']?>" name="id">
                                            <div class="form-group mb-3">
                                                <label for="nombres">Nombre:</label>
                                                <input id="nombres" value="<?= $autor['nombres'] ?>" class="form-control" type="text" name="nombres">
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
                <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
    
    <!-- Modal Crear Autor-->
    <div class="modal fade" id="crearAutorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del autor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Ingresar Datos del autor</h5>
                    <p class="card-text">
                        <form method="post" action="<?=site_url('/guardarAut')?>">
                            <div class="form-group mb-3">
                                <label for="nombres">Nombre:</label>
                                <input id="nombres" value="<?= old('nombres') ?>" class="form-control" type="text" name="nombres">
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