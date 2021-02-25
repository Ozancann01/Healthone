<?php

namespace view;

class Patient{

    public function schowPatient($patienten=null){
        echo <<<EOT
                     <div class="d-flex justify-content-center mt-2 mb-3"><h1>Patienten overzicht</h1> </div>       
                                    
EOT;
        if($patienten !== null)
        {
            echo "
                    <div class='container'>
                    <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                              <th scope='col'></th>
                              <th scope='col'>Naam</th>
                              <th scope='col'>Adres</th>
                              <th scope='col'>Woonplaats</th>
                              <th scope='col'>zknummer</th>
                              <th scope='col'>Geboortedatum</th> 
                              <th scope='col'>Soortverzekering</th>
                              <th scope='col'>Actions</th>
                              <th scope='col'>
                                <form action='index.php' method='post'>
                                    <button type='submit' name='showFormPatient'  class='btn btn-warning'><i class='fa fa-plus'></i> New Patient</button>
                                 </form>         
                              </th>
                        </tr>
                    </thead>
                    <tbody>          
                            
";
                            foreach ($patienten as $patient) {
                                echo  "<tr>
                                    <th scope='row' ></th>
                                        <td>$patient->naam</td>
                                        <td>$patient->adres</td>
                                        <td>$patient->woonplaats</td>
                                        <td>$patient->zknummer</td>
                                        <td>$patient->geboortedatum</td>
                                        <td>$patient->soortverzekering</td>
                                         <td>
                                         <form action='index.php' method='post'>
                                            <button type='submit' name='showFormPatient' class='btn btn-success'  value='$patient->id'><i class='fas fa-edit' ></i></button>
                                                <button type='submit'name='deletePatient'value='$patient->id' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
                                        </form>
                                        </td>
                                    </tr>
                            ";
                            }
                    echo "</tbody>
                        </table>
                        
";
                        }
                    else{
                         echo "<div class='container'>
                        <h5>Geen patienten gevonden</h5>
                        <form action='index.php' method='post'>
                              <button type='submit' name='showFormPatient'  class='btn btn-warning'><i class='fa fa-plus'></i> New Patient</button>
                         </form>      
                   </div>";
                    }
    }

    public function showTFormPatienten($id,$patient){
        if($id !=null && $id !=0){

                echo "
                    <main style=\"padding: 10rem; height: 55rem;\" class=\"d-flex justify-content-center\" >
                        <div class=\"container bg-primary mt-6 rounded\" style=\"width: 50rem\">
                            <div class=\"row justify-content-center align-items-center\">
                                <div  class=\"col-md-6\">
                                    <div  class=\"col-md-19 \" >
                                        <form method='post' action='index.php' >
                                        <h3 class='mt-3 text-light'>Patient Gegevens Aanpassen</h3>
                                            <table class=\"mt-5\">
                                                <tr><td></td><td>
                                                    <input type=\"hidden\" name=\"id\" value='$id'/></td></tr>
                                                <tr><td>   <label for=\"naam\" class=\"text-light\">Patient naam:</label></td><td>
                                                    <input type=\"text\" name=\"naam\"  required value= '".$patient->naam."'/></td></tr>
                                                <tr><td>
                                                    <label for=\"adres\" class=\"text-light\"'>adres:</label></td><td>
                                                    <input type=\"text\" name=\"adres\" required value = '".$patient->adres."'/></td></tr>
                                                <tr><td>
                                                    <label for=\"woonplaats\" class=\"text-light\">woonplaats:</label></td><td>
                                                    <input type=\"text\" name=\"woonplaats\" required value= '".$patient->woonplaats."'/></td></tr>
                                                <tr><td>
                                                    <label for=\"geboortedatum\" class=\"text-light\">geboortedatum:</label></td><td>
                                                    <input type=\"text\" name=\"geboortedatum\" required value= '".$patient->geboortedatum."'/></td></tr>
                                                <tr><td>
                                                    <label for=\"zknummer\" class='text-light'>zknummer:</label></td><td>
                                                    <input type=\"text\" name=\"zknummer\" required value= '".$patient->zknummer."'/></td></tr>
                                                <tr><td>
                                                    <label for=\"soortverzekering\" class=\"text-light\">soortverzekering:</label></td><td>
                                                    <input type=\"text\" name=\"soortverzekering\" required value= '".$patient->soortverzekering."'/></td></tr>
                                                <tr>
                                                
                                            </table>
                                                 <div class=\"form-group d-flex justify-content-end mt-5\">
                                                     <input type=\"submit\" name=\"update\" class=\"btn btn-warning btn-md\" value=\"Opslaan\">
                                                 </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
        </body> 
        </html>";
        }
        else{
            /*de html template */
            echo "<main style=\"padding: 10rem; height: 55rem;\" class=\"d-flex justify-content-center\" >
                    <div class=\"container bg-primary mt-6 rounded\" style=\"width: 50rem\">
                        <div class=\"row justify-content-center align-items-center\">
                            <div  class=\"col-md-6\">
                                <div  class=\"col-md-14\">
                                    <form method='post' action='index.php' >
                                        <h3 class='mt-3 text-light'>Nieuwe  Patient Toevoegen</h3>
                                        <table class=\"mt-5\">
                                            <tr><td>   <label for=\"naam\" class='text-light'>Patient naam:</label></td><td>
                                                <input type=\"text\" name=\"naam\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"adres\" class='text-light'>adres:</label></td><td>
                                                <input type=\"text\" name=\"adres\" required value = ''/></td></tr>
                                            <tr><td>
                                                <label for=\"woonplaats\" class='text-light'>woonplaats:</label></td><td>
                                                <input type=\"text\" name=\"woonplaats\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"geboortedatum\" class='text-light'>geboortedatum:</label></td><td>
                                                <input type=\"text\" name=\"geboortedatum\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"zknummer\" class='text-light'>zknummer:</label></td><td>
                                                <input type=\"text\" name=\"zknummer\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"soortverzekering\" class='text-light'>soortverzekering:</label></td><td>
                                                <input type=\"text\" name=\"soortverzekering\" required value= ''/></td></tr>
                                            <tr>
                                            </tr>
                                        </table>
                                        <div class=\"form-group d-flex justify-content-end mt-5\">
                                        <input type=\"submit\" name=\"create\" class=\"btn btn-warning btn-md\" value=\"Create\">
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </body>
        </html>
        ";

        }
    }



}

?>
