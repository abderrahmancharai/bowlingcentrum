<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Hieronder staan alle klanten die een reservering hebben gemaakt, maar nog geen bestelling hebben geplaatst.</h3>





    <table>
        <table border=1>
            <tr>

                <th>firstname</th>
                <th>infix</th>
                <th>lastname</th>
                <th>Mobile</th>
                <th>besteling</th>
                <th>toevoegen</th>

            </tr>
            </thead>
            <tbody>
                <?= $data["rows"]; ?>
            </tbody>
</body>

</html>