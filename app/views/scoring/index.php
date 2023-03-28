<?php require APPROOT . '/views/includes/head.php';
  echo $data["title"];
?>
<a href="<?=URLROOT;?>/scoring/create">Nieuw score</a>
<table>
    <thead>
        <th>id</th>
        <th>Naam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>points</th>
        <th>date</th>
        <th>update</th>
        <th>delete</th>
    </thead>
    <tbody>
        <?=$data['scoring']?>
    </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>