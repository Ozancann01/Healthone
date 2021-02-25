<?php


namespace view;


class Medicijnen
{

    public function schowMedicijnen($medicijnen=null){
        echo <<<EOT
                     <div class="d-flex justify-content-center mt-2 mb-3"><h1>Medicijnen overzicht</h1> </div>       
                                    
EOT;
        if($medicijnen !== null)
        {
            echo "
                    <div class='container'>
                    <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                              <th scope='col'></th>
                              <th scope='col'>Naam</th>
                              <th scope='col'>Werking</th>
                              <th scope='col'>Bijwerking</th>
                              <th scope='col'>Verzekerd</th>
                              <th scope='col'>Actions</th>
                              <th scope='col'>
                                <form action='index.php' method='post'>
                                    <button type='submit' name='showFormMedicijnen'  class='btn btn-warning'><i class='fa fa-plus'></i> New Medicijn</button>
                                 </form>         
                              </th>
                        </tr>
                    </thead>
                    <tbody>          
                            
";
            foreach ($medicijnen as $medicijn) {

                echo  "<tr>
                                    <th scope='row' ></th>
                                        <td>$medicijn->naam</td>
                                        <td>$medicijn->werking</td>
                                        <td>$medicijn->bijwerking</td>
                                        <td>$medicijn->verzekerd</td>
                                         <td>
                                         <form action='index.php' method='post'>
                                            <button type='submit' name='showFormMedicijnen' class='btn btn-success'  value='$medicijn->id'><i class='fas fa-edit' ></i></button>
                                             <button type='submit' name='deleteMedicijnen' value='$medicijn->id' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
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
                        <h5>Geen Medicijnen gevonden</h5>
                        <form action='index.php' method='post'>
                              <button type='submit' name='showFormMedicijnen'  class='btn btn-warning'><i class='fa fa-plus'></i> New Medicijn</button>
                         </form>      
                   </div>";
        }
    }

    public function showtFormMedicijnen($medicijnen=null,$id=null){

        /*de html template */

        if($id !=null && $id !=0){

            echo "<main style=\"padding: 10rem; height: 55rem;\" class=\"d-flex justify-content-center\" >
                    <div class=\"container bg-primary mt-6 rounded\" style=\"width: 50rem\">
                        <div class=\"row justify-content-center align-items-center\">
                            <div  class=\"col-md-6\">
                                <div  class=\"col-md-14\">
                                    <form method='post' action='index.php' >
                                        <h3 class='mt-3 text-light'>Patient Gegevens Aanpassen</h3>
                                        <table class=\"mt-5\">
                                            <tr><td></td><td>
                                                <input type=\"hidden\" name=\"id\" value='$id'/></td></tr>
                                            <tr><td>   <label for=\"naam\" class=\"text-light\">Medicijnen naam</label></td><td>
                                                <input type=\"text\" name=\"naam\" required value= '".$medicijnen->naam."'/></td></tr>
                                            <tr><td>
                                                <label for=\"adres\" class=\"text-light\">werking:</label></td><td>
                                                <input type=\"text\" name=\"werking\" required value = '".$medicijnen->werking."'/></td></tr>
                                            <tr><td>
                                                <label for=\"woonplaats\" class=\"text-light\">bijwerking:</label></td><td>
                                                <input type=\"text\" name=\"bijwerking\" required value= '".$medicijnen->bijwerking."'/></td></tr>
                                            <tr><td>
                                                <label for=\"geboortedatum\" class=\"text-light\">verzekerd:</label></td><td>
                                                <input type=\"text\" name=\"verzekerd\" required value= '".$medicijnen->verzekerd."'/></td></tr>
                                            <tr><td>
                                            <tr><td>
                                        </table>
                                        <div class=\"form-group d-flex justify-content-end mt-5\">
                                        <input type=\"submit\" name=\"updateMedicijnen\" class=\"btn btn-warning btn-md\" value=\"Opslaan\">
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
        else{

            /*de html template */
            echo "<main style=\"padding: 10rem; height: 55rem;\" class=\"d-flex justify-content-center\" >
                    <div class=\"container bg-primary mt-6 rounded\" style=\"width: 50rem\">
                        <div class=\"row justify-content-center align-items-center\">
                            <div  class=\"col-md-6\">
                                <div  class=\"col-md-14\">
                                     <form method='post' action='index.php' >
                                        <h3 class='mt-3 text-light'>Nieuwe  Medicijn Toevoegen</h3>
                                        <table class=\"mt-5\">
                                            <tr><td>   <label for=\"naam\" class='text-light'>Medicijn naam:</label></td><td>
                                                <input type=\"text\" name=\"naam\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"werking\" class='text-light'>Werking:</label></td><td>
                                                <input type=\"text\" name=\"werking\" required value = ''/></td></tr>
                                            <tr><td>
                                                <label for=\"bijwerking\" class='text-light'>bijwerking:</label></td><td>
                                                <input type=\"text\" name=\"bijwerking\" required value= ''/></td></tr>
                                            <tr><td>
                                                <label for=\"verzekerd\" class='text-light'>Verzekerd:</label></td><td>
                                                <input type=\"text\" name=\"verzekerd\" required value= ''/>
                                            </td></tr>
                                        </table>
                                        <div class=\"form-group d-flex justify-content-end mt-5\">
                                        <input type=\"submit\" name=\"createMedicijnen\" class=\"btn btn-warning btn-md\" value=\"Create\">
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

    }

}