<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Formulário de Fechamento de Indicação</h1>

  <div class="table-responsive"> <!-- Inicio Responsive -->

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário de Fechamento de Indicação</h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>indications/save_editsale" method="post">
              <!-- <input type="hidden" id="feedbackindication" name="feedbackindication" value="1"> -->
              <input type="hidden" id="id" name="id" value="<?php echo $result->indid; ?>">

                <div class="form-group">
                  <div class="col-sm-7">
                    <label for="name_indicated">Nome do Indicado para Contato:</label>
                    <input type="text" class="form-control" id="name_indicated" name="" value="<?php echo $result->indname_indicated; ?>" disabled>
                  </div>

                  <div class="col-sm-4">
                    <label for="phone_indicated">Telefone para Contato:</label>
                    <input type="text" class="form-control" id="phone_indicated" name="" value="<?php echo $result->indphone_indicated; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-7">
                    <label>Cliente que indicou</label>
                    <select id="client_id" name="" class="form-control" disabled>
                      <option value="<?php echo $result->clientid; ?>"> <?php echo $result->clientname; ?> </option>
                      <?php foreach ($clients as $client) { ?>
                      <option value="<?php echo $client->id; ?>"> <?php echo $client->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                 <div class="col-md-3">
                    <label>Data:</label>
                    <div class='input-group date' id='data'>
                              <input type='text' class="form-control" id="data" name="date_sale" value="<?php echo date( "d/m/Y", strtotime( $result->inddate_sale ) ) ?>" disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="hour_sale">Hora:</label>
                    <input type="text" class="form-control" id="hour_sac" name="hour_sale" value="<?php echo $result->indhour_sale; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-11 text-center">
                    <div><label><h3>Retorno da Visita</h3></label></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label for="feedbackindication">Entrou em contato com o cliente indicado?</label>
                    <select id="feedbackindication" name="feedbackindication" class="form-control" disabled>
                      <option value="1"<?php echo $result->indfeedbackindication ==1?' selected':''; ?>> Sim  </option>
                      <option value="0"<?php echo $result->indfeedbackindication ==0?' selected':''; ?>> Não  </option>
                    </select>
                  </div>

                <div class="col-md-3">
                    <label>Data do Fechamento</label>
                    <div class='input-group date' id='data'>
                              <input type='text' class="form-control" id="data" name="date_contract" value="<?php echo date( "d/m/Y", strtotime( $result->inddate_contract ) ) ?>"  disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <label for="number_contract">Número do Contrato</label>
                    <input type="text" class="form-control" id="number_contract" name="number_contract" value="<?php echo $result->indnumber_contract; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label for="signed_contract">Fechou contrato com o indicado?</label>
                    <select id="signed_contract" name="signed_contract" class="form-control" disabled>
                      <option value="1"<?php echo $result->indsigned_contract ==1?' selected':''; ?>> Sim  </option>
                      <option value="0"<?php echo $result->indsigned_contract ==0?' selected':''; ?>> Não  </option>
                    </select>
                  </div>
                </div>

                <label>Porque Não fechou?</label>
                        <div class="row">
                          <div class="col-md-11">
                            <textarea class="form-control" id="description_contract" name="description_contract"  rows="4" disabled><?php echo $result->inddescription_contract; ?></textarea><br/>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-5">
                            <label for="salesman_id">Atendente ou Vendedor</label>
                            <input type="text" class="form-control" id="salesman_id" name="salesman_id" value="<?php echo $result->salename; ?>" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <a class="btn btn-success" href="<?php echo base_url() ?>indications" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
                                <a href="<?php echo base_url('indications/editsale/'.$result->indid); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i>Editar</a>
                            </div>
                        </div>
                </div>

            </form>

          </div>
      </div>
    </div>

    <script type="text/javascript">
            // máscara de cep rg, cpf etc
            function formatar(mascara, documento){
                var i = documento.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(i)
                if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
                }
            }
        </script>

  </div>  <!-- Fim Responsive -->
</div>