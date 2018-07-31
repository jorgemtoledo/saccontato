<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Finalização e DEVOLUTIVA PARA GERADOR DE RNC:</h2>

          <div class="box-tools pull-right">
               <!--  <a class="btn btn-primary" href="<?php echo base_url() ?>treatments/add" ><i class="glyphicon glyphicon-plus"></i>  Formulário</a> -->
          </div>

          <h2 class="sub-header">Formulários</h2>
          <div class="table-responsive">
            <table  class="table table-striped table-bordered table-hover table-condensed" id="table_id">
              <thead>
                <tr>
                  <th class="text-center"><h6>Nº</h6></th>
                  <th class="text-center"><h6>Protegido atendido:</h6></th>
                  <th class="text-center"><h6>Data SAC</h6></th>
                  <th class="text-center"><h6>Hora</h6></th>
                  <th class="text-center"><h6>RNC</h6></th>
                  <th class="text-center"><h6>Finalização RNC:</h6></th>
                  <th class="text-center"><h6>DATA Finalização:</h6></th>
                  <th class="text-center"><h6>Atendente RNC</h6></th>
                  <th class="text-center"><h6>Ação</h6></th>

                </tr>
              </thead>
              <tbody class="text-center">
              <?php foreach ($treatments as $treatment) { ?>
                <tr>
                  <td><?php echo $treatment->tid; ?></td>
                  <td><?php echo $treatment->cname; ?></td>

                  <td><?php   $timestamp = strtotime(($treatment->tdate));
                                echo date('d/m/y', $timestamp);
                        ?>
                  </td>


                  <td><?php echo $treatment->thour; ?></td>
                  <td>
                      <?php
                            $yesrnc = 1;
                             if ($yesrnc == $treatment->trnc) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td class="text-center">
                      <?php
                            $feedback = 1;
                             if ($feedback == $treatment->tfeedbackreturn) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>


                  <?php $datereturn = $treatment->tdate_return;
                      // echo $datereturn;
                      if ($datereturn !== NULL) {
                        $timestamp = strtotime(($datereturn));
                        echo "<td>" . date('d/m/y', $timestamp) . "</td>";
                      } else{
                        echo "<td class='text-danger'>00/00/00</td>";
                      }

                  ?>

                  <td><?php echo $treatment->urncreturnname; ?></td>


                  <td><a href="<?php echo base_url('treatments/listrnc'); ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Listar RNC"><i class="glyphicon glyphicon-align-justify"></i></a>
                      <?php $addrnc = 0;
                          if ($addrnc == $treatment->tfeedbackreturn) { ?>
                      <a href="<?php echo base_url('treatments/addrncreturn/'.$treatment->tid); ?>"  class="btn btn-success btn-xs" data-toggle="tooltip" title="RNC Final"><i class="glyphicon glyphicon-ok"></i></a>
                        <?php } else { ?>
                        <a href="#"  class="btn btn-success btn-xs" disabled><i class="glyphicon glyphicon-ok" data-toggle="tooltip" title="RNC Final"></i></a>
                        <?php } ?>


                      <?php $yesfeedback = 1;
                          if ($yesfeedback == $treatment->tfeedbackreturn) { ?>
                        <a href="<?php echo base_url('treatments/viewrncreturn/'.$treatment->tid); ?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Ver RNC Final"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <?php } else { ?>
                        <a href="#" class="btn btn-success btn-xs" disabled><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver RNC Final"></i></a>
                      <?php } ?>

                </tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>