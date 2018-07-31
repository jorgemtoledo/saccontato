    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

          <ul class="nav nav-sidebar">
          
          <?php $level = $this->session->userdata('level');
                // echo $level;
          if ($level == 1) { ;?>
            <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>
            <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>

          <li>
            <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
              <span class="glyphicon glyphicon-cog"></span> CADASTROS
            </a>
          </li>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
              <li><a href="<?php echo base_url(); ?>clients">CLIENTES</a></li>
              <li><a href="<?php echo base_url(); ?>motorcycles">MOTOLÂNCIAS</a></li>
              <li><a href="<?php echo base_url(); ?>ambulances">AMBULÂNCIAS</a></li>
            </ul>
          </div>
          <?php } elseif ($level == 2) { ;?>
          <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
              <span class="glyphicon glyphicon-cog"></span> CADASTROS
            </a>
          </li>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
              <li><a href="<?php echo base_url(); ?>clients">CLIENTES</a></li>
              <li><a href="<?php echo base_url(); ?>motorcycles">MOTOLÂNCIAS</a></li>
              <li><a href="<?php echo base_url(); ?>ambulances">AMBULÂNCIAS</a></li>
            </ul>
          </div>

          <?php } elseif ($level == 3) { ;?>
          <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>treatments">ATENDIMENTO EQUIPE</a></li>

          <?php } elseif ($level == 4) { ;?>
          <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
              <span class="glyphicon glyphicon-cog"></span> CADASTROS
            </a>
          </li>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
            </ul>
          </div>
          <?php } elseif ($level == 5) { ;?>
          <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listsac">ATENDIMENTO SAC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrnc">RNC</a></li>
            <li><a href="<?php echo base_url(); ?>treatments/listrncreturn">FINAL RNC</a></li>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
            </ul>
          </div>
          <?php } elseif ($level == 6) { ;?>
          <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
              <span class="glyphicon glyphicon-cog"></span> CADASTROS
            </a>
          </li>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="<?php echo base_url(); ?>users">USUÁRIOS</a></li>
            </ul>
          </div>

          <?php  } else {  ?>

            <li class="active"><a href="<?php echo base_url(); ?>dashboard">DASHBOARD <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>indications">INDICAÇÃO</a></li>

          <?php } ?>

          </ul>

        </div>