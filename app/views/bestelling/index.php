<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="<?= URLROOT; ?>/bestelling/geenbestelling">voeg een nieuwe bestelling</a>


    <h2>welkom mederwerker</h2>
    <h3>hier zie je alle klanten die wat besteld hebben</h3>
    <h5>hieronder kan je ze wijzigen of verwijdern</h5>
    <p>Er zijn <?= $data["amountOfbestelling"]; ?> bestellingen</p>
    <table>
        <table border=1>
            <tr>
                <th>personid</th>
                <th>firstname</th>
                <th>infix</th>
                <th>lastname</th>
                <th>Mobile</th>
                <th>bestelling</th>
                <th>datum</th>
                <th>delete</th>
                <th>update</th>
            </tr>
            </thead>
            <tbody>
                <?= $data["rows"]; ?>
            </tbody>
        </table>

</body>

</html>