<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>kies hieronder uit om de besteling te wijzigen</h2>

    <table>
        <table border=1>
            <thead>
                <tr>
                    <th>name</th>
                    <th>price</th>
                    <th>beschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?= $data["rows"]; ?>
            </tbody>

</body>

</html>