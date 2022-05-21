<?php 
if (isset($_POST['submit'])) { 
if(isset($_POST['msg']) and isset($_POST['time']) and isset($_POST['loops']) and isset($_POST['loop_every']) and isset($_POST['user'])) {
  $title = $_POST['title']; 
  $msg = $_POST['msg']; 
  $time = date('Y-m-d H:i:s'); 
  $loop= $_POST['loops']; 
  $loop_every=$_POST['loop_every']; 
  $user = $_POST['user']; 
  $isSaved = $push->saveNotification($title, $msg,$time,$loop,$loop_every,$user);
  if($isSaved) {
      echo '* Guardar nueva notificación de éxito';
  } else {
      echo 'error guardando informacion';
  }
} else {
  echo '* completado el parámetro de arriba';
}
} 
?>
<h3>Notificaciones Lista:</h3>
<table class="table">
<thead>
<tr>
  <th>No</th>
  <th>Siguiente horario</th>
  <th>Titulo</th>
  <th>Mensaje</th>
  <th>permanece</th>
  <th>Usuario</th>
</tr>
</thead>
<tbody>
<?php $a =1; 
$notifList = $push->listNotification(); 
foreach ($notifList as $key) {
?>
<tr>
  <td><?php echo $a ?></td>
  <td><?php echo $key['notif_time'] ?></td>
  <td><?php echo $key['title'] ?></td>
  <td><?php echo $key['notif_msg'] ?></td>
  <td><?php echo $key['notif_loop']; ?></td>
  <td><?php echo $key['username'] ?></td>
</tr>
<?php $a++; } ?>
</tbody>
</table>
</div>    