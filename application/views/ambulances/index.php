<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Ambulância</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>ambulances/add" ><i class="glyphicon glyphicon-plus"></i>  Ambulância</a>
          </div>

          <h2 class="sub-header">Lista Ambulâncias</h2>
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
              <?php foreach ($ambulances as $ambulance) { ?>
                <tr>
                  <td><?php echo $ambulance->id; ?></td>
                  <td><?php echo $ambulance->name; ?></td>
                  <td><?php echo $ambulance->model; ?></td>
                  <td><?php echo $ambulance->mark; ?></td>
                  <td><?php echo $ambulance->year; ?></td>
                  <td><?php echo $ambulance->license_plate; ?></td>

                  <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $ambulance->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td>

                  </td>

                  <td>
                      <?php $ambulance->id;
                        if ($ambulance->id != 2) { ;
                      ?>
                      <a href="<?php echo base_url('ambulances/view/'.$ambulance->id); ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="<?php echo base_url('ambulances/edit/'.$ambulance->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="<?php echo base_url('ambulances/delete/'.$ambulance->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php } ?>
                  </td>
                </tr> 
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>