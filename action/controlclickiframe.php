<link rel="stylesheet"  type="text/css" href="<?php echo Arcckif; ?>/css/bootstrap.min.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="<?php echo Arcckif; ?>/js/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet"  type="text/css" href="<?php echo Arcckif; ?>/js/DataTables-1.10.20/css/dataTables.bootstrap4.css">
    <style type="text/css">
      table tr {
        text-align: center;
      }
    </style>
    <?php
        global $wpdb;
        $contacip  = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "click_contacclickiframe");
     ?>
    <br>
    <br>
    <div class="container">
<div class="row">
      <div class="col-lg-12">
       <div class="table-responsive">
        <table id="datatablecontrolclickiframe" class="table table-striped table-bordered"  style="width:100%">
         <thead>
          <tr>
           <th scope="col">Ip</th>
           <th scope="col">Pagina</th>
           <th scope="col">Fecha</th>
           <th scope="col">hora</th>
           <th scope="col">Eliminar</th>
         </tr>
       </thead>
       <tbody id="listbusqueda">
        <?php
        foreach ($contacip as $contaclist) {
         ?>
         <tr id="listclick">
          <td><?php echo $contaclist->ip; ?></td>
          <td><?php echo '<a href="'.$contaclist->pagina.'" target="_blank">'.$contaclist->pagina.'</a>'; ?></td>
          <td><?php echo $contaclist->fecha; ?></td>
          <td><?php echo $contaclist->hora; ?></td>
          <td><span data-nameclick='<?php echo $contaclist->ip; ?>' class='text-danger btn deletclick glyphicon glyphicon-trash' data-idclick='<?php echo $contaclist->id_clikifra; ?>' id='deletclick<?php echo $contaclist->id_clikifra; ?>' title='Eliminar' data-toggle='modal' data-target='#Modaldeletclick'></span>
          	<span data-toggle='modal' data-target='#Modaldeletclick'></span></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="Modaldeletclick" role="dialog">
  <div class="modal-dialog modal-md">
   <div class="modal-content">
    <div class="modal-header">

     <h4 class="modal-title" id="titlemsjdeletclick"></h4>
   </div>
   <div class="modal-body text-center" id="imp1">
     <p id="mensajedeletclick"></p>
   </div>
   <div class="modal-footer">
     <button type="button" class="close mr-5" data-dismiss="modal">Cerrar</button>
     <div id="btnmodaldeletclick"></div>
   </div>
 </div>
</div>
</div>
<script type="text/javascript" src="<?php echo Arcckif; ?>js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo Arcckif; ?>js/maindatatable.js"></script>

