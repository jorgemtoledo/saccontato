<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Atendimento ao cliente</h1>

  <div class="table-responsive"> <!-- Inicio Responsive -->

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário Atendimento Equipe</h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>treatments/savetreatment" method="post">

                <div class="form-group">
                  <div class="col-md-7">
                  <div><label><h2>Número do atendimento: <?php echo $result->tid; ?></h2></label>
                  </div>
                  </div>
                  <div class="col-md-7">
                    <label>Protegido atendido:</label>
                    <select id="client_id" name="client_id" class="form-control" disabled>
                      <option value=""> <?php echo $result->cname; ?> </option>
                      <?php foreach ($clients as $client) { ?>
                      <option value="<?php echo $client->id; ?>"> <?php echo $client->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                    <div class="col-sm-2">
                    <label for="hour">Data:</label>
                    <input type="text" class="form-control" id="hour" value="<?php echo date( "d/m/Y", strtotime( $result->tdate ) ) ?>" name="hour" placeholder="Hora: 12:00" disabled>
                  </div>
                  <div class="col-sm-2">
                    <label for="hour">Hora:</label>
                    <input type="text" class="form-control" id="hour" value="<?php echo $result->thour; ?>" name="hour" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="type_care">Tipo de Atendimento:</label>
                    <select id="type_care" name="type_care" class="form-control" disabled>
                      <option value=""> Selecione </option>
                      <option value="1"<?php echo $result->ttype_care ==1?' selected':''; ?>> Área Protegida  </option>
                      <option value="2"<?php echo $result->ttype_care ==2?' selected':''; ?>> Varejo  </option>
                      <option value="3"<?php echo $result->ttype_care ==3?' selected':''; ?>> Remoção  </option>
                    </select>
                  </div>
                </div>

                <label>Descrição popular (para leigos) do caso e do desenvolvimento:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description_care" name="description_care"  rows="4" disabled><?php echo $result->tdescription_care; ?></textarea><br />
                  </div>
                </div>

                <label>Informações complementares para uso interno:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="information_care" name="information_care"  rows="4" disabled><?php echo $result->tinformation_care; ?></textarea><br />
                  </div>
                </div>

                <label><h3>Equipe de Atendimento:</h3></label>

                <div class="form-group">
                  <div class="col-sm-2">
                    <label for="number_radio">Radio:</label>
                    <input type="text" class="form-control" id="number_radio" value="<?php echo $result->tnumber_radio; ?>" name="number_radio" disabled>
                  </div>
                  <div class="col-md-2">
                    <div class="radio">
                    <label>Motolância:</label>
                      <?php
                            $useractive = 1;
                             if ($useractive == $result->tmotorcycle) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Nº Veículo:</label>
                    <select id="motorcycle_id" name="motorcycle_id" class="form-control" disabled>
                      <option value="1"> <?php echo $result->mname; ?>  </option>
                      <?php foreach ($motorcycles as $motorcycle) { ?>
                      <option value="<?php echo $motorcycle->id; ?>"> <?php echo $motorcycle->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-3">
                    <div class="radio">
                    <label>Ambulância:</label>
                      <?php
                            $ambulance = 1;
                             if ($ambulance == $result->tambulance) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label>Nº Veículo:</label>
                    <select id="ambulance_id" name="ambulance_id" class="form-control" disabled>
                      <option value="1"> <?php echo $result->aname; ?>  </option>
                      <?php foreach ($ambulances as $ambulance) { ?>
                      <option value="<?php echo $ambulance->id; ?>"> <?php echo $ambulance->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                    <label for="name_contact">Nome para Contato::</label>
                    <input type="text" class="form-control" id="name_contact" name="name_contact" value="<?php echo $result->tname_contact; ?>" disabled>
                  </div>
                  <div class="col-sm-3">
                    <label for="phone_contact">Telefone:</label>
                    <input type="text" class="form-control" id="phone_contact" name="phone_contact" value="<?php echo $result->tphone_contact; ?>" disabled>
                  </div>
                  <div class="col-sm-3">
                    <label for="hour_contact">Melhor horário para ligar:</label>
                    <input type="text" class="form-control" id="hour_contact" name="hour_contact" value="<?php echo $result->thour_contact; ?>" disabled>
                  </div>
                </div><br>
            </form>

          </div>
      </div>
    </div>

    <!-- Atendimento SAC - POS Vendas -->

    <div class="col-md-12">
      <div class="panel panel-primary">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-earphone"></i> SAC </h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>treatments/savesactreatment" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $result->tid; ?>">
                <div><label><h2>Número do atendimento: <?php echo $result->tid; ?></h2></label>
                <div class="form-group">
                  <div class="col-md-3">
                    <label>Data:</label>
                    <div class='input-group date' id='date_sac'>
                              <input type='text' class="form-control" id="date_sac" value="<?php echo date( "d/m/Y", strtotime( $result->tdate_sac ) ) ?>"  disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="hour_sac">Hora:</label>
                    <input type="text" class="form-control" id="hour_sac" name="hour_sac" value="<?php echo $result->thour_sac; ?>" disabled>
                  </div>
                  <div class="col-sm-6">
                    <label for="proximity_protected">Grau de Proximidade do protegido:</label>
                    <input type="text" class="form-control" id="proximity_protected" name="proximity_protected" value="<?php echo $result->tproximity_protected; ?>" disabled >
                  </div>
                </div>

                <label>Estado do protegido atendido:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="state_protected" name="state_protected"  rows="4" disabled><?php echo $result->tstate_protected; ?></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                <div class="col-md-2">
                  <label for="value_sac">Nota:</label>
                  <select id="value_sac" name="value_sac" class="form-control" disabled>
                  <!-- Definir o valor 95 porque o campo da Tb Mysql e int e nao esta salvando NULL -->
                    <option value="95"<?php echo $result->tvalue_sac ==null?' selected':''; ?>> Sem Nota  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==1?' selected':''; ?>> 1  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==2?' selected':''; ?>> 2  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==3?' selected':''; ?>> 3  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==4?' selected':''; ?>> 4  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==5?' selected':''; ?>> 5  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==6?' selected':''; ?>> 6  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==7?' selected':''; ?>> 7  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==8?' selected':''; ?>> 8  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==9?' selected':''; ?>> 9  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==10?' selected':''; ?>> 10  </option>
                  </select>
                </div>
                </div>

                <label>O que faltou para o 10:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description_value" name="description_value"  rows="4" disabled><?php echo $result->tdescription_value; ?></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                <div class="col-md-4">
                    <div class="radio">
                    <label for="rnc">O atendimento gerou um RNC?</label>
                      <?php
                            $rnc = 1;
                             if ($rnc == $result->trnc) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="radio">
                    <label for="indication">O senhor(a) indicaria a Quali Salva?:</label>
                      <?php
                            $indication = 1;
                             if ($indication == $result->tindication) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    </div>
                  </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <a class="btn btn-success" href="<?php echo base_url() ?>treatments/listsac" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
                        <!-- <a href="<?php echo base_url('treatments/editsac/'.$result->tid); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i>Editar</a> -->
                    </div>
                </div>
            </form>

          </div>
      </div>
    </div>

        <script type="text/javascript">
            $(function () {
                $('#date_sac').datetimepicker({
                  format: 'DD/MM/YYYY',
                    locale: 'pt-BR'
                });
            });
        </script>

  </div>  <!-- Fim Responsive -->
</div>