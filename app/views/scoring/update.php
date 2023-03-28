<?php require APPROOT . '/views/includes/head.php'; ?>
<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/scoring/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="firstname" id="firstname" value="<?= $data["row"]->firstname; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="infix" id="infix" value="<?= $data["row"]->infix; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="lastname" id="lastname" value="<?= $data["row"]->lastname; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="points" id="points" value="<?= $data["row"]->points; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="date" id="date" value="<?= $data["row"]->date; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data["row"]->id; ?>">
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