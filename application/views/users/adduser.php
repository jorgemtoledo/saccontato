<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Cadastrar novo usuário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>users" ><i class="glyphicon glyphicon-list-alt"></i>   Listar usuários </a>
          </div>

          <h2 class="sub-header">Informações do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/saveuser" method="post">
              <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" required>
              </div>

              <div class="row"  >
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="registration">Matricula/Registro:</label>
                    <input type="text" class="form-control" id="registration" name="registration" placeholder="Matricula">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email para acesso." required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha de acesso" required>
                  </div>
                </div>
                <?php $level = $this->session->userdata('level');
                    // echo $level;
                    if ($level == 1) { ;
                ?>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value="0"> Selecione </option>
                    <option value="1"> Administrador </option>
                    <option value="2"> Supervisor Operação </option>
                    <option value="3"> Operador Operação </option>
                    <option value="4"> Supervisor SAC </option>
                    <option value="5"> Operador SAC </option>
                    <option value="6"> Supervisor Indicação </option>
                    <option value="7"> Operador Indicaçao </option>
                  </select>
                </div>
                <?php } elseif ($level == 2) { ;?>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value="0"> Selecione </option>
                    <option value="2"> Supervisor Operação </option>
                    <option value="3"> Operador Operação </option>
                  </select>
                </div>
                <?php } elseif ($level == 4) { ;?>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value="0"> Selecione </option>
                    <option value="4"> Supervisor SAC </option>
                    <option value="5"> Operador SAC </option>
                  </select>
                </div>
                <?php  } else {  ?>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value="0"> Selecione </option>
                    <option value="6"> Supervisor Indicação </option>
                    <option value="7"> Operador Indicaçao </option>
                  </select>
                </div>

                <?php } ?>

                <div class="col-md-3">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Ativo </option>
                    <option value="0"> Inativo </option>
                  </select>
                </div>
              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>