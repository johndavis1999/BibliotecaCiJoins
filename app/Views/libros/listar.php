<?= $cabecera ?>
<a class="btn btn-success" href="<?= base_url('crear')?>">Crear un libro nuevo</a>
<br>
<br>
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
                <td><img class="img-thumbnail" src="<?= base_url('/uploads/'.$lib['imagen']);?>" alt="portada_libro" width="100px"></td>
                <td>
                    <a href="<?=base_url('editar/'.$lib['id']);?>" class="btn btn-primary" type="button">Editar</a>
                    <a href="<?=base_url('borrar/'.$lib['id']);?>" class="btn btn-danger" type="button">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<?= $pie ?>