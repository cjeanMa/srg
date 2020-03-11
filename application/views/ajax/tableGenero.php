<table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <th>Nombre Sexo</th>
                <th>Abreviacion</th>
                <th>Acciones</th>
            </thead>
            <?php foreach($sexos as $sexo){ ?>
            <tr>
                <td><?php echo $sexo['nombreSexo'];?></td>
                <td><?php echo $sexo['letraSexo']; ?></td>
                <td>
                    <a href="" onclick="cargarDatosGenero('<?=$sexo['idSexo'].'||'.$sexo['nombreSexo'].'||'.$sexo['letraSexo']?>');" data-toggle="modal" data-target="#updateSexo"><i class="fa fa-edit"></i></a>
                    <a href=""><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php }?>
        </table> 