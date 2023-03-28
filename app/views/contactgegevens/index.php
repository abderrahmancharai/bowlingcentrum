<?php require APPROOT . '/views/includes/head.php';
  echo $data["title"];
?>
<a href="<?=URLROOT;?>/contactgegevens/create">Nieuw record</a>
<table>
  <thead>
    <th>id</th>
    <th>Firstname</th>
    <th>Infix</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>update</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?=$data['rows']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>
