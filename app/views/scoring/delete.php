<?php  require APPROOT . '/views/includes/head.php'; ?>

<h1 id="test"><?= $data['deleteStatus']; ?></h1>
<td><a href='" . URLROOT . "/scoring/delete/$scoreId'>delete</a></td>

<a href="<?= URLROOT;?>/homepages/index">home</a>
<?php require APPROOT . '/views/includes/footer.php'; ?>