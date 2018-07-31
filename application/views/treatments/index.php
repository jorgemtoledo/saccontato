<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Atendimento Equipe</h1>

          <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                              <input type="text" name="busca" placeholder="Nº/Protegido/Atendente" value ="<?php echo  $busca ?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-primary" href="<?php echo base_url() ?>treatments/add" ><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Fazer Atendimento"></i>  Formulário</a>
                            <a class="btn btn-success" href="<?php echo base_url() ?>clients/addop" ><i class="glyphicon glyphicon-plus"></i>  Cliente</a>
                        </div>
                    </div>
                </div>
            </form>
          </div>

          <h2 class="sub-header">Formulários Atendimento Equipe</h2>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
              <thead>
                <tr>
                  <th><h6>Nº</h6></th>
                  <th><h6>Protegido:</h6></th>
                  <th><h6>Data</h6></th>
                  <th><h6>Hora</h6></th>
                  <th><h6>Atendimento</h6></th>
                  <th><h6>Atendente</h6></th>
                  <th><h6>Aprovado</h6></th>
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
                        ?></h6>
                  </td>
                  <td><h6><?php echo $treatment['thour']; ?></h6></td>
                  <td><h6>
                       <?php
                            switch ($treatment['ttype_care']) {
                              case '1':
                                echo 'Área Protegida';
                                break;
                              case '2':
                                echo 'Varejo';
                                break;
                              case '3':
                                echo 'Remoção';
                                break;
                              default:
                                # code...
                                break;
                            }
                    ?></h6>
                  </td>

                  <td><h6><?php echo $treatment['uname']; ?></h6></td>

                  <td class="text-center"><h6>
                      <?php
                            $yessac = 1;
                             if ($yessac == $treatment['tapproved']) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?></h6>
                  </td>

                  <td class="text-center"><h6>
                    <?php $id = $this->session->userdata('level');
                              if ($id == 1 OR $id == 2) { ;?>
                                <a href="<?php echo base_url('treatments/view/'.$treatment['tid']); ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver Atendimento"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="<?php echo base_url('treatments/edit/'.$treatment['tid']); ?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Aprovar Atendimento"><i class="glyphicon glyphicon-eye-close"></i></a>
                                <a href="<?php echo base_url('treatments/delete/'.$treatment['tid']); ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td>
                              <?php  } else{; ?>
                              <a href="<?php echo base_url('treatments/view/'.$treatment['tid']); ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver Atendimento"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <?php  } ?>

                </h6></tr>
                 <?php } ?>
              </tbody>
            </table>
            <?php echo $pag; ?>
          </div>
        </div>

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

       