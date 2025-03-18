<div class="container">
    <div class="row">
        <div class="col-md-6">
            <button type="button" onclick="nuevo_User()" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</button>
        </div>
        <div class="col-md-6">
            <button type="button" onclick="listar_usuarios()" class="btn btn-info"><i class="fa fa-plus"></i> Listar</button>
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