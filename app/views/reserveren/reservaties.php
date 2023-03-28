<?php 
    require APPROOT  .'/views/includes/head.php';
 ?>

 <h3><u><?= $data['title']; ?></u></h3><br>

<table border=1>
    <thead>
        <th>Voornaam</th>
        <th>Dag</th>
        <th>Begin tijd</th>
        <th>Eind tijd</th>
        <th>Aantal personen</th>
        <th>Aantal kinderen</th>
        <th>Bestelling</th>
        <th>Annuleren</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>