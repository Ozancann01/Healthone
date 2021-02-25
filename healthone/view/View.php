<?php
namespace view;

use view\Patient;
use view\Login;
use view\Medicijnen;


class View
{

    private $login;
    private $patient;
    private $medicijnen;

    public function __construct(){

        //Classen worden aangeroepen
        $this->login=new Login();
        $this->patient=new Patient();
        $this->medicijnen=new Medicijnen();
    }
    //login wordt aangetoond
    public function showLogin(){
        $this->login->showLogin();
    }
    //header wordt aangetoond
    public function showHeader(){
        $html=<<<EOT

 
                 <!DOCTYPE html>
                    <html lang='en'>
                        <head>
                            
                           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
                           <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">
                           <link rel="preconnect" href="https://fonts.gstatic.com">
                            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet"   
                     </head>
                       <body>
                             <header>
                                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ml-auto">
                                        <div class="breadcrumb-dn mr-auto ">
                                            <p class="text-light mt-2 ">Healthone</p>
                                        </div>
                                        <form class="nav navbar-nav nav-flex-icons ml-auto" action="index.php"  method="post">
                                                <input  type="submit" class="btn btn-warning  mr-3 " name="Patienten" value="Patienten">                                           
                                                <input  type="submit" class="btn btn-warning mr-3" name="Medicijnen" value="Medicijnen">                                          
                                                <input type="submit" class="btn btn-warning mr-3" name="Uitloggen" value="Uitloggen">
                                        </form>
                                    </nav>                                     
                            </header>
EOT;
        echo $html;
    }
    public function showPatienten($patienten=null){
        //Header wordt geroepen
        $this->showHeader();
        //Patienten worden weergegeven
        if ($patienten==null){
            $this->patient->schowPatient();

        }else{
            $this->patient->schowPatient($patienten);
        }
    }
    public function showFormMedicijnen($medicijnen=null,$id=null){
        //Header wordt geroepen
        $this->showHeader();
        //Medicijnen worden weergegeven
        $this->medicijnen->showtFormMedicijnen($medicijnen,$id);

    }
    public function showMedicijnen($medicijenen){
        //Header wordt geroepen
        $this->showHeader();
        //Medicijnen worden weergegeven
        if ($medicijenen==null){
            $this->medicijnen->schowMedicijnen();
        }else{
            $this->medicijnen->schowMedicijnen($medicijenen);
        }


    }
    public function showFormPatienten($id=null,$patient=null){
        //Header wordt geroepen
        $this->showHeader();
        //Patienten worden weergegeven
       $this->patient->showTFormPatienten($id,$patient);

    }
}