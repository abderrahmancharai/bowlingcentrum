<?php

class Scoring extends Controller
{
    //properties
    private $scoringModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->scoringModel = $this->model('ScoringModel');
    }

    public function index()
    {
        $scoring = $this->scoringModel->getscoring();
        //  var_dump($scoring);exit();

        $rows = '';

        foreach ($scoring as $value)
        {
            $rows .= "<tr>
                <td>$value->id</td>
                <td>$value->firstname</td>
                <td>$value->infix</td>
                 <td>$value->lastname</td>
                 <td>$value->points</td>
                <td>$value->date</td>
                        <td>
                            <a href='" . URLROOT . "/scoring/update/$value->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/scoring/delete/$value->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht scoring",
            'rows' => $rows
        ];
        $this->view('scoring/index', $data);
    }

    public function update($id = null) 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->scoringModel->updatescoring($_POST);
            header("Location:" . URLROOT . "/scoringgegevens/index");
        } 
        else 
        {
            $row = $this->scoringModel->getSinglescoring($id);

            // var_dump($row);
            // exit();
            
            $data = ['title' => '<h1>Update scoringgegevens</h1>', 'row' => $row];
            $this->view("scoringgegevens/update", $data);
        }
    } 

  public function create() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //var_dump($_POST);exit();
      try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->scoringModel->createscoring($_POST);exit();
        header("Location:" . URLROOT . "/scoring/index");
      } catch (PDOException $e) {
        echo "Het inserten van het record is niet gelukt";
        header("Refresh:3; url=" . URLROOT . "/scoring/index");
      }
    } else {
      $data = [
        'title' => "Voeg je score in"
      ];

      $this->view("scoring/create", $data);
    }
  }


public function delete($scoringId)
  {
    $scoringModel = $this->scoringModel->delete($scoringId);
    if ($scoringdelete = 0) {
      header("Refresh: 4; URL=" . URLROOT . "/scoring/index");
      echo "er is iets fout gegaan<br>";
      echo "    je word doorgestuurd naar de homepagina";
    } else {
      header("Refresh: 4; URL=" . URLROOT . "/scoring/index");
      echo "scoring is verwijderd";
    }
    // De bestellingen en andere data doorgeven aan de view
    $this->view('scoring/delete');
  }
  
}