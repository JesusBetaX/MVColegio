<h1 class="page-header">Alumnos</h1>

<!-- Page Grind -->
<div class="row">
    <div class="col-sm-8" style="margin-bottom: 1rem">
        <ul class="list-inline">
            <?php // c: controlador 'Alumnos'; a: funcion 'form' del controlador; ?>
            <li><a class="btn btn-sm btn-primary" href="?c=Alumnos&a=form">Nuevo alumno</a></li>
            <li><a class="btn btn-sm btn-default" href="#">Otra cosa</a></li>
        </ul>
    </div>
    
    <div class="col-sm-4" style="margin-bottom: 1rem">
        <?php // c: controlador 'Alumnos'; a: funcion por default 'Index'; ?>
        <form action="?c=Alumnos" method="post" class="input-group">
            <input class="form-control" name="search" type="text" value="<?= $search ?>" placeholder="Buscar">
            <span class="input-group-btn">
                <button class="btn btn-success" type="submit">Buscar</button>
            </span>
        </form>
    </div>
</div>

<!-- Page Table -->
<div class="table-responsive" style="margin-top: 14px">
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th style="width:180px;">Nombre</th>
                <th>Apellido(s)</th>
                <th>Correo</th>
                <th style="width:120px;">Sexo</th>
                <th style="width:120px;">Nacimiento</th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cursor as $alumno): ?>
            <tr>
                <td><?= $alumno->nombre ?></td>
                <td><?= $alumno->apellido ?></td>
                <td><?= $alumno->correo ?></td>
                <td><span class="badge"><?= $alumno->sexo[0] ?></span></td>
                <td><?= $alumno->fecha_nacimiento ?></td>
                <td>
                    <?php // c: controlador 'Alumnos'; a: funcion 'form' del controlador; ?>
                    <a class="btn btn-primary btn-xs" href="?c=Alumnos&a=form&id=<?= $alumno->id ?>">Editar</a>
                </td>
                <td>
                    <?php // c: controlador 'Alumnos'; a: funcion 'delete' del controlador; ?>
                    <a class="btn btn-default btn-xs" href="?c=Alumnos&a=delete&id=<?= $alumno->id ?>" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
</div>