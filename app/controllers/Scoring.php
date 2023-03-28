<?php

class Scoringgit extends Controller
{
    //properties
    private $scoringModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->scoringModel = $this->model('scoringModel');
    }

    public function index()
    {
        $scoring = $this->scoringModel->getscoringgegevens();
        // var_dump($contact);exit();

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

    public function update($id = null) {
    // var_dump($id);exit();
    // var_dump($_SERVER);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->scoringModel->updateScoring($_POST);
      header("Location:" . URLROOT . "/scoring/index");
    } else {
      $row = $this->scoringModel->getSingleScoring($id);
      $data = [
        'title' => '<h1>Update scoring</h1>',
        'row' => $row
      ];
      $this->view("scoring/update", $data);
    }
  }
}