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
                    <label>Motolância:</label><br>
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
                  <div class="col-md-2">
                    <div class="radio">
                    <label for="hour">Ambulância:</label><br>
                      <?php
                            $useractive = 1;
                             if ($useractive == $result->tambulance) {
                              echo "<span class='label label-success'>Sim</span>";
                              } else {
                                  echo "<span class='label label-danger'>Não</span>";
                              }
                      ?>
                    </div>
                  </div>
                  <div class="col-md-3">
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
                    <div class='input-group date' id='data'>
                              <input type='text' class="form-control" id="data" name="date_sac"  value="<?php echo date( "d/m/Y", strtotime( $result->tdate_sac ) ) ?>" maxlength="10" minlength="10" OnKeyPress="formatar('##/##/####', this)"  />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="hour_sac">Hora:</label>
                    <input type="text" class="form-control" id="hour_sac" name="hour_sac" value="<?php echo $result->thour; ?>" >
                  </div>
                  <div class="col-sm-6">
                    <label for="proximity_protected">Grau de Proximidade do protegido:</label>
                    <input type="text" class="form-control" id="proximity_protected" name="proximity_protected" value="<?php echo $result->tproximity_protected; ?>">
                  </div>
                </div>

                <label>Estado do protegido atendido:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="state_protected" name="state_protected"  rows="4"><?php echo $result->tstate_protected; ?></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-2">
                  <label for="value_sac">Nota:</label>
                  <select id="value_sac" name="value_sac" class="form-control" required>
                    <option value=""> Nota </option>
                    <option value="0"<?php echo $result->tvalue_sac ==1?' selected':''; ?>> 1  </option>
                    <option value="1"<?php echo $result->tvalue_sac ==1?' selected':''; ?>> 1  </option>
                    <option value="2"<?php echo $result->tvalue_sac ==2?' selected':''; ?>> 2 </option>
                    <option value="3"<?php echo $result->tvalue_sac ==3?' selected':''; ?>> 3  </option>
                    <option value="4"<?php echo $result->tvalue_sac ==4?' selected':''; ?>> 4  </option>
                    <option value="5"<?php echo $result->tvalue_sac ==5?' selected':''; ?>> 5  </option>
                    <option value="6"<?php echo $result->tvalue_sac ==6?' selected':''; ?>> 6  </option>
                    <option value="7"<?php echo $result->tvalue_sac ==7?' selected':''; ?>> 7  </option>
                    <option value="8"<?php echo $result->tvalue_sac ==8?' selected':''; ?>> 8  </option>
                    <option value="9"<?php echo $result->tvalue_sac ==9?' selected':''; ?>> 9  </option>
                    <option value="10"<?php echo $result->tvalue_sac ==10?' selected':''; ?>> 10  </option>
                  </select>
                </div>
                </div>

                <label>O que faltou para o 10:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description_value" name="description_value"  rows="4"><?php echo $result->tdescription_value; ?></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                  <label for="rnc">O atendimento gerou um RNC?</label>
                  <select id="rnc" name="rnc" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $result->trnc ==1?' selected':''; ?>> Sim  </option>
                    <option value="0"<?php echo $result->trnc ==0?' selected':''; ?>> Nâo  </option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="indication">O senhor(a) indicaria a Quali Salva?:</label>
                  <select id="indication" name="indication" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $result->tindication ==1?' selected':''; ?>> Sim  </option>
                    <option value="0"<?php echo $result->tindication ==0?' selected':''; ?>> Não  </option>
                  </select>
                </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a class="btn btn-danger" href="<?php echo base_url() ?>treatments/listsac" > Cancelar </a>
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