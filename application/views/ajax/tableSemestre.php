<table class="table table-striped table-bordered text-center">
              <thead class="thead-dark">
                  <th>Def. Romanos</th>
                  <th>Semestre</th>
                  <th>PreNombre</th>
                  <th>Acciones</th>
              </thead>
              <?php foreach($semestres as $s){ ?>
              <tr>
                  <td><?php echo $s['romanos'];?></td>
                  <td><?php echo $s['nombre'];?></td>
                  <td><?php echo $s['prenombre'];?></td>
                  <td>
                      <a href="" onclick ="cargarDatosSemestre('<?=$s['idSemestre'].'||'.$s['romanos'].'||'.$s['nombre'].'||'.$s['prenombre'];?>');" data-toggle="modal" data-target="#updateSemestre"><i class="fa fa-edit"></i></a>
                      <a href=""><i class="fa fa-trash"></i></a>
                  </td>
              </tr>
              <?php }?>
          </table>