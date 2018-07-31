<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Cadastrar novo cliente</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>clients" ><i class="glyphicon glyphicon-list-alt"></i>   Listar clientes </a>
          </div>

          <h2 class="sub-header"><i class="glyphicon glyphicon-list-alt"></i> Informações do cliente</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>clients/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $clients[0]->id; ?>">
              <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" value="<?php echo $clients[0]->name; ?>"  required>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF" value="<?php echo $clients[0]->cpf; ?>"  required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="agreement">Numero do Contrato:</label>
                    <input type="text" class="form-control" id="agreement" name="agreement" placeholder="Contrato" value="<?php echo $clients[0]->agreement; ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="phone1">Telefone para contato 1:</label>
                    <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Telefone 1" value="<?php echo $clients[0]->phone1; ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="phone2">Telefone para contato 2:</label>
                    <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Telefone 2" value="<?php echo $clients[0]->phone2; ?>" >
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $clients[0]->active==1?' selected':''; ?>> Ativo </option>
                    <option value="0"<?php echo $clients[0]->active==0?' selected':''; ?>> Inativo </option>
                  </select>
                </div>
              </div>

              <div><h2><i class="glyphicon glyphicon-home"></i> Endereço do Cliente</h2></div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="address">Rua / Av / Al</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nome de Rua/Av" value="<?php echo $clients[0]->address; ?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="number">Numero:</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="Informe o numero" value="<?php echo $clients[0]->number; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="neighborhood">Bairro:</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Informe o bairro" value="<?php echo $clients[0]->neighborhood; ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Informe a cidade" value="<?php echo $clients[0]->city; ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Informe o estado" value="<?php echo $clients[0]->state; ?>"  required>
                  </div>
                </div>
              </div>

              <div><h2><i class="glyphicon glyphicon-pencil"></i> Observações:</h2></div>
              <div class="row">
                <div class="col-md-11">
                  <textarea class="form-control" id="observation" name="observation" rows="4"> <?php echo $clients[0]->observation; ?> </textarea><br />
                </div>
              </div>


              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>