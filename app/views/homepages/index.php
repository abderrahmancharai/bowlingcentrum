<?php require APPROOT . '/views/includes/head.php'; ?>
<p>
<h3><?= $data["title"]; ?></h3>
</p>
<a href="<?=URLROOT;?>/students/index">Lessen student</a> |
<a href="<?=URLROOT;?>/students/annuleerLes">Lessen Annuleren</a> |
<a href="<?=URLROOT;?>/scoring/index">Instructeurs in dienst</a>
<?php require APPROOT . '/views/includes/footer.php'; ?>