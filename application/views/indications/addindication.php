<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Formulário de Indicação</h1>

  <div class="table-responsive"> <!-- Inicio Responsive -->

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário de Indicação</h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>indications/saveindication" method="post">
              <input type="hidden" id="feedbackindication" name="feedbackindication" value="0">
              <input type="hidden" id="signed_contract" name="signed_contract" value="0">

                <div class="form-group">
                  <div class="col-sm-7">
                    <label for="name_indicated">Nome do Indicado para Contato:</label>
                    <input type="text" class="form-control" id="name_indicated" name="name_indicated" placeholder="Informe o nome" required>
                  </div>

                  <div class="col-sm-4">
                    <label for="phone_indicated">Telefone para Contato:</label>
                    <input type="text" class="form-control" id="phone_indicated" name="phone_indicated" placeholder="Informe o telefone" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-7">
                    <label>Cliente que indicou</label>
                    <select id="client_id" name="client_id" class="form-control">
                      <option value=""> Selecione </option>
                      <?php foreach ($clients as $client) { ?>
                      <option value="<?php echo $client->id; ?>"> <?php echo $client->name; ?> </option>
                      <?php } ?>
                    </select>
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