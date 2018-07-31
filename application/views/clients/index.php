<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Clientes</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>clients/add" ><i class="glyphicon glyphicon-plus"></i>  Cliente</a>
          </div>

          <h2 class="sub-header">Lista Clientes</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Telefone 1</th>
                  <th>Telefone 2</th>
                  <th>Numero Contrato</th>
                  <th>Ativo?</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($clients as $client) { ?> 
                <tr>
                  <td><?php echo $client->id; ?></td>
                  <td><?php echo $client->name; ?></td>
                  <td><?php echo $client->cpf; ?></td>
                  <td><?php echo $client->phone1; ?></td>
                  <td><?php echo $client->phone2; ?></td>
                  <td><?php echo $client->agreement; ?></td>

                  <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $client->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td><a href="<?php echo base_url('clients/view/'.$client->id); ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="<?php echo base_url('clients/edit/'.$client->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="<?php echo base_url('clients/delete/'.$client->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>