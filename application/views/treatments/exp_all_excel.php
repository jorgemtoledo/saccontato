<table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
  <thead>
    <tr>
      <th><h6>Numero</h6></th>
      <th><h6>Protegido:</h6></th>
      <th><h6>Data</h6></th>
      <th><h6>Hora</h6></th>
      <th><h6>Atendimento</h6></th>
      <th><h6>Atendente</h6></th>
      <th><h6>Aprovado</h6></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($list_treatments as $treatment) { ?>
    <tr>
      <td><h6><?php echo $treatment->tid; ?></h6></td>
      <td><h6><?php echo $treatment->cname; ?></h6></td>
      <td><h6><?php   $timestamp = strtotime(($treatment->tdate));
      echo date('d/m/y', $timestamp);
      ?></h6>
      </td>
      <td><h6><?php echo $treatment->thour; ?></h6></td>
      <td><h6>
      <?php
      switch ($treatment->ttype_care) {
        case '1':
          echo 'Area Protegida';
        break;
        case '2':
          echo 'Varejo';
        break;
        case '3':
          echo 'Remocao';
        break;
      }
      ?></h6></td>
      <td><h6><?php echo $treatment->uname; ?></h6></td>
      <td class="text-center"><h6>
      <?php
      $yessac = 1;
      if ($yessac == $treatment->tapproved) {
      echo "<span class='label label-success'>Sim</span>";
      } else {
      echo "<span class='label label-danger'>Nao</span>";
      }
      ?></h6>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Script HTML to EXCEL -->
<?php
$arquivo = "exp_all_excel.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->