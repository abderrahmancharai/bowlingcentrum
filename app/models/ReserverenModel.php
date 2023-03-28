<?php

class ReserverenModel {
  private $db;
  public $helper;

  public function __construct() {
    $this->db = new Database();
  }

  public function createReservatie($post) {
      $this->db->query("INSERT INTO Reservation(
                                    id
                                    firstname, 
                                    date, 
                                    starttime, 
                                    amountadults, 
                                    amountchildren, 
                                    Lanes,

                                    name) 
                        VALUES :id
                              :firstname, 
                              :date, 
                              :starttime, 
                              :amountadults, 
                              :amountchildren, 
                              :PackageOptions.name
                              :lane.Lanes,

                              )")
;

$this->db->bind(':id', NULL, PDO::PARAM_INT);
$this->db->bind(':firstname', $post["firstname"], PDO::PARAM_STR);
$this->db->bind(':date', $post["date"], PDO::PARAM_STR);
$this->db->bind(':starttime', $post["starttime"], PDO::PARAM_STR);
$this->db->bind(':amountadults', $post["amountadults"], PDO::PARAM_INT);
$this->db->bind(':amountchildren', $post["amountchildren"], PDO::PARAM_STR);
$this->db->bind(':package_id', $post["package_id"], PDO::PARAM_INT);

return $this->db->execute();

    }
}
