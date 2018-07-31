<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Clientes</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>clients" ><i class="glyphicon glyphicon-list-alt"></i>   Listar clientes </a>
          </div>

          <h2 class="sub-header">Dados do Cliente</h2>

          <div class="table-responsive">


            <table id="clients" class="table table-bordered table-striped">

              <tbody>
              <?php foreach ($clients as $client) { ?>
                <tr>
                  <td>ID</strong></td>
                    <td><?php echo $client->id; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Nome</strong></td>
                    <td><?php echo $client->name; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>CPF</strong></td>
                    <td><?php echo $client->cpf; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Numero do Contrato</strong></td>
                    <td><?php echo $client->agreement; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Ativo?</strong></td>
                    <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $client->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Telefone 1</strong></td>
                    <td><?php echo $client->phone1; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Telefone 2</strong></td>
                    <td><?php echo $client->phone2; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Rua/Av:</strong></td>
                    <td><?php echo $client->address; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Numero da casa</strong></td>
                    <td><?php echo $client->number; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Bairro</strong></td>
                    <td><?php echo $client->neighborhood; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Cidade</strong></td>
                    <td><?php echo $client->city; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Estado</strong></td>
                    <td><?php echo $client->state; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Observações</strong></td>
                    <td><?php echo $client->observation; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Data Cadastrado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($client->created));
                                echo date('d/m/y', $timestamp);
                        ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Data Alterado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($client->modified));
                                echo date('d/m/y', $timestamp);
                        ?>
                        &nbsp;</td>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>