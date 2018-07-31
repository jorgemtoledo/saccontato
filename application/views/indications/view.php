<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Formulário de Indicação</h1>

  <div class="table-responsive"> <!-- Inicio Responsive -->

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário de Indicação</h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>indications/saveindication" method="">
              <input type="hidden" id="feedbackindication" name="feedbackindication" value="0">

                <div class="form-group">
                  <div class="col-sm-7">
                    <label for="name_indicated">Nome do Indicado para Contato:</label>
                    <input type="text" class="form-control" id="name_indicated" name="name_indicated" value="<?php echo $result->indname_indicated; ?>"  disabled>
                  </div>

                  <div class="col-sm-4">
                    <label for="phone_indicated">Telefone para Contato:</label>
                    <input type="text" class="form-control" id="phone_indicated" value="<?php echo $result->indphone_indicated; ?>"    disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-7">
                    <label>Cliente que indicou</label>
                    <select id="client_id" name="client_id" class="form-control" disabled>
                      <option value=""> <?php echo $result->clientname; ?> </option>
                      <?php foreach ($clients as $client) { ?>
                      <option value="<?php echo $client->id; ?>"> <?php echo $client->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <a class="btn btn-success" href="<?php echo base_url() ?>indications" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
                        <a href="<?php echo base_url('indications/edit/'.$result->indid); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i>Editar</a>
                    </div>
                </div>
            </form>

          </div>
      </div>
    </div>

  </div>  <!-- Fim Responsive -->
</div>