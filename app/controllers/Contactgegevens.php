<?php

class Contactgegevens extends Controller
{
    //properties
    private $contactModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->contactModel = $this->model('Country');
    }

    public function index()
    {
        $records = $this->contactModel->getContactgegevens();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Firstname</td>
                        <td>$items->Infix</td>
                        <td>$items->lastname</td>
                        <td>$items->Email</td>
                        <td>$items->Mobile</td>
                        <td>
                            <a href='" . URLROOT . "/contactgegevens/update/$items->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/contactgegevens/delete/$items->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht contactgegevens",
            'rows' => $rows
        ];
        $this->view('contactgegevens/index', $data);
    }

    public function update($id = null) {
    // var_dump($id);exit();
    // var_dump($_SERVER);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->contactModel->updateContact($_POST);
      header("Location:" . URLROOT . "/contactgegevens/index");
    } else {
      $row = $this->contactModel->getSingleContact($id);
      $data = [
        'title' => '<h1>Update contactgegevens</h1>',
        'row' => $row
      ];
      $this->view("contactgegevens/update", $data);
    }
  }

  public function delete($id) {
    $this->contactModel->deleteCountry($id);

    $data =[
      'deleteStatus' => "Het record met id = $id is verwijdert"
    ];
    $this->view("countries/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/countries/index");
  }

  public function create() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // var_dump($_POST);
      try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->contactModel->createCountry($_POST);
        header("Location:" . URLROOT . "/countries/index");
      } catch (PDOException $e) {
        echo "Het inserten van het record is niet gelukt";
        header("Refresh:3; url=" . URLROOT . "/countries/index");
      }
    } else {
      $data = [
        'title' => "Voeg een nieuw land in"
      ];

      $this->view("countries/create", $data);
    }
  }

  public function scanCountry() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $record = $this->contactModel->getSingleCountryByName($_POST["country"]);

      $rowData = "<tr>
                    <td>$record->id</td>
                    <td>$record->name</td>
                    <td>$record->capitalCity</td>
                    <td>$record->continent</td>
                    <td>$record->population</td>
                  </tr>";

      $data = [
        'title' => 'Dit is het gescande land',
        'rowData' => $rowData
      ];

      $this->view('countries/scanCountry', $data);
    } else {
      $data = [
        'title' => 'Scan het land',
        'rowData' => ""
      ];

      $this->view('countries/scanCountry', $data);
    }
  }
}
