<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Ambulâncias</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>ambulances" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Ambulâncias </a>
          </div>

          <h2 class="sub-header">Dados da Ambulância</h2>

          <div class="table-responsive">


            <table id="ambulances" class="table table-bordered table-striped">

              <tbody>
              <?php foreach ($ambulances as $ambulance) { ?>
                <tr>
                  <td>ID</strong></td>
                    <td><?php echo $ambulance->id; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Nome</strong></td>
                    <td><?php echo $ambulance->name; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Modelo</strong></td>
                    <td><?php echo $ambulance->model; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Fabricante</strong></td>
                    <td><?php echo $ambulance->mark; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Ativo?</strong></td>
                    <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $ambulance->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Ano:</strong></td>
                    <td><?php echo $ambulance->year; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Placa:</strong></td>
                    <td><?php echo $ambulance->license_plate; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Descrição:</strong></td>
                    <td><?php echo $ambulance->description; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Data Cadastrado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($ambulance->created));
                                echo date('d/m/y', $timestamp);
                        ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Data Alterado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($ambulance->modified));
                                echo date('d/m/y', $timestamp);
                        ?>
                        &nbsp;</td>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>