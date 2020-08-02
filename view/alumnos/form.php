<h1 class="page-header">
    <?= $alumno->id != 0 ? $alumno->nombre : 'Nuevo Registro' ?>
</h1>

<!-- Page Breadcrumb -->
<ol class="breadcrumb">
    <li><a href="?c=Alumnos">Alumnos</a></li>
    <li class="active"><?= $alumno->id != 0 ? $alumno->nombre : 'Nuevo Registro' ?></li>
</ol>

<!-- Formulario -->
<div class="row">
    <div class="col-lg-4">

        <?php // c: controlador 'Alumnos'; a: funcion 'save' del controlador; ?>
        <form id="form" action="?c=Alumnos&a=save" method="post" enctype="multipart/form-data">
            <!-- ID del registro. Para editar alumno. -->
            <input type="hidden" name="id" value="<?= $alumno->id ?>" />

            <div class="form-group">
                <label>Foto</label>
                <div class="thumbnail">
                    <span class="help-block">
                        <img id="img" class="img-responsive" src="<?= $alumno->srcFoto() ?>">
                    </span>
                    <input id="inputFile" type="file" name="foto" accept="image/*">
                </div>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?= $alumno->nombre ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group">
                <label>Apellido(s)</label>
                <input type="text" name="apellido" value="<?= $alumno->apellido ?>" class="form-control" placeholder="Ingrese su(s) apellido(s)" data-validacion-tipo="requerido|min:4" />
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="text" name="correo" value="<?= $alumno->correo ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
            </div>

            <div class="form-group">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                    <?php foreach (array('Hombre', 'Mujer') as $value) : ?>
                    <option <?= $alumno->sexo == $value ? 'selected' : '' ?> value="<?= $value ?>">
                        <?= $value ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <div class='input-group date date-picker' data-date-format="yyyy-mm-dd">
                    <input type="text" name="fecha_nacimiento" value="<?= $alumno->fecha_nacimiento ?>" readonly="" class="form-control" placeholder="Seleccione su fecha de nacimiento" data-validacion-tipo="requerido" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <br />

            <div class="text-right">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>

    </div>
</div>