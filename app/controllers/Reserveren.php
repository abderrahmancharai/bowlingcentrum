<?php
class Reserveren extends Controller 
{

    private $reserverenModel;


    public function __construct() 
    {
        $this->reserverenModel = $this->model('ReserverenModel');
    }

    public function index() {
        $data = [
            'title' => "Homepage"
        ];
        $this->view('reserveren/index', $data);
    }

    public function create() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // var_dump($_POST);
      try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->reserverenModel->createReservaties($_POST);
        header("Location:" . URLROOT . "/reserveren/index");
      } catch (PDOException $e) {
        echo "Het inserten van het record is niet gelukt";
        header("Refresh:3; url=" . URLROOT . "/reserveren/index");
      }
    } else {
      $data = [
        'title' => "Voeg een nieuw land in"
      ];

      $this->view("reserveren/index", $data);
    }
  }

  public function reservaties() {
    /**
     * Haal alle instructeurs op uit de model
     */
    $reserveren = $this->reserverenModel->getReservaties();

    /**
     * Maak tabelrijen van de opgehaalde data over de instructeurs
     */
    $rows = '';
    foreach ($reserveren as $value) {
  
      $rows .= "<tr>
                  <td>$value->firstname</td>
                  <td>$value->Date</td>
                  <td>$value->StartTime</td>
                  <td>$value->EndTime</td>
                  <td>$value->AmountAdults</td>
                  <td>$value->AmountChildren</td>
                  <td><a href='" . URLROOT . "/reserveren/delete/$value->Reservationid'>besteling annuleren</a></td>;
                
                </tr>";
    }

    /**
     * Stuur de informatie door naar de view
     */
    $data = [
      'rows' => $rows,
      'title' => 'Reserveringen'
    ];

        $this->view('reserveren/reservaties', $data);
    }
    
    public function delete($Reservationid) {
    /**
     * Haal alle instructeurs op uit de model
     */

     $delete = $this->reserverenModel->delete($Reservationid);
    
        $this->view('reserveren/delete');


    }

}
