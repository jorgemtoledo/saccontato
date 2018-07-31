<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>Sistema SAC - CONTATO CONTACT CENTER</title>

  <!-- Inicio Links -->
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
  <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <! Fim Links -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>



  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SAC - CONTATO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user suc"></i>
                        <?php $id = $this->session->userdata('name');
                              echo $id;
                         ?>

                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <?php $level = $this->session->userdata('level');
                        // echo $level;
                        if ($level == 1) { ;?>

                        <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>
                        <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>
                        <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
                        <li><a href="<?php echo base_url(); ?>clients">CLIENTES</a></li>
                        <li><a href="<?php echo base_url(); ?>motorcycles">MOTOLÂNCIAS</a></li>
                        <li><a href="<?php echo base_url(); ?>ambulances">AMBULÂNCIAS</a></li>

                        <?php } elseif ($level == 2) { ;?>
                        <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>
                        <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
                        <li><a href="<?php echo base_url(); ?>clients">CLIENTES</a></li>
                        <li><a href="<?php echo base_url(); ?>motorcycles">MOTOLÂNCIAS</a></li>
                        <li><a href="<?php echo base_url(); ?>ambulances">AMBULÂNCIAS</a></li>

                        <?php } elseif ($level == 3) { ;?>
                        <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>

                        <?php } elseif ($level == 4) { ;?>
                        <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>
                        <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>

                        <?php } elseif ($level == 5) { ;?>
                        <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>

                        <?php } elseif ($level == 6) { ;?>
                        <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>
                        <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>

                        <?php } else {  ?>

                        <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>

                        <?php } ?>

                    <li class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() ?>dashboard/logout"><i class="glyphicon glyphicon-off"></i>Sair</a></li>
                    </ul>
            </li>


          </ul>


        </div>
      </div>
    </nav>