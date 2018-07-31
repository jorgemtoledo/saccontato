<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Editar usuário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>users" ><i class="glyphicon glyphicon-list-alt"></i>   Listar usuários </a>
          </div>

          <h2 class="sub-header">Informações do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $users[0]->id; ?>">
              <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" value="<?php echo $users[0]->name; ?>" required>
              </div>

              <div class="row"  >
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF" value="<?php echo $users[0]->cpf; ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="registration">Matricula/Registro:</label>
                    <input type="text" class="form-control" id="registration" name="registration" placeholder="Matricula" value="<?php echo $users[0]->registration; ?>">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email para acesso." value="<?php echo $users[0]->email; ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="button" class="btn btn-default btn-block" value="Editar Senha" data-toggle="modal" data-target="#myModal">
                  </div>
                </div>
                
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value="0"> Selecione </option>
                    <option value="1" <?php echo $users[0]->level==1?' selected':''; ?>> Administrador </option>
                    <option value="2" <?php echo $users[0]->level==2?' selected':''; ?>> Analista </option>
                    <option value="3" <?php echo $users[0]->level==3?' selected':''; ?>> Operador </option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="active">Nivel de acesso:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $users[0]->active==1?' selected':''; ?>> Ativo </option>
                    <option value="0"<?php echo $users[0]->active==0?' selected':''; ?>> Inativo </option>
                  </select>
                </div>
              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
              </div>
              <div class="modal-body">

                <form class="form-group" action="<?php echo base_url() ?>users/save_edit_password" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $users[0]->id; ?>">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="password">Nova Senha:</label>
                      <input type="password" name="password" id"password" onkeyup="checarSenha()" class="form-control" required>
                    </div>
                    <div class="col-md-12 form-group">
                      <div id="divcheck">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="sendpassword" disabled>Cadastrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            $("#password").keyup(checkPasswordMatch);
          });
          function checarSenha(){
            var newPassword = $("#password").val();
            if(newPassword == ''){
              document.getElementById("sendpassword").disabled = true;
            } else {
              $("#divcheck").html("<span style='color: green'>Nova senha!</span>");
              document.getElementById("sendpassword").disabled = false;
            }
          }
        </script>