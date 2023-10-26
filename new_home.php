<?php 





// class Actions
// {
// 	private $db;

// 	public function __construct()
// 	{
// 		ob_start();
// 		include 'db_connect.php';

// 		$this->db = $conn;
// 	}
// 	function __destruct()
// 	{
// 		$this->db->close();
// 		ob_end_flush();
// 	}}


 $conn = mysqli_connect('localhost','root','hamza1234','gestionrisque');

 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   
     //Student Personal Details
     if (isset($_POST['submit'])) {
      $id_cdr=$_POST['id_cdr'];
     $CATEGORIE = $_POST['categorie'];
     $TITRE=  mysqli_real_escape_string($conn,$_POST['titre']);

     $DSR= mysqli_real_escape_string($conn,$_POST['DSR']);
     $SM =  mysqli_real_escape_string($conn,$_POST['SM']);
     $Actifs=  mysqli_real_escape_string($conn,$_POST['Actifs']);
     $Contrôle = $_POST['Contrôle'];
     $iso= $_POST['iso'];
     $TR_ID= $_POST['TR_ID'];
     $tr=$_POST['TR'];
     $epme= $_POST['epme'];
     $Vulnérabilité = $_POST['Vulnérabilité'];

     $CDS_ID = $_POST['CDS_ID'];
     $D = $_POST['D'];
     $C = $_POST['C'];
     $I = $_POST['I'];
     

     $RB_ID = $_POST['RB_ID'];
     $IMPACT_B = $_POST['IMPACT_B'];
     $POTENTIALITE_B = $_POST['POTENTIALITE_B'];
     $sc_b=$POTENTIALITE_B*$IMPACT_B;
     if ($sc_b < 5) {


     $nv_b= "Risque Mineurs";
  }
  if ($sc_b >= 5) {


    $nv_b = "Risque Majeurs";
  }
  if ($sc_b >= 15) {


    $nv_b = "Risque Critiques";
  }
   
     
    
     

     $RN_ID = $_POST['RN_ID'];
     $Rn_impact = $_POST['Rn_impact'];
     $Rn_potonti = $_POST['Rn_potonti'];
     $sc_n=$Rn_impact*$Rn_potonti;
     if ($sc_n< 5) {


     $nv_n= "Risque Mineurs";
  }
  if ($sc_n >= 5) {


    $nv_n = "Risque Majeurs";
  }
  if ($sc_n >= 15) {


    $nv_n = "Risque Critiques";
  }
    


     $RR_ID = $_POST['RR_ID'];
     $RR_impact = $_POST['RR_impact'];
     $RR_potonti = $_POST['RR_potonti'];
     $sc_r=$RR_impact*$RR_potonti;
     if ($sc_r < 5) {


     $nv_r= "Risque Mineurs";
  }
  if ($sc_r >= 5) {


    $nv_r = "Risque Majeurs";
  }
  if ($sc_r>= 15) {


    $nv_r = "Risque Critiques";
  }
  





   
     
    //   extract($_POST);
		//  $data = "";
		//  foreach ($_POST as $k => $v) {
		//  	if (!in_array($k, array('id')) && !is_numeric($k)) {
		//  		if (empty($data)) {
		//  			$data .= " $k='$v' ";
		//  		} else {
		//  			$data .= ", $k='$v' ";
		//  		}
		//  	}
		//  }
     

    
    //  // Code for Image upload and Its name will be saved in db
    //  $original = $_FILES['student_photo']['name'];
    //  $tmpname = $_FILES['student_photo']['tmp_name'];
    //  $path = "images/". $original;
    //  $move = move_uploaded_file($tmpname,$path);
     
     //Student Lead Details 
    //  $lead_source = $_POST['lead_source'];
    //  $lead_medium = $_POST['lead_medium'];
    //  $states = $_POST["states"];  // Below code is for Inserting Checkbox Selected States
    //   $data = array();
    //    foreach($states as $state_list)
    //    {
    //          $data[] = $state_list;  
    //          $interested_states = implode(',',$data); 
    //    }
         
    //  $leadstatus = $_POST['lead_status'];
    //  $startyear = $_POST['startyear'];
    //  $startmonth = $_POST['startmonth'];
    //  $main_course = $_POST['main_course'];
    //  $course_stream = $_POST['course_stream'];

    //  //Student Educational Details
    //  $marks_10 = $_POST['10_marks'];
    //  $marks_20 = $_POST['20_marks'];
    //  $graduation_marks = $_POST['graduation_marks'];
    //  $graduationstream = $_POST['graduationstream'];
    //  $graduateyear = $_POST['graduateyear'];
    //  $jobprofile = $_POST['jobprofile'];
    //  $expyear = $_POST['expyear'];
    //  $expmonth = $_POST['expmonth'];
     
    //  // For Friends Recommendation 
    //  $name_one = $_POST['name_one'];
    //  $contact_one = $_POST['contact_one'];
    //  $name_two = $_POST['name_two'];
    //  $contact_two = $_POST['contact_two'];
    //  $add_comment = $_POST['add_comment'];
 
      mysqli_begin_transaction($conn);

     
      try
       {        
// ,DSR,SM,AC,VULNERABILITES,RB,RN,TR,RR            ,'$DSR','$SM','$Actifs','$Vulnérabilité',$RN_ID,$tr      
// ,DSR,SM,AC,VULNERABILITES,RB,RN,TR,RR            ,'$DSR','$SM','$Actifs','$Vulnérabilité',$RN_ID,$tr      
     $sql =("INSERT INTO c_d_r (id,categorie,titre,DSR,SM,AC,VULNERABILITES,CDS_ID,RB,RN,TR,RR) value ($id_cdr,'$CATEGORIE','$TITRE','$DSR','$SM','$Actifs','$Vulnérabilité',$CDS_ID,$RB_ID,$RN_ID,$TR_ID,$RR_ID)");


     $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
             VALUES($CDS_ID , '$D' , '$C' , '$I')";


 $sql2 = "INSERT INTO r_b(ID_RB,IMPACT_B,POTENTIALITE_B,RISKSCOREBRUT,NIVEAURISKBRUT)
             VALUES($RB_ID ,$IMPACT_B,$POTENTIALITE_B,$sc_b, '$nv_b' )";
             


             $sql3 = "INSERT INTO r_n(ID_RN,C_M_E_P,P_D_C,IMPACT_N,POTENTIALITE_N,RISKSCORENET,N_R_N)
             VALUES($RN_ID ,'$SM' ,'$epme',$Rn_impact, $Rn_potonti,$sc_n,'$nv_n' )";
              $sql4 = "INSERT INTO r_r(ID_RR,IMPACT_R,POTENTIALITE_R,RISKSCORERESIDUEL,NIVEAURISQUERESIDUEL)
              VALUES(  $RR_ID ,$RR_impact, $RR_potonti,$sc_r,'$nv_r' )";
             
             $sql5 = "INSERT INTO t_r(ID_TDR,PTR,TP)
             VALUES(  $TR_ID,'$tr' ,  '$iso' )";

             


// $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
//              VALUES($CDS_ID , '$D' , '$C' , '$I')";


// $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
//              VALUES($CDS_ID , '$D' , '$C' , '$I')";
      
    
    

    $query1 = mysqli_query($conn,$sql);
  //  $query = mysqli_query($this->conn,$sql);
  // $query2 = mysqli_query($this->$conn, $sql); 
      $query2 = mysqli_query($conn,$sql1);
      $query3 = mysqli_query($conn,$sql2);
      $query4 = mysqli_query($conn,$sql3);
      $query5 = mysqli_query($conn,$sql4);
      $query6 = mysqli_query($conn,$sql5);
     
   

     mysqli_commit($conn);
     echo "Data Submitted";

      }
    catch (mysqli_sql_exception $exception) 
     {
      mysqli_rollback($conn);
            throw $exception;
     echo "ErrorW";

    } 
   if($query2){
      header("location:  http://localhost/GESTIONDESRISQUE0621/");
      

     }

}
?>


<?php
//      if($query && $query2 && $query3 && $query4)
//      {
//         echo "Successfully Inserted".mysqli_commit($conn);
//      }
//      else
//      {
//         echo mysqli_error($conn);     
//         echo "<h3 style='color:red'>Commit Transaction Failed.....So Your Data not Inserted</h3>".mysqli_rollback($conn);
//      }