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


     public function getReservaties() {


     $sql =    "SELECT   PERS.firstname 
				,PERS.Id as personId
                        ,RESE.Date
                        ,RESE.StartTime
                        ,RESE.EndTime
                        ,RESE.AmountAdults
                        ,RESE.AmountChildren
                        ,PAPE.Id as PackagePerReservationId
				,PAOP.Id as PackageOptionsId
				,PAOP.name
                        
                        from person AS PERS
                        
                        inner join Reservation AS RESE
				on RESE.PersonId = PERS.Id
                        
                        inner join PackagePerReservation AS PAPE
				on PAPE.ReservationId = RESE.Id
                        
                        inner join PackageOptions AS PAOP
				on PAOP.Id = PAPE.PackageOptionsId
							
                        where 		RESE.Id = 1";

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
}
