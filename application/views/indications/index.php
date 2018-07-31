<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Indicações de Clientes</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>indications/add" ><i class="glyphicon glyphicon-plus"></i>  Cadastrar</a>
          </div>

          <h2 class="sub-header">Lista Indicações</h2>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
              <thead>
                <tr class="text-center">
                  <th class="text-center"><h6>ID</h6></th>
                  <th class="text-center"><h6>Nome Indicado</h6></th>
                  <th class="text-center"><h6>Telefone</h6></th>
                  <th class="text-center"><h6>Quem Indicou?</h6></th>
                  <th class="text-center"><h6>Ligou?</h6></th>
                  <th class="text-center"><h6>Fechou Contrato?</h6></th>
                  <th class="text-center"><h6>Atendente</h6></th>
                  <th class="text-center"><h6>Ação</h6></th>
                </tr>
              </thead>
              <tbody class="text-center">
              <?php foreach ($indications as $indication) { ?>
                <tr>
                  <td><h6><?php echo $indication->indid; ?></h6></td>
                  <td><h6><?php echo $indication->indname_indicated; ?></h6></td>
                  <td><h6><?php echo $indication->indphone_indicated; ?></h6></td>
                  <td><h6><?php echo $indication->clientname; ?></h6></td>
                  <td><h6>
                    <?php
                            $feedindication = 1;
                             if ($feedindication == $indication->indfeedbackindication) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                    ?>
                  </h6></td>
                  <td><h6>
                    <?php
                            $feedindication = 1;
                             if ($feedindication == $indication->indsigned_contract) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                    ?>
                  </h6></td>

                  <td><h6><?php echo $indication->uname; ?></h6></td>

                  <td><h6><a href="<?php echo base_url('indications/view/'.$indication->indid); ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="<?php echo base_url('indications/sale/'.$indication->indid); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Ligar Cliente"><i class="glyphicon glyphicon-save"></i></a>

                      <?php $feedindicationsale = 1;
                          if ($feedindicationsale == $indication->indfeedbackindication) { ?>
                        <a href="<?php echo base_url('indications/viewsale/'.$indication->indid); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Ver Fechamento"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <?php } else { ?>
                        <a href="#" class="btn btn-primary btn-xs" disabled data-toggle="tooltip" title="Ver Fechamento"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <?php } ?>

                      <a href="<?php echo base_url('indications/delete/'.$indication->indid); ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td>
                </h6></tr>
                 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>