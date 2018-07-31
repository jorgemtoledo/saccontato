<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Motolâncias</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>motorcycles" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Motolâncias </a>
          </div>

          <h2 class="sub-header">Dados da Motolância</h2>

          <div class="table-responsive">


            <table id="motocycles" class="table table-bordered table-striped">

              <tbody>
              <?php foreach ($motorcycles as $motorcycle) { ?>
                <tr>
                  <td>ID</strong></td>
                    <td><?php echo $motorcycle->id; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Nome</strong></td>
                    <td><?php echo $motorcycle->name; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Modelo</strong></td>
                    <td><?php echo $motorcycle->model; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Fabricante</strong></td>
                    <td><?php echo $motorcycle->mark; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Ativo?</strong></td>
                    <td>
                      <?php
                            $useractive = 1;
                             if ($useractive == $motorcycle->active) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Ano:</strong></td>
                    <td><?php echo $motorcycle->year; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Placa:</strong></td>
                    <td><?php echo $motorcycle->motorcycle_plate; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Descrição:</strong></td>
                    <td><?php echo $motorcycle->description; ?>     &nbsp;</td>
                  </tr><tr>

                  <td>Data Cadastrado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($motorcycle->created));
                                echo date('d/m/y', $timestamp);
                        ?>
                    &nbsp;</td>
                  </tr><tr>

                  <td>Data Alterado</strong></td>
                    <td>
                        <?php   $timestamp = strtotime(($motorcycle->modified));
                                echo date('d/m/y', $timestamp);
                        ?>
                        &nbsp;</td>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>