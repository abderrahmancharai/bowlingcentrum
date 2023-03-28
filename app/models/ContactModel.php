<?php
  class ContactModel {
    // Properties, fields
    private $db;
    public $helper;

    public function __construct() {
      $this->db = new Database();
    //   $this->helper = new SqlHelper();
    }

    public function getSingleContact($id) 
    {
      $this->db->query("SELECT   PERS.Id AS PersonId
			                    ,PERS.firstname
			                    ,PERS.infix
			                    ,PERS.lastname
			                    ,CONT.Email
			                    ,CONT.Mobile
                        FROM 	 person AS PERS

                        INNER JOIN  contact AS CONT
		                        ON 	CONT.personId = PERS.Id
                                WHERE		PERS.Id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getContactgegevens() {
     

    $sql = "SELECT person.Id,
                person.firstname, 
				person.infix,
			person.lastname,
		    contact.Email,
		    contact.Mobile
            from person
            inner join  contact
            on contact.personId =person.Id";
        
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

     public function updateContact($post) {
      try {
        // $this->db->dbHandler->beginTransaction();

        $this->db->query(" UPDATE person
                              SET firstname = :firstname,
                                  infix = :infix,
                                  lastname = :lastname
                            WHERE person.Id = :Id;");

        $this->db->bind(':Id', $post["id"], PDO::PARAM_INT);
        $this->db->bind(':firstname', $post["firstname"], PDO::PARAM_STR);
        $this->db->bind(':infix', $post["infix"], PDO::PARAM_STR);
        $this->db->bind(':lastname', $post["lastname"], PDO::PARAM_STR);
           

        $this->db->execute();

        $this->db->query(" UPDATE contact
                              SET Email = :Email,
                                  Mobile = :Mobile
                            WHERE contact.Id = :Id;");

        $this->db->bind(':Id', $post["id"], PDO::PARAM_INT);
        $this->db->bind(':Email', $post["Email"], PDO::PARAM_INT);
        $this->db->bind(':Mobile', $post["Mobile"], PDO::PARAM_INT);

         $this->db->execute();

      } catch(PDOException $e) {
        echo $e->getMessage() . "Rollback";
        // $this->db->dbHandler->rollBack();
      }
    }
    
    public function delete($contactId)
    {

        $sql = "DELETE FROM contact 
                        WHERE contact.Id = :contactId;";
        $this->db->query($sql);
        $this->db->bind(':contactId', $contactId, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    }

}

?>