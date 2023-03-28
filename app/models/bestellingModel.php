<?php
class bestellingModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getbestellingen()
    {
        $sql = "SELECT    person.Id as personid
		,person.firstname
        ,user.infix
        ,person.lastname 
        ,reservation.Date
        ,packageperreservation.id as packageperreservationid
        ,contact.Mobile
        ,packageperreservation.ReservationId as ReservationId
        ,packageperreservation.PackageOptionsId as PackageOptionsId
        

        ,packageperreservation.Id as packageperreservationId
        ,packageoptions.name
        
        from person
        inner join contact on
        person.Id =contact.personId
        
        inner join user on
        user.personId =  person.Id
        
		inner join reservation on
    reservation.PersonId= person.Id
    
    	inner join packageperreservation on
    packageperreservation.ReservationId= reservation.Id
    
    inner join packageoptions on
    packageoptions.Id = packageperreservation.PackageOptionsId";
        $this->db->query($sql);

        $result = $this->db->resultSet();
        return $result;
    }

    public function getallbeschibarebestellingen($ReservationId)
    {
        $sql = " SELECT packageoptions.Id, packageoptions.name, 
        packageoptions.price,
        packageoptions.Omschrijving
       ,packageperreservation.Id as packageperreservationId
       ,packageoptions.Id as packageoptionsId
       ,packageperreservation.Id as packageperreservationId
         FROM packageoptions
         LEFT JOIN packageperreservation ON packageoptions.Id = packageperreservation.PackageOptionsId 
            AND packageperreservation.ReservationId = :ReservationId
            WHERE packageperreservation.PackageOptionsId IS  NULL";
        $this->db->query($sql);
        $this->db->bind(':ReservationId', $ReservationId, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    }

    
    public function update($PackageOptionsId, $packageperreservationId)
    {
        $sql = "UPDATE packageperreservation 
                SET PackageOptionsId = :PackageOptionsId, 
                IsActive = b'0' 
                WHERE packageperreservation.Id = :packageperreservationId";
        $this->db->query($sql);
        $this->db->bind(':PackageOptionsId', $PackageOptionsId, PDO::PARAM_INT);
        $this->db->bind(':packageperreservationId', $packageperreservationId, PDO::PARAM_INT);
        $this->db->execute();
        return $this->db->rowCount();
    }
}