<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/3a4aea0e88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-3a4aea0e88" crossorigin="anonymous" />

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Biblioteca</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('listar')?>">Libros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('categorias')?>">Categorias</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('autores')?>">Autores</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('editoriales')?>">Editoriales</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">

    <!--
        Fragmento de codigo para mostrar errores de session('mensaje')
        <?php /*if(session('mensaje')){?>
        <div class="alert alert-danger" role="alert">
            <?php echo session('mensaje') ?>
        </div>
    <?php } */ ?> 
    -->
    
    <!-- Se reemplaza la forma anterior de mostrar errores por un modal -->
    <script>
        <?php if(session('mensaje')){?>
            $(document).ready(function() {
                $('#modalError').modal('show');
            });
        <?php } ?>
    </script>
    <div class="modal" tabindex="-1" role="dialog" id="modalError">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo session('mensaje') ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>