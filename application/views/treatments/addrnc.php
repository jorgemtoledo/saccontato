<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Atendimento ao cliente</h1>

  <div class="table-responsive"> <!-- Inicio Responsive -->

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário Atendimento Equipe</h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="" method="">

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

              <form class="form-horizontal" role="form" action="" method="">
                <input type="hidden" id="id" name="id" value="<?php echo $result->tid; ?>">
                <div><label><h2>Número do atendimento: <?php echo $result->tid; ?></h2></label></div>
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


            </form>

          </div>
      </div>
    </div>


      <!-- Atendimento RNC - POS Vendas -->

    <div class="col-md-12">
      <div class="panel panel-warning">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-copy"></i> RNC </h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>treatments/savernctreatment" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $result->tid; ?>">
                <div><label><h2>Número do atendimento: <?php echo $result->tid; ?></h2></label></div>
                <div class="form-group">

                  <div class="col-sm-11">
                    <label for="complaint_rnc">Reclamação:</label>
                    <input type="text" class="form-control" id="complaint_rnc" name="complaint_rnc" placeholder="Informe" required>
                  </div>
                  <div class="col-sm-11">
                    <label for="suggestion_rnc">Sugestão:</label>
                    <input type="text" class="form-control" id="suggestion_rnc" name="suggestion_rnc" placeholder="Informe" required>
                  </div>
                </div>

                <label>Parecer do nosso atendente das descrições acima:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description_rnc" name="description_rnc"  rows="4" required></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                  <label for="sector_rnc">Setores envolvidos:</label>
                  <select id="sector_rnc" name="sector_rnc" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Operacional </option>
                    <option value="2"> Cobrança </option>
                    <option value="3"> QualiClinica </option>
                    <option value="4"> Financeiro </option>
                    <option value="5"> Comercial </option>
                    <option value="6"> Eventos </option>
                  </select>
                </div>
                <div class="col-sm-6">
                    <label for="other_sector">Outro setor</label>
                    <input type="text" class="form-control" id="other_sector" name="other_sector" placeholder="Informe" >
                </div>
                </div>

                <div class="form-group">
                <div class="col-sm-11 text-center">
                <div><label><h3>Levantamento das informações por setor:</h3></label></div>
                </div>
                </div>

                <div class="form-group">
                <div class="col-sm-4">
                    <label for="responsible_operational">Responsavel Operacional</label>
                    <input type="text" class="form-control" id="responsible_operational" name="responsible_operational" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_operational">Descrição Operacional</label>
                    <input type="text" class="form-control" id="description_operational" name="description_operational" placeholder="Informe" >
                </div>
                <div class="col-sm-4">
                    <label for="responsible_collection">Responsavel Cobrança</label>
                    <input type="text" class="form-control" id="responsible_collection" name="responsible_collection" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_collection">Descrição Cobrança</label>
                    <input type="text" class="form-control" id="description_collection" name="description_collection" placeholder="Informe" >
                </div>

                <div class="col-sm-4">
                    <label for="responsible_quality">Responsavel QualiClinica</label>
                    <input type="text" class="form-control" id="responsible_quality" name="responsible_quality" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_quality">Descrição QualiClinica</label>
                    <input type="text" class="form-control" id="description_quality" name="description_quality" placeholder="Informe" >
                </div>

                <div class="col-sm-4">
                    <label for="responsible_financial">Responsavel Financeiro</label>
                    <input type="text" class="form-control" id="responsible_financial" name="responsible_financial" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_financial">Descrição Financeiro</label>
                    <input type="text" class="form-control" id="description_financial" name="description_financial" placeholder="Informe" >
                </div>

                <div class="col-sm-4">
                    <label for="responsible_commercial">Responsavel Comercial</label>
                    <input type="text" class="form-control" id="responsible_commercial" name="responsible_commercial" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_commercial">Descrição Comercial</label>
                    <input type="text" class="form-control" id="description_commercial" name="description_commercial" placeholder="Informe" >
                </div>

                <div class="col-sm-4">
                    <label for="responsible_event">Responsavel Eventos</label>
                    <input type="text" class="form-control" id="responsible_event" name="responsible_event" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_event">Descrição Eventos</label>
                    <input type="text" class="form-control" id="description_event" name="description_event" placeholder="Informe" >
                </div>

                <div class="col-sm-4">
                    <label for="responsible_other">Responsavel Outros</label>
                    <input type="text" class="form-control" id="responsible_other" name="responsible_other" placeholder="Informe" >
                </div>
                <div class="col-sm-7">
                    <label for="description_other">Descrição Outros</label>
                    <input type="text" class="form-control" id="description_other" name="description_other" placeholder="Informe" >
                </div>


                </div>

                <label>Informações colhidas a respeito de RNC:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="information_rnc" name="information_rnc"  rows="4" required></textarea><br />
                  </div>
                </div>

                <label>Ações corretivas:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="corrective_rnc" name="corrective_rnc"  rows="4" required></textarea><br />
                  </div>
                </div>

                <label>Ações preventivas:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="preventive_rnc" name="preventive_rnc"  rows="4" required></textarea><br />
                  </div>
                </div>

                <label>Conclusão:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="conclusion_rnc" name="conclusion_rnc"  rows="4" required></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>

          </div>
      </div>
    </div>

  </div>  <!-- Fim Responsive -->
</div>