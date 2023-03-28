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

}

?>