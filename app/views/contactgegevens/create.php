<?php require APPROOT . '/views/includes/head.php'; ?>
<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/contactgegevens/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="firstname">firstname</label>
                    <input type="text" name="firstname" id="firstname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="infix">infix</label>
                    <input type="text" name="infix" id="infix">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lastname">lastname</label>
                    <input type="text" name="lastname" id="lastname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Mobile">Mobile</label>
                    <input type="number" name="Mobile" id="Mobile">
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