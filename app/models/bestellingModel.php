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
}