<?= $cabecera ?>
<a href="<?= base_url('crear')?>">Crear un libro nuevo</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
    <?php if($libros):?>
        <?php foreach($libros as $lib):?>
            <tr>
                <td><?= $lib['id'];?></td>
                <td><?= $lib['nombre'];?></td>
                <td><img src="<?= base_url('/uploads/'.$lib['imagen']);?>" alt="" width="100px"></td>
                <td>Editar/
                    <a href="<?=base_url('borrar/'.$lib['id']);?>" class="btn btn-danger" type="button">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<?= $pie ?>