<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Cadastrar novo cliente</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>clients" ><i class="glyphicon glyphicon-list-alt"></i>   Listar clientes </a>
          </div>

          <h2 class="sub-header"><i class="glyphicon glyphicon-list-alt"></i> Informações do cliente</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>clients/saveclientop" method="post">
              <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" required>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="agreement">Numero do Contrato:</label>
                    <input type="text" class="form-control" id="agreement" name="agreement" placeholder="Contrato">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="phone1">Telefone para contato 1:</label>
                    <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Telefone 1">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="phone2">Telefone para contato 2:</label>
                    <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Telefone 2">
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Ativo </option>
                    <option value="0"> Inativo </option>
                  </select>
                </div>
              </div>

              <div><h2><i class="glyphicon glyphicon-home"></i> Endereço do Cliente</h2></div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="address">Rua / Av / Al</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nome de Rua/Av">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="number">Numero:</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="Informe o numero" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="neighborhood">Bairro:</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Informe o bairro">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Informe a cidade" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Informe o estado" required>
                  </div>
                </div>
              </div>

              <div><h2><i class="glyphicon glyphicon-pencil"></i> Observações:</h2></div>
              <div class="row">
                <div class="col-md-11">
                  <textarea class="form-control" id="observation" name="observation"  rows="4"></textarea><br />
                </div>
              </div>


              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>