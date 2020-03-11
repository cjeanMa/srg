<table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    <th>Id Discapacidad</th>
                    <th>Denominacion</th>
                    <th>Acciones</th>
                </thead>
                <?php foreach($discapacidades as $dis){?>
                <tr>
                    <td><?php echo $dis['idDiscapacidad'];?></td>
                    <td><?php echo $dis['nombreDiscapacidad'];?></td>
                    <td>
                        <a href="" onclick = "cargarDatosDiscapacidad('<?=$dis['idDiscapacidad'].'||'.$dis['nombreDiscapacidad']?>')" data-toggle="modal" data-target="#updateDiscapacidad"><i class="fa fa-edit"></i></a>
                        <a href=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php }?>
            </table>