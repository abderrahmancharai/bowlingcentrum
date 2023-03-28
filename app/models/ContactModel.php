<?php
  class ContactModel {
    // Properties, fields
    private $db;
    public $helper;

    public function __construct() {
      $this->db = new Database();
    //   $this->helper = new SqlHelper();
    }

    public function getContactgegevens() {
     

    $sql = "SELECT person.Id,
                person.firstname, 
				user.infix,
			person.lastname,
		    contact.Email,
		    contact.Mobile
            from person
            inner join  contact
            on contact.personId =person.Id
            inner join  user
            on user.personId =person.Id";
        
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

     public function updateContact($post) {
      try {
        $this->db->dbHandler->beginTransaction();

        $this->db->query("SELECT person.Id,
                person.firstname, 
				user.infix,
			person.lastname,
		    contact.Email,
		    contact.Mobile
            from person
            inner join  contact
            on contact.personId =person.Id
            inner join  user
            on user.personId =person.Id");

        return $this->db->execute();
      } catch(PDOException $e) {
        echo $e->getMessage() . "Rollback";
        $this->db->dbHandler->rollBack();
      }
    }

    // public function deletecontact($id) {
    //   $this->db->query("DELETE FROM contact WHERE `contact`.`Id`");
    //   $this->db->bind("Id", $id, PDO::PARAM_INT);
    //   return $this->db->execute();
    // }

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