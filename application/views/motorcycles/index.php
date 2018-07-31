<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Motolâncias</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>motorcycles/add" ><i class="glyphicon glyphicon-plus"></i>  Motolância</a>
          </div>

          <h2 class="sub-header">Lista Motolâncias</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Modelo</th>
                  <th>Fabricante</th>
                  <th>Ano</th>
                  <th>Placa</th>
                  <th>Ativo?</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($motorcycles as $motorcycle) { ?> 
                <tr>
                  <td><?php echo $motorcycle->id; ?></td>
                  <td><?php echo $motorcycle->name; ?></td>
                  <td><?php echo $motorcycle->model; ?></td>
                  <td><?php echo $motorcycle->mark; ?></td>
                  <td><?php echo $motorcycle->year; ?></td>
                  <td><?php echo $motorcycle->motorcycle_plate; ?></td>

                  <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $motorcycle->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td>

                  </td>

                  <td>
                      <?php $motorcycle->id;
                        if ($motorcycle->id != 1) { ;
                      ?>
                      <a href="<?php echo base_url('motorcycles/view/'.$motorcycle->id); ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="<?php echo base_url('motorcycles/edit/'.$motorcycle->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="<?php echo base_url('motorcycles/delete/'.$motorcycle->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php  } ?>
                  </td>
                </tr> 
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>