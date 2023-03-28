<?php require APPROOT . '/views/includes/head.php'; ?>
<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/contactgegevens/update" method="post">
  <table>
    <tbody>
      <tr>
        <td>
          <input type="text" name="Firstname" id="Firstname" value="<?= $data["row"]->Firstname; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="Infix" id="Infix" value="<?= $data["row"]->Infix; ?>">
        </td>
      </tr>
      <tr>
        <td>
         <input type="text" name="lastname" id="lastname" value="<?= $data["row"]->lastname; ?>">
        </td>
      </tr>
      <tr>
        <td>
         <input type="number" name="Email" id="Email" value="<?= $data["row"]->Email; ?>">
        </td>
      </tr>
      <tr>
        <td>
         <input type="number" name="Mobile" id="Mobile" value="<?= $data["row"]->Mobile; ?>">
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