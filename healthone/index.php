<?php
session_start();

spl_autoload_register("loadClass");



function loadclass($class){
    include $class.'.php';
}

$controller = new controller\Controller();


if (isset($_POST['inloggen'])){
    //wordt gekijken of zijn gegevens klopt
    $controller->logIn();
    //als session'ingelogd gelijk aan 1 is betekent dat inloggen gelukt is'
    if ($_SESSION['ingelogd']==1){

        $controller->readPatientenAction();
    }else{
        //als inloggen niet gelukt is wordt login page uitgetond
        $controller->show("Login");

    }
}//formiler behandeling wordt uigeloogd
else if (isset($_POST['Uitloggen']))
{
    $controller->logout();

}//Formlier behandeling om alle  patienten laten zien
else if (isset($_POST['Patienten']))
{
    $controller->readPatientenAction();
}
/* DELETE:  verwijderen rijen */
else if(isset($_POST['deletePatient']))
{
    $controller->deletePatientAction($_POST['deletePatient']);
}//formlier behandeling laat de form van patienten zien
else if (isset($_POST['showFormPatient'])){

    $controller->showFormPatientAction();
}/* CREATE:  formulier afhandeling nieuwe rij */
else if(isset($_POST['create']))
{
    $controller->createPatientAction();
}/* UPDATE: formulier afhandeling om een rij bij te werken */
else if(isset($_POST['update']))
{
    $controller->updatePatientAction();
}//formulier behandeling laat de medicijnen zien
else if (isset($_POST['Medicijnen']))
{
    $controller->readMedicijnenAction();
}//formlierbegandeling laat de form van medicijn zien
else if (isset($_POST['showFormMedicijnen']))
{
    $controller->showFormMedicijnenAction($_POST['showFormMedicijnen']);
}/* DELETE:  verwijderen rijen */
else if (isset($_POST['deleteMedicijnen']))
{

    $controller->deleteMedicijnAction($_POST['deleteMedicijnen']);
}/* UPDATE: formulier afhandeling om een rij bij te werken */
else if(isset($_POST['updateMedicijnen']))
{

    $controller->updateMedicijnenAction();
}//formlier behandeling om niuew medicijnen te maken
else if (isset($_POST['createMedicijnen'])){

    $controller->creatMedicijnenAction();
}//je wordt naar login pagina gestuurd
else{
    $controller->show("Login");
}



