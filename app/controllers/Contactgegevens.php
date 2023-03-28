<?php

class Contactgegevens extends Controller
{
    //properties
    private $contactModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->contactModel = $this->model('ContactModel');
    }

    public function index()
    {
        $contact = $this->contactModel->getContactgegevens();
        // var_dump($contact);exit();

        $rows = '';

        foreach ($contact as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->firstname</td>
                        <td>$items->infix</td>
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

//     public function update($id = null) {
//     // var_dump($id);exit();
//     // var_dump($_SERVER);exit();
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//       $this->contactModel->updateContact($_POST);
//       header("Location:" . URLROOT . "/contactgegevens/index");
//     } else {
//       $row = $this->contactModel->getSingleContact($id);
//       $data = [
//         'title' => '<h1>Update contactgegevens</h1>',
//         'row' => $row
//       ];
//       $this->view("contactgegevens/update", $data);
//     }
//   }

 public function delete($contactId)
  {
    $contactdelete = $this->contactModel->delete($contactId);
    if ($contactdelete == 0) {
      header("Refresh: 4; URL=" . URLROOT . "/contactgegevens/index");
      echo "er is iets fout gegaan<br>";
      echo "    je word doorgestuurd naar de homepagina";
    } else {
      header("Refresh: 4; URL=" . URLROOT . "/contactgegevens/index");
      echo "contactgegevens is verwijderd";
    }
    // De bestellingen en andere data doorgeven aan de view
    $this->view('contactgegevens/delete');
  }

//    public function delete($id)
//     {
//         $contact = $this->contactModel->deletecontact($id);
//         // var_dump($records);
        
//         $rows = "";
//         foreach ($contact as $item) {
//             $rows .= "<tr>
//                         <td>$item->ID</td>
//                         <td>" . explode(' ', $item->Datum)[0] . "</td>
//                         <td>" . explode(' ', $item->Datum)[1] . "</td>
//                         <td>$item->Naam</td>
//                       </tr>";
//         }

//         $data = [
//             'student' => $contact[0]->Naam,
//             'title' => 'Verwijder contactgegevens',
//             'rows' => $rows,
//         ];

//         $this->view('contactgegevens/delete', $data);
//     }
}
