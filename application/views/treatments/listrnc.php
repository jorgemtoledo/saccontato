<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Relatórios de Não Conformidades</h1>

          <div class="box-tools pull-right">
               <!--  <a class="btn btn-primary" href="<?php echo base_url() ?>treatments/add" ><i class="glyphicon glyphicon-plus"></i>  Formulário</a> -->
          </div>

          <h2 class="sub-header">Formulários RNC</h2>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
              <thead>
                <tr>
                  <th><h6>Nº</h6></th>
                  <th><h6>Protegido atendido:</h6></th>
                  <th><h6>Data</h6></th>
                  <th><h6>Hora</h6></th>
                  <th><h6>RNC</h6></th>
                  <th><h6>Indicação</h6></th>
                  <th><h6>Atendente SAC</h6></th>
                  <th><h6>Feedback</h6></th>
                  <th><h6>Ação</h6></th>

                </tr>
              </thead>
              <tbody>
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

                  <td>
                      <?php
                            $yesindication = 1;
                             if ($yesindication == $treatment->tindication) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>


                  <td><?php echo $treatment->usacname; ?></td>
                  <td>
                      <?php
                            $feedback = 1;
                             if ($feedback == $treatment->tfeedbackrnc) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td><a href="<?php echo base_url('treatments'); ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Listar Atendimento" ><i class="glyphicon glyphicon-align-justify"></i></a>
                      <?php $addrnc = 0;
                          if ($addrnc == $treatment->tfeedbackrnc) { ?>
                      <a href="<?php echo base_url('treatments/addrnc/'.$treatment->tid); ?>"  class="btn btn-warning btn-xs" data-toggle="tooltip" title="RNC" ><i class="glyphicon glyphicon-copy"></i></a>
                        <?php } else { ?>
                        <a href="#"  class="btn btn-warning btn-xs" disabled><i class="glyphicon glyphicon-copy" data-toggle="tooltip" title="RNC"></i></a>
                        <?php } ?>


                      <?php $yesfeedback = 1;
                          if ($yesfeedback == $treatment->tfeedbackrnc) { ?>
                        <a href="<?php echo base_url('treatments/viewrnc/'.$treatment->tid); ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver RNC" ></i></a>
                      <?php } else { ?>
                        <a href="#" class="btn btn-warning btn-xs" disabled><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver RNC"></i></a>
                      <?php } ?>

                      <?php $listfeedbackreturn = 1;
                          if ($listfeedbackreturn == $treatment->tfeedbackrnc) { ?>
                        <a href="<?php echo base_url('treatments/listrncreturn/'); ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-align-justify" data-toggle="tooltip" title="Listar RNC Final"></i></a>
                      <?php } else { ?>
                        <a href="#" class="btn btn-success btn-xs" disabled><i class="glyphicon glyphicon-align-justify" data-toggle="tooltip" title="Listar RNC Final"></i></a>
                      <?php } ?>
                </tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>