<?php
  class ScoringModel {
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


public function createScoring($post) {
    var_dump($post);
    
    // $this->db->query("INSERT person.firstname,
    // user.infix,
    // person.lastname,
    // scoreperperson.Id,
    // score.points,
    // score.date,
    // score.Id,
    // scoreperperson.ScoreId
    // from person
    
    
    // inner join  contact
    // on contact.personId =person.Id
    
    // inner join  user
    // on user.personId =person.Id
    
    // inner join  scoreperperson
    // on scoreperperson.PersonId = Person.Id
    
    // inner join  score
    // on scoreperperson.ScoreId = Score.Id");
    $this->db->query("INSERT INTO `score` (`points`
                                          ,`date`
                                          , `IsActive`
                                          , `Opmerking`
                                          , `DatumAangemaakt`
                                          , `Datumgewijzigd`) 
                    VALUES                (:points
                                           ,`:date`
                                           , b'1'
                                           , NULL, 
                                           '2023-03-22 11:51:53.000000', 
                                           '2023-03-22 11:51:53.000000');");
                                           
    $this->db->bind(':points', $post['points'], PDO::PARAM_INT);
    $this->db->bind(':date', $post['date'], PDO::PARAM_STR);

    $this->db->execute();

    
}
  }