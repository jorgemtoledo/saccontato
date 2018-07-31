<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Cadastrar nova Ambulância</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>ambulances" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Ambulâncias</a>
          </div>

          <h2 class="sub-header"><i class="glyphicon glyphicon-list-alt"></i> Dados</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>ambulances/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $ambulances[0]->id; ?>">
              <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" value="<?php echo $ambulances[0]->name; ?>" required>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="model">Modelo:</label>
                  <input type="text" class="form-control" id="model" name="model" placeholder="Informe o modelo" value="<?php echo $ambulances[0]->model; ?>" required>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="mark">Fabricante:</label>
                    <input type="text" class="form-control" id="mark" name="mark" placeholder="Informe o fabricante " value="<?php echo $ambulances[0]->mark; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="year">Ano:</label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Ano de fabricação" value="<?php echo $ambulances[0]->year; ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="license_plate">Placa:</label>
                    <input type="text" class="form-control" id="motorcycle_plate" name="license_plate" placeholder="Placa do veiculo" value="<?php echo $ambulances[0]->license_plate; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $ambulances[0]->active==1?' selected':''; ?>> Ativo </option>
                    <option value="0"<?php echo $ambulances[0]->active==0?' selected':''; ?>> Inativo </option>
                  </select>
                </div>
              </div>

              <div><h2><i class="glyphicon glyphicon-pencil"></i> Observações:</h2></div>
              <div class="row">
                <div class="col-md-11">
                  <textarea class="form-control" id="description" name="description"  rows="4"> <?php echo $ambulances[0]->description; ?> </textarea><br />
                </div>
              </div>


              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>