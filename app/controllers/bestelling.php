<?php

class bestelling extends Controller
{
    // Properties, field
    private $bestellingModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->bestellingModel = $this->model('bestellingModel'); // Model initialisatie
    }
    public function index()
    { // Bestellingen ophalen via model
        $bestelling = $this->bestellingModel->getbestellingen();
        $rows = '';
        // De volgende code maakt een tabelrij voor elke bestelling en toont de details van de bestelling in de juiste kolommen. en ver
        //zorgt er ook voor dat je kan update en delete
        foreach ($bestelling as $value) {
            $packageperreservationId = $value->packageperreservationId;
            $ReservationId = $value->ReservationId;
            $rows .= "<tr>
                  <td>$value->personid</td>
                  <td>$value->firstname</td>
                  <td>$value->infix</td>
                  <td>$value->lastname</td>
                  <td>$value->Mobile</td>
                  <td>$value->name</td>
                    <td>$value->Date</td>
                    <td><a href='" . URLROOT . "/bestelling/delete/$packageperreservationId'>delete</a></td>
                    <td><a href='" . URLROOT . "/bestelling/beschikbarebestelling/" . $ReservationId . "/" . $packageperreservationId . "'>update</a></td>;
                </tr>";
        }  // De bestellingen en andere data doorgeven aan de view
        $data = [
            'title' => 'bestelling',
            'amountOfbestelling' => sizeof($bestelling),
            'rows' => $rows
        ];
        $this->view('bestelling/index', $data);
    }
    public function beschikbarebestelling($ReservationId, $packageperreservationId)
  { // Haalt alle beschikbare bestellingen op vanuit de database via de getallbeschibarebestellingen methode van de bestellingModel class.
    $beschibarebestelling = $this->bestellingModel->getallbeschibarebestellingen($ReservationId);

    $rows = '';
    foreach ($beschibarebestelling as $value) {
      $packageoptionsId = $value->packageoptionsId;

      $rows .= "<tr>
                  <td>$value->name</td>
                  <td>$value->price</td>
                  <td>$value->Omschrijving</td>
                  <td><a href='" . URLROOT . "/bestelling/update/" . $packageoptionsId . "/" . $packageperreservationId . "'>update</a></td>    ;
                </tr>";
    }
    $data = [
      'title' => 'bestelling',
      'rows' => $rows,

    ];
    $this->view('bestelling/beschikbarebestelling', $data);
  }

  public function update($packageoptionsId, $packageperreservationId)
  {
    $bestelling = $this->bestellingModel->update($packageoptionsId, $packageperreservationId);
    header("Refresh: 3; URL=" . URLROOT . "/bestelling/index");
    echo "bestelling is geupdate";
    $this->view('bestelling/update');
  }

}
