<?php
namespace controller;

use view\View;
use model\Model;

class Controller
{
    private $view;
    private $model;

    public function __construct(){
        //class model wordt aangeropen
        $this->model = new Model();
        //class view wordt aangeropen
        $this->view = new View();
    }
    //Gebruiker username en waschtword word hier gepakt en wordt door gestuurd naar model
    public function logIn(){

        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING);
        $password=sha1($_POST['password']);

        return $this->model->controlUser($username,$password);
    }
    //Roept funcitie logout aan in model
    public function logout(){
        $this->model->logout();
    }
    //Wordt function's aangeroepen
    public function show($value){
            $value = 'show'.$value;
            $this->view->$value();
    }
        //Dit function wordt aangeroepen wanner ingelogd of aan patient button gederukt is.
    public function readPatientenAction(){
        //Patienten worden van model gevraagd.
        $patienten= $this->model->getPatienten();

        //Patienten worden door gestuurd naar view
        $this->view->showPatienten($patienten);
    }
    //Dit function wordt aangeroepen van index als er nieuw patient wordt toegevegd of wanner de patient gegevens wordt gewijzigd
    public function showFormPatientAction($id=null){

        if($id !=null && $id !=0){
            //Gekozen patient wordt geselecteerd emn wordt naar view gestuurd om te wijzigen
            $patient = $this->model->selectPatient($id);
            $this->view->showFormPatienten($id,$patient);
        }else{
            //wordt aangeroepen als er nieuw patient wordt toegevoegd
            $this->view->showFormPatienten();
        }
    }
    //Dit function wordt aangeroepen van af index
    //Function stuurde   variabels door naar model om nieuw patient te maken en daarna wordt pagina vernieuwd zo dat je ook nieuw patient kunt zien
    public function createPatientAction(){
        $naam = filter_input(INPUT_POST,'naam');
        $adres = filter_input(INPUT_POST,'adres');
        $woonplaats = filter_input(INPUT_POST,'woonplaats');
        $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        $soortverzekering = filter_input(INPUT_POST,'soortverzekering');
        $zknummer = filter_input(INPUT_POST,'zknummer');
        $this->model->insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);
        $this->readPatientenAction();
    }
    //Dit function update te patient gegevens
    //Function stuurde variabels door naar model om gegevens te update.
    public function updatePatientAction(){
        $id = filter_input(INPUT_POST,'id');
        $naam = filter_input(INPUT_POST,'naam');
        $adres = filter_input(INPUT_POST,'adres');
        $woonplaats = filter_input(INPUT_POST,'woonplaats');
        $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        $zknummer = filter_input(INPUT_POST,'zknummer');
        $soortverzekering = filter_input(INPUT_POST,'soortverzekering');
        $this->model->updatePatient($id,$naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);
        //Hier wordt pagina vernieuwd om nieuw gegevens te zien.
        $this->readPatientenAction();
    }
    //Dit function verwijdert de gekozen Patient
    public function deletePatientAction($id){
        $this->model->deletePatient($id);
        $this->readPatientenAction();
    }
    //Dit function wordt aangeroepen wanner   aan medicijnen button gederukt is.
    public function  readMedicijnenAction(){
        //Medicijnen wordt aangevraagd van model
        $medicijnen=$this->model->getMedicijnen();
        //Medicijnen wordt door gestuurd naar view .
        $this->view->showMedicijnen($medicijnen);
    }
    //Dit function wordt aangeroepen van index.php als er nieuw medicijnen wordt toegevegd of wanner de patient gegevens wordt gewijzigd
    public function showFormMedicijnenAction($id=null){

        if($id !=null && $id !=0){
            //Geselecteerde medicijn gegegvens wordt opgehaald en dat wordt naar view gesturd.
            $medicijnen = $this->model->selectMedicijnen($id);
            $this->view->showFormMedicijnen($medicijnen,$id);
        }else{
            //wordt aangeroep als er nieuw medicijenen, wordt toegevoegd.
            $this->view->showFormMedicijnen();
        }
    }
    //Dit function wordt aangeroepe van inde.php als er nieiw patient wordt toegevoegd waardes worden opgehaald en wordt door getsuurd naar model
    public function creatMedicijnenAction(){
        $naam=filter_input(INPUT_POST,'naam');
        $werking=filter_input(INPUT_POST,'werking');
        $bijwerking=filter_input(INPUT_POST,'bijwerking');
        $verzekerd=filter_input(INPUT_POST,'verzekerd');
        $this->model->insertMedicijnen($naam,$werking,$bijwerking,$verzekerd);
        //Hier wordt pagina vernieuwd om  nieuw  medicijnen te zien
        $this->readMedicijnenAction();
    }
    //Dit function wordt aangeroepen van index.php als er medicijn update moet worden
    public function updateMedicijnenAction(){
        //Waardes worden opgehaald en wordt door gestuurd naar model
        $id = filter_input(INPUT_POST,'id');
        $naam = filter_input(INPUT_POST,'naam');
        $werking = filter_input(INPUT_POST,'werking');
        $bijwerking=filter_input(INPUT_POST,'bijwerking');
        $verzekerd=filter_input(INPUT_POST,'verzekerd');
        $this->model->updateMedicijn($id,$naam,$werking,$bijwerking,$verzekerd);
        //Pagina wordt vernieuwed om nieuw gewijzigde gegevens te zien.
        $this->readMedicijnenAction();
    }
    //Dit function verwijderd gekozen Medicijnen
    public function deleteMedicijnAction($id){
        $this->model->deleteMedicijn($id);
        //De pagina wordt vernieuwd zo dat je kunt zien dat medicijnen verwijderd is.
        $this->creatMedicijnenAction();
    }
}