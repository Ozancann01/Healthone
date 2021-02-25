<?php

namespace model;

class Model
{
    private $database;

    //connection met server gemaakt
    private function makeConnection(){
        $this->database = new \PDO('mysql:host=localhost;dbname=healthone', "root", "");
    }
    //Gebruiker wordt uitgeloogd en wordt door naar index.php gestuurd
    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php");
    }
    //Wordt controllerd of dat gebruiker bestaan.
    public function controlUser($username,$password){
        $this->makeConnection();
        $query=$this->database->prepare("SELECT * FROM gebruikers WHERE username = :user AND password = :pass ");

        $query->bindParam(":user",$username);
        $query->bindParam(":pass",$password);
        $query->execute();

        //Als gebruker bestaat en ook wachtwoordt klopt wordt session 'ingelogd' gesaved als 1.
        if ($query->rowCount() == 1){
            $_SESSION['ingelogd']=1;
        }
       // Als gebruiker niet bestaat of het wachtwoort kloopt niet wordt session 'ingelogd' gesaved als 0 .
        else{
            $_SESSION['ingelogd']=0;
        }
    }
    //Hier wordt patient toegevoegd aan database
    public function insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering){
        $this->makeConnection();
        if($naam !='')
        {
            $query = $this->database->prepare (
                "INSERT INTO `patienten` (`id`, `naam`, `adres`, `woonplaats`, `zknummer`, `geboortedatum`, `soortverzekering`) 
                VALUES (NULL, :naam, :adres, :woonplaats, :zknummer, :geboortedatum, :soortverzekering)");
            $query->bindParam(":naam", $naam);
            $query->bindParam(":adres", $adres);
            $query->bindParam(":woonplaats",$woonplaats);
            $query->bindParam(":zknummer", $zknummer);
            $query->bindParam(":geboortedatum", $geboortedatum);
            $query->bindParam(":soortverzekering",$soortverzekering);
            $result = $query->execute();
            return $result;
        }
        return -1;
        // id hoeft niet te worden toegevoegd omdat de id in de databse op autoincrement staat.
    }
    //Gegevens van patient wordt upgedate
    public function updatePatient($id,$naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering){
        $this->makeConnection();
        // id moet worden toegevoegd omdat de id in de databse wordt gezocht
        $query = $this->database->prepare (
            "UPDATE `patienten` SET `naam` = :naam, `adres`=:adres, `woonplaats` = :woonplaats,
            `zknummer`=:zknummer, `geboortedatum`=:geboortedatum, `soortverzekering`=:soortverzekering 
            WHERE `patienten`.`id` = :id ");
        $query->bindParam(":id", $id);
        $query->bindParam(":naam", $naam);
        $query->bindParam(":adres", $adres);
        $query->bindParam(":woonplaats",$woonplaats);
        $query->bindParam(":zknummer", $zknummer);
        $query->bindParam(":geboortedatum", $geboortedatum);
        $query->bindParam(":soortverzekering",$soortverzekering);
        $result = $query->execute();
        return $result;
    }
    //Patient wordt gepaakt en dat wordt returnd
    public function getPatienten(){
        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM `patienten`');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,\model\Patient::class);
            return $result;
        }
        return null;
    }
    //Patient wordt geselecteerd en dat wordt returnd
    public function selectPatient($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'SELECT * FROM `patienten` 
            WHERE `patienten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        if($result){
            $selection->setFetchMode(\PDO::FETCH_CLASS, \model\Patient::class);
            $patient = $selection->fetch();
            return $patient;
        }
        return null;
    }
    //Gekozen patient wordt verwijderd ui de database.
    public function deletePatient($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'DELETE  FROM `patienten` 
            WHERE `patienten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        return $result;
    }

    //Medicijnen worden toegevoegd aan database.
    public function insertMedicijnen($naam,$werking,$bijwerking,$verzekerd){
        $this->makeConnection();
        $query=$this->database->prepare("INSERT INTO `medicijnen` (`id`,`naam`,`werking`,`bijwerking`,`verzekerd`)
                                        VALUES (NULL ,:naam ,:werking,:bijwerking,:verzekerd)");
        $query->bindParam(":naam",$naam);
        $query->bindParam(":werking",$werking);
        $query->bindParam(":bijwerking",$bijwerking);
        $query->bindParam(":verzekerd",$verzekerd);
        $result=$query->execute();
        return $result;
    }

    //Medicijnen worden upgedate.
    public function updateMedicijn($id,$naam,$werking,$bijwerking,$verzekerd){
        $this->makeConnection();
        $query = $this->database->prepare (
            "UPDATE `medicijnen` SET `naam` = :naam, `werking`=:werking, `bijwerking` = :bijwerking,
            `verzekerd`=:verzekerd WHERE `medicijnen`.`id` = :id ");
        $query->bindParam(":id", $id);
        $query->bindParam(":naam", $naam);
        $query->bindParam(":werking", $werking);
        $query->bindParam(":bijwerking",$bijwerking);
        $query->bindParam(":verzekerd", $verzekerd);
        $result = $query->execute();
        return $result;

    }
    //Medicijnen worden opgehaald
    public function getMedicijnen(){
        $this->makeConnection();
        $selection=$this->database->query('SELECT * FROM `medicijnen`');
        if ($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,\model\Medicijnen::class);
            return $result;
        }
        return null;
    }
    //Waardes van geselecteerde medicijn woordt  returnd.
    public function selectMedicijnen($id){
        $this->makeConnection();
        $selection=$this->database->prepare('SELECT * FROM `medicijnen` WHERE `medicijnen`.`id`=:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        if($result){
            $selection->setFetchMode(\PDO::FETCH_CLASS, \model\Medicijnen::class);
            $medicijn = $selection->fetch();
            return $medicijn;
        }
        return null;
    }
    //Gekozen medicijn wordt verwijderd.
    public function deleteMedicijn($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'DELETE  FROM `medicijnen` 
            WHERE `medicijnen`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        return $result;
    }
}