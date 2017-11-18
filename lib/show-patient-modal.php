<!-- PHP display info on modal in doctor dashboard -->

<?php  
/*
include('send-prescription-doctor-dashboard.php');
 */      
require_once 'config.php';
/* GLOBAL VARIABLE FOR PATIENT ID */
$gPatientID = $_POST["patient_id"];
 if(isset($_POST["patient_id"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM patient_table WHERE patient_id = '".$_POST["patient_id"]."'";  
      //echo $query;
      
      $result = mysqli_query($DBcon, $query);  
      
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td><label>First name</label></td>  
                     <td>'.$row["patient_fname"].'</td>  
                </tr>  
                <tr>  
                     <td><label>Second name</label></td>  
                     <td>'.$row["patient_lname"].'</td>  
                </tr>
                <tr>  
                     <td><label>Address</label></td>  
                     <td>'.$row["patient_address_line_one"].'</td>  
                </tr>  
         
           ';  
        
      $output .= '  
           </table>  
      </div>
      <div class="hide-drop">
        <input name="patient_id" value="'.$row["patient_id"].'"/>
      </div>
      
       
      ';
      }
      echo $output;  
 }  
 ?>

