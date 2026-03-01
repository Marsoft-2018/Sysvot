<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href='#' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="newUser()"><i class='fa fa-plus-circle'> Agregar usuario </i></a><br><br>
        </div>
    </div>
</div>
<hr>
<div class="container">
<div class="row">
    <div class="col-md-12" id="seccion_usuarios">
        <?php
            $objUsuario = new User();
            include("listar.php");
        ?>
    </div>
</div>

</div>