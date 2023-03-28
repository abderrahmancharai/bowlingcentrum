<?php require APPROOT . '/views/includes/head.php'; ?>
<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/scoring/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="firstname">Naam</label>
                    <input type="text" name="firstname" id="firstname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="infix">Tussenvoegsel</label>
                    <input type="text" name="infix" id="infix">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lastname">Achternaam</label>
                    <input type="text" name="lastname" id="lastname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="points">Aantal punten</label>
                    <input type="text" name="points" id="points">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Datum</label>
                    <input type="text" name="date" id="date">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>

</form>
<a href="<?= URLROOT;?>/homepages/index">home</a>
<?php require APPROOT . '/views/includes/footer.php'; ?>