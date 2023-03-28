-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 28 mrt 2023 om 15:33


drop DATABASE bowlen;
CREATE DATABASE bowlen;
USE bowlen;


CREATE TABLE person (
	Id 					 int  	 			NOT NULL auto_increment
    ,firstname 		  varchar(50)  		         NOT NULL   
    ,infix           varchar(50)                null
    ,lastname 		 varchar(50)       	NOT NULL
     ,IsActive        bit                  not null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  datetime(6)		 not null
    ,Datumgewijzigd    datetime(6)		not null
   
		,PRIMARY KEY (Id)
)engine=InnoDB;



CREATE TABLE user (
	Id 					 int  	 			NOT NULL auto_increment
    ,personId 		  int 		         NOT NULL   
    ,birthday  date       not null
 
     ,IsActive        bit                  not null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  datetime(6)		 not null
    ,Datumgewijzigd    datetime(6)		not null
		,primary key (Id)
    	,foreign key (personId ) references person(Id)
)engine=InnoDB;

CREATE TABLE contact (
	Id 					 int  	 			NOT NULL auto_increment
    ,personId 		  int 		         NOT NULL   
	,Email   varchar(255) not null
    ,Mobile   int(12)   not null
      ,IsActive        bit                  not null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  datetime(6)		 not null
    ,Datumgewijzigd    datetime(6)		not null
 
		,primary key (Id)
    	,foreign key (personId ) references person(Id)
)engine=InnoDB;
CREATE TABLE PackageOptions (
	Id 				 int  	 						NOT NULL auto_increment
    ,name             varchar(250)              not null
	,price            int                        not null
    ,Omschrijving     varchar(500)					null
    ,IsActive        bit                 	 not null
    ,Opmerking        varchar(500)     		 null
    ,DatumAangemaakt  datetime(6)			 not null
    ,Datumgewijzigd    datetime(6)			not null
		,PRIMARY KEY (Id)
)engine=InnoDB;


CREATE TABLE Openingstime (
	Id 				 int  	 					NOT NULL auto_increment
    ,Day 		     varchar(50)  		         NOT NULL   
    ,OpeningsTime 	time     					NOT NULL
    ,ClosingTime	time      					NOT NULL
    ,IsActive        bit                 		not null
    ,Opmerking        varchar(500)     		 	null
    ,DatumAangemaakt  datetime(6)			 	not null
    ,Datumgewijzigd    datetime(6)				not null
		,PRIMARY KEY (Id)
)engine=InnoDB;

CREATE TABLE Rate (
	Id 				 int  	 						NOT NULL auto_increment
    ,Rate 		     int  		         	NOT NULL   
    ,IsActive        bit                 	 not null
    ,Opmerking        varchar(500)     		 null
    ,DatumAangemaakt  datetime(6)			 not null
    ,Datumgewijzigd    datetime(6)			not null
		,PRIMARY KEY (Id)
)engine=InnoDB;


CREATE TABLE score (
	Id 				 int  	 						NOT NULL auto_increment
    ,points 		     int  		         	NOT NULL   
    ,date         date                        not null
    ,IsActive        bit                 	 not null
    ,Opmerking        varchar(500)     		 null
    ,DatumAangemaakt  datetime(6)			 not null
    ,Datumgewijzigd    datetime(6)			not null
		,PRIMARY KEY (Id)
)engine=InnoDB;

CREATE TABLE lane (
	Id 					 int  	 			NOT NULL auto_increment
    ,Lanes 		     	varchar(255)  		 NOT NULL   
    ,IsActive        	bit                  not null
    ,Opmerking        varchar(500)    		 null
    ,DatumAangemaakt  datetime(6)			 not null
    ,Datumgewijzigd    datetime(6)			not null
		,PRIMARY KEY (Id)
)engine=InnoDB;
CREATE TABLE Reservation (
	Id 							int  	 				NOT NULL auto_increment
    ,PersonId 		  			int  		         	NOT NULL   
    ,LaneId        				int          			 not null
    ,PackagePerPersonId       	 int                 	  null
	,ScoreperpersonId       	int     				 null
    ,OpeningsTimeId             int                  	not null
    ,RateId                        int               not  null
    ,ReservationStatus  		 varchar(125)			 not null
    ,ReservationNumber    		int							not null
    ,Date     				  	 date                 	 not null
    ,AmountHours        		int     					 null
    ,StartTime  				time					 not null
    ,EndTime   					time					not null
    ,AmountAdults              int                  	null
    ,AmountChildren				int						null
     ,IsActive       				bit                 	 not null
    ,Opmerking        				varchar(500)     		 null
    ,DatumAangemaakt 						 datetime(6)			 not null
    ,Datumgewijzigd    						datetime(6)			not null
    
		,PRIMARY KEY (Id)
        	,foreign key (personId ) references person(Id)
            	,foreign key (OpeningsTimeId ) references Openingstime(Id)
                	,foreign key (LaneId ) references lane(Id)
                    ,foreign key (RateId ) references Rate(Id)
                
)engine=InnoDB;

CREATE TABLE scoreperperson (
	Id 					 int  	 						NOT NULL auto_increment
    ,ScoreId  		     int  		         	NOT NULL   
    ,PersonId        	 int                        not null
    ,ReservationId       	int                    	not null
    ,IsActive        	bit                 	 not null
    ,Opmerking       	 varchar(500)     		 null
    ,DatumAangemaakt 	 datetime(6)			 not null
    ,Datumgewijzigd    	datetime(6)				not null
		,PRIMARY KEY (Id)
        	,foreign key (ScoreId ) references score(Id)
            ,foreign key (PersonId ) references person(Id)
             ,foreign key (ReservationId) references reservation(Id)
)engine=InnoDB;

CREATE TABLE PackagePerReservation (
	Id 						 int  	 						NOT NULL auto_increment
    ,PackageOptionsId  		  int  		         	NOT NULL   
    ,ReservationId        	 int                        not null
    ,IsActive        		bit                 	 not null
    ,Opmerking       	 varchar(500)     		 null
    ,DatumAangemaakt 	 datetime(6)			 not null
    ,Datumgewijzigd    	datetime(6)				not null
		,PRIMARY KEY (Id)
        	,foreign key (PackageOptionsId ) references PackageOptions(Id)
             ,foreign key (ReservationId) references reservation(Id)
)engine=InnoDB;

