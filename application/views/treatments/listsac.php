<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Atendimento SAC</h1>
          <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                              <input type="text" name="busca" placeholder="Atendente" value ="<?php echo  $busca ?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                        </div>
                    </div>
                </div>
            </form>
          </div>

          <div class="box-tools pull-right">
               <!--  <a class="btn btn-primary" href="<?php echo base_url() ?>treatments/add" ><i class="glyphicon glyphicon-plus"></i>  Formulário</a> -->
          </div>

          <h2 class="sub-header">Formulários Atendimento SAC</h2>
          <div class="table-responsive">
          <!-- <?php $id = $this->session->userdata('level');
                              echo $id;
                         ?> -->
            <table  class="table table-striped table-bordered table-hover table-condensed" id="table_id">
              <thead>
                <tr>
                  <th><h6>Nº</h6></th>
                  <th><h6>Protegido atendido:</h6></th>
                  <th><h6>Data</h6></th>
                  <th><h6>Hora</h6></th>
                  <th><h6>SAC</h6></th>
                  <th><h6>RNC</h6></th>
                  <th><h6>Indicação</h6></th>
                  <th><h6>Atendente SAC</h6></th>
                  <th><h6>Ação</h6></th>

                </tr>
              </thead>
              <tbody>
              <?php foreach ($treatments as $treatment) { ?>
                <tr>
                  <td><h6><?php echo $treatment['tid']; ?></h6></td>
                  <td><h6><?php echo $treatment['cname']; ?></h6></td>
                  <td><h6><?php   $timestamp = strtotime(($treatment['tdate']));
                                echo date('d/m/y', $timestamp);
                        ?>
                  </td>
                  <td><h6><?php echo $treatment['thour']; ?></h6></td>

                  <td><h6>
                      <?php
                            $yessac = 1;
                             if ($yessac == $treatment['tsac']) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </h6></td>

                  <td><h6>
                      <?php
                            $yesrnc = 1;
                             if ($yesrnc == $treatment['trnc']) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </td>

                  <td><h6>
                      <?php
                            $yesindication = 1;
                             if ($yesindication == $treatment['tindication']) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                  </h6></td>


                  <td><h6>
                      <?php
                            $yessac = 1;
                             if ($yessac == $treatment['tsac']) {
                                  echo $treatment['usacname'];
                              } else {
                                  echo "<span class='label label-danger'>Nenhum</span>";
                              }
                      ?>
                  </h6></td>



                  <td class="text-center"><h6>
                        <?php $sac = 0;
                           if ($sac == $treatment['tsac']) { ?>
                            <a href="<?php echo base_url('treatments/addsac/'.$treatment['tid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-earphone" data-toggle="tooltip" title="SAC" ></i></a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-primary btn-xs" disabled><i class="glyphicon glyphicon-earphone" data-toggle="tooltip" title="SAC" ></i></a>
                        <?php } ?>

                        <?php $id = $this->session->userdata('level');
                          //echo $id;
                           if ($id == 4) { ;
                        ?>
                            <a href="<?php echo base_url('treatments/viewsac/'.$treatment['tid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver SAC" ></i></a>
                            <a href="<?php echo base_url('treatments/editsac/'.$treatment['tid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-close" data-toggle="tooltip" title="Editar SAC" ></i></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('treatments/viewsac/'.$treatment['tid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Ver SAC" ></i></a>
                        <?php } ?>

                      <?php $rnc = 1;
                          if ($rnc == $treatment['trnc']) { ?>
                            <a href="<?php echo base_url('treatments/listrnc'); ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-align-justify" data-toggle="tooltip" title="Listar RNC" ></i></a>
                      <?php } else { ?>
                            <a href="#" class="btn btn-warning btn-xs" disabled><i class="glyphicon glyphicon-align-justify" data-toggle="tooltip" title="Listar RNC"></i></a>
                      <?php } ?>
                      </h6>
                  </td>

                </tr>
                 <?php } ?>
              </tbody>
            </table>
            <?php echo $pag; ?>
          </div>
        </div>

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>