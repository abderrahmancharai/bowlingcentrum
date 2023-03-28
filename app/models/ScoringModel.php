<?php
  class Scoring {
    // Properties, fields
    private $db;
    public $helper;

    public function __construct() {
      $this->db = new Database();
    //   $this->helper = new SqlHelper();
    }

    public function getScoring() {

        $sql = "SELECT person.firstname,
        user.infix,
       person.lastname,
    scoreperperson.Id,
    score.points,
    score.date,
    score.Id,
    scoreperperson.ScoreId
    from person
     
     
      inner join  contact
    on contact.personId =person.Id
    
    inner join  user
    on user.personId =person.Id
    
      inner join  scoreperperson
    on scoreperperson.PersonId = Person.Id
    
      inner join  score
    on scoreperperson.ScoreId = Score.Id";

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;

    }
}