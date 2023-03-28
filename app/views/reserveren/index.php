<!DOCTYPE html>
<html>
<head>
  <title>Bowling Reservation</title>
  <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>
<body>
  <h1>Bowling Reservation</h1>
  <form method="post" action="/submit">
    <label for="firstname">Naam:</label>
    <input type="text" id="firstname" name="name" required>

    <label for="date">Dag:</label>
    <input type="date" id="date" name="date" required>

    <label for="starttime">Begin tijd:</label>
    <input type="time" id="starttime" name="starttime" required>

    <label for="endtime">Eind tijd:</label>
    <input type="time" id="endtime" name="endtime" required>

    <label for="amountadults">Aantal personen:</label>
    <input type="number" id="amountadults" name="amountadults" min="1" max="6" required>

    <label for="amountchildren">Aantal kinderen:</label>
    <input type="number" id="amountchildren" name="amountchildren" min="0" max="6" required>

    <label for="name">Bestelling:</label>
    <textarea id="name" name="name"></textarea>

    <button type="submit">Reserveren</button>
  </form>