INSERT INTO `packageoptions` (`Id`, `name`, `price`, `Omschrijving`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'BachelorParty', '40', 'vrijgezelfeest food ', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `packageoptions` (`Id`, `name`, `price`, `Omschrijving`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'SnackPackageBasic', '40', 'basic snacks ', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `packageoptions` (`Id`, `name`, `price`, `Omschrijving`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'SnackPackageLuxe', '70', 'basic snacks luxe ', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `packageoptions` (`Id`, `name`, `price`, `Omschrijving`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'ChildrenParty', '20', 'kinderen  feest ', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `packageoptions` (`Id`, `name`, `price`, `Omschrijving`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'BachelorParty', '25', 'vrijgezelfeest food ', '', NULL, SYSDATE(), SYSDATE());

INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'maandag', '14:00', '22:00', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'dinsdag', '14:00', '22:00', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'woensdag','14:00', '22:00', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'donderdag', '14:00', '22:00', '', NULL, SYSDATE(),SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'vrijdag', '14:00', '22:00', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'zaterdag','14:00', '24:00', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `openingstime` (`Id`, `Day`, `OpeningsTime`, `ClosingTime`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'zondag','14:00', '24:00', '', NULL, SYSDATE(), SYSDATE());

INSERT INTO `person` (`Id`, `firstname`, `infix`, `lastname`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'jan', 'el', 'mo', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `person` (`Id`, `firstname`, `infix`, `lastname`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'vos', 'dse', 'ddcvis', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `person` (`Id`, `firstname`, `infix`, `lastname`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'eos', 'dse', 'ads', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `person` (`Id`, `firstname`, `infix`, `lastname`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'mop', 'dse', 'pio', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `person` (`Id`, `firstname`, `infix`, `lastname`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, 'kan', 'as', 'wds', '', NULL, '', '');

INSERT INTO `contact` (`Id`, `personId`, `Email`, `Mobile`) VALUES (NULL, '1', 'jAN@HOTMAIL.COM', '0614151547');
INSERT INTO `contact` (`Id`, `personId`, `Email`, `Mobile`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '2', 'vos@hotmail.com', '064547747', '', NULL, '', '');
INSERT INTO `contact` (`Id`, `personId`, `Email`, `Mobile`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '3', 'deman@hotmail.com', '06873747', '', NULL, '', '');
INSERT INTO `contact` (`Id`, `personId`, `Email`, `Mobile`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '4', 'kois@hotmail.com', '068747747', '', NULL, '', '');
INSERT INTO `contact` (`Id`, `personId`, `Email`, `Mobile`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '5', 'dope@hotmail.com', '063747747', '', NULL, '', '');

INSERT INTO `user` (`Id`, `personId`, `birthday`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '1', '2014-03-19', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `user` (`Id`, `personId`, `birthday`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '2', '2001-03-19', '', NULL, '', '');
INSERT INTO `user` (`Id`, `personId`, `birthday`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '3', '2010-03-19', '', NULL, '', '');
INSERT INTO `user` (`Id`, `personId`, `birthday`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '4', '2009-03-19', '', NULL, '', '');
INSERT INTO `user` (`Id`, `personId`, `birthday`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '5', '2010-03-19', '', NULL, '', '');

INSERT INTO `rate` (`Id`, `Rate`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '1', '', NULL, SYSDATE(),SYSDATE());


INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 1', '', NULL,SYSDATE(), SYSDATE());

INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 2', '', NULL, SYSDATE(),SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 3', '', NULL, SYSDATE(),SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 4', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 5', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' lane 6', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' childeren lane 1', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `lane` (`Id`, `Lanes`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, ' childeren lane 2', '', NULL, SYSDATE(), SYSDATE());
INSERT INTO `reservation` (`Id`, `PersonId`, `LaneId`, `PackagePerPersonId`, `ScoreperpersonId`, `OpeningsTimeId`, `RateId`, `ReservationStatus`, `ReservationNumber`, `Date`, `AmountHours`, `StartTime`, `EndTime`, `AmountAdults`, `AmountChildren`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '1', '1', '', NULL, '2', '1', 'goed', '33212', '2023-03-16', '1', '15:11:14', '16:11:14', '1', '2', b'1', 'goed', '2023-03-28 15:11:14.000000', '2023-03-28 15:11:14.000000');
INSERT INTO `reservation` (`Id`, `PersonId`, `LaneId`, `PackagePerPersonId`, `ScoreperpersonId`, `OpeningsTimeId`, `RateId`, `ReservationStatus`, `ReservationNumber`, `Date`, `AmountHours`, `StartTime`, `EndTime`, `AmountAdults`, `AmountChildren`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '2', '2', '1', NULL, '2', '1', 'goed', '101', '2023-03-14', NULL, '08:50:14', '16:11:14', '1', '2', b'1', 'sda', '2023-03-22 15:25:53.000000', '2023-03-29 15:25:53.000000');
INSERT INTO `reservation` (`Id`, `PersonId`, `LaneId`, `PackagePerPersonId`, `ScoreperpersonId`, `OpeningsTimeId`, `RateId`, `ReservationStatus`, `ReservationNumber`, `Date`, `AmountHours`, `StartTime`, `EndTime`, `AmountAdults`, `AmountChildren`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '3', '2', '1', NULL, '2', '1', 'goed', '101', '2023-03-14', NULL, '08:50:14', '16:11:14', '1', '2', b'1', 'sda', '2023-03-22 15:25:53.000000', '2023-03-29 15:25:53.000000');
INSERT INTO `reservation` (`Id`, `PersonId`, `LaneId`, `PackagePerPersonId`, `ScoreperpersonId`, `OpeningsTimeId`, `RateId`, `ReservationStatus`, `ReservationNumber`, `Date`, `AmountHours`, `StartTime`, `EndTime`, `AmountAdults`, `AmountChildren`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '4', '2', '1', NULL, '2', '1', 'goed', '101', '2023-03-14', NULL, '08:50:14', '16:11:14', '1', '2', b'1', 'sda', '2023-03-22 15:25:53.000000', '2023-03-29 15:25:53.000000');
INSERT INTO `reservation` (`Id`, `PersonId`, `LaneId`, `PackagePerPersonId`, `ScoreperpersonId`, `OpeningsTimeId`, `RateId`, `ReservationStatus`, `ReservationNumber`, `Date`, `AmountHours`, `StartTime`, `EndTime`, `AmountAdults`, `AmountChildren`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `Datumgewijzigd`) VALUES (NULL, '5', '5', '1', NULL, '2', '1', 'goed', '101', '2023-03-14', NULL, '08:50:14', '16:11:14', '1', '2', b'1', 'sda', '2023-03-22 15:25:53.000000', '2023-03-29 15:25:53.000000');