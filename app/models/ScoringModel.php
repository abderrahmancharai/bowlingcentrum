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
    person.infix,
    person.lastname,
    scoreperperson.Id,
    score.points,
    score.date,
    score.Id,
    scoreperperson.ScoreId
    from person
     
     
      inner join  contact
    on contact.personId =person.Id
    
      inner join  scoreperperson
    on scoreperperson.PersonId = Person.Id
    
      inner join  score
    on scoreperperson.ScoreId = Score.Id";

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;

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

    public function getSinglescoring($id) 
    {
      $this->db->query("SELECT  person.firstname,
			                    person.infix,
                                person.lastname,
                                scoreperperson.Id,
                                score.points,
                                score.date,
                                score.Id,
                                scoreperperson.ScoreId FROM person 

                        INNER JOIN  contact ON 	contact.personId =person.Id

                        inner join  scoreperperson on scoreperperson.PersonId = Person.Id

                        inner join  score on scoreperperson.ScoreId = Score.Id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function updatescoring($post) {
        try {
          // $this->db->dbHandler->beginTransaction();
  
          $this->db->query(" UPDATE person
                                SET firstname = :firstname,
                                    infix = :infix,
                                    lastname = :lastname
                              WHERE person.Id = :Id;");
  
  $this->db->bind(':firstname', $post['firstname'], PDO::PARAM_STR);
  $this->db->bind(':lastname', $post['lastname'], PDO::PARAM_STR);
  $this->db->bind(':infix', $post['infix'], PDO::PARAM_INT);
             
  
          $this->db->execute();
  
          $this->db->query(" UPDATE score
                                SET points = :points,
                                    date = :date,
                              WHERE score.Id = :Id;");
  
          $this->db->bind(':points', $post["points"], PDO::PARAM_INT);
          $this->db->bind(':date', $post["date"], PDO::PARAM_INT);
  
           $this->db->execute();
  
        } catch(PDOException $e) {
          echo $e->getMessage() . "Rollback";
          // $this->db->dbHandler->rollBack();
        }
      }


public function createScoring($post) {
    // var_dump($post);
    
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
    $sysdate = date('Y-m-d H:i:s');
    $this->db->query("INSERT INTO `score` (`points`
                                          ,`date`
                                          , `IsActive`
                                          , `Opmerking`
                                          , `DatumAangemaakt`
                                          , `Datumgewijzigd`) 
                    VALUES                (:points
                                           ,:date
                                           ,b'1'
                                           ,NULL 
                                           ,'$sysdate' 
                                           ,'$sysdate');");
    
    
    $this->db->bind(':points', $post['points'], PDO::PARAM_INT);
    $this->db->bind(':date', $post['date'], PDO::PARAM_STR);
    
    
    $this->db->execute();
    
    $this->db->query("INSERT INTO `person` (`firstname`
                                            , `infix`
                                            , `lastname`
                                            , `IsActive`
                                            , `Opmerking`
                                            , `DatumAangemaakt`
                                            , `Datumgewijzigd`) 
                    VALUES                  (:firstname
                                            ,:infix
                                            ,:lastname
                                            , b'1'
                                            , NULL
                                            , '$sysdate'
                                            , '$sysdate');");
    
    $this->db->bind(':firstname', $post['firstname'], PDO::PARAM_STR);
    $this->db->bind(':lastname', $post['lastname'], PDO::PARAM_STR);
    $this->db->bind(':infix', $post['infix'], PDO::PARAM_INT);
    
    return $this->db->execute();

    
}
  }