<!-- PHP to send prescription from doctor to the order table -->
<?php

 if(isset($_POST["patient_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("127.0.0.1", "root", "", "c9"); 
      
      
      $query = "SELECT * FROM patient_table WHERE patient_id = '".$_POST["patient_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           echo '  
                <tr>  
                     <td>Patient Name: </td>  
                     <td>'.$row["patient_fname"].'</td>  
                </tr>  
                <tr>  
                     <td>Patient Last name</td>  
                     <td>'.$row["patient_lname"].'</td>  
                </tr>  
           ';  
      }  
 }  

?>