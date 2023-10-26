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
    $id=$_GET['id'];
 $result = mysqli_query($conn,"SELECT * FROM c_d_r WHERE id =$id ");
 $row = mysqli_fetch_array($result);
 $resul = mysqli_query($conn,"SELECT * FROM cds WHERE ID_CDS =$id ");
 $r = mysqli_fetch_array($resul);
 $resu = mysqli_query($conn,"SELECT * FROM t_r WHERE ID_TDR =$id ");
 $rt = mysqli_fetch_array($resu);
 $resultRB = mysqli_query($conn,"SELECT * FROM r_b WHERE ID_RB =$id ");
 $rowRB = mysqli_fetch_array($resultRB);
 $resultRN = mysqli_query($conn,"SELECT * FROM r_n WHERE ID_RN =$id ");
 $rowRN = mysqli_fetch_array($resultRN);
 $resultRR = mysqli_query($conn,"SELECT * FROM r_r WHERE ID_RR =$id ");
 $rowRR = mysqli_fetch_array($resultRR);

     //Student Personal Details
     
  //    
if(count($_POST)>0){
  $CATEGORIE = $_POST['categorie'];
  $TITRE=  mysqli_real_escape_string($conn,$_POST['titre']);

  $DSR= mysqli_real_escape_string($conn,$_POST['DSR']);
  $SM =  mysqli_real_escape_string($conn,$_POST['SM']);
  $Actifs=  mysqli_real_escape_string($conn,$_POST['Actifs']);
    
     $D = $_POST['D'];
      $C = $_POST['C'];
     $I = $_POST['I'];
     $CDS_ID = $r['ID_CDS'];
   
        $Contrôle = $_POST['Contrôle'];
         $iso= $_POST['iso'];
           $TR_ID= $rt['ID_TDR'];
            $tr=$_POST['TR'];
            $epme= $_POST['epme'];
           $Vulnérabilité = $_POST['Vulnérabilité'];
           $RB_ID = $rowRB['ID_RB'];
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
            
           $RN_ID = $rowRN['ID_RN'];
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
            $RR_ID = $rowRR['ID_RR'];
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
             try
             {  

     $sql =("UPDATE c_d_r set  titre='$TITRE',categorie='$CATEGORIE',DSR='$DSR',AC='$Actifs', SM='$SM',VULNERABILITES='$Vulnérabilité' where id=$id ");
     $sql1 = ("UPDATE cds set  D='$D' , C='$C' , I='$I' where ID_CDS=$CDS_ID ");
        $sql2 = "UPDATE r_b  set  IMPACT_B=$IMPACT_B,POTENTIALITE_B=$POTENTIALITE_B,RISKSCOREBRUT=$sc_b, NIVEAURISKBRUT='$nv_b' where  ID_RB= $RB_ID";
             


          $sql3 = ("UPDATE r_n   set P_D_C='$epme',IMPACT_N=$Rn_impact,POTENTIALITE_N=$Rn_potonti, RISKSCORENET=$sc_n,N_R_N='$nv_n' where ID_RN=  $RN_ID");
          $sql7 = ("UPDATE r_n   set C_M_E_P='$Contrôle'  where ID_RN=  $RN_ID");
            $sql4 = "UPDATE r_r set  IMPACT_R=$RR_impact, POTENTIALITE_R=$RR_potonti,RISKSCORERESIDUEL=$sc_r,NIVEAURISQUERESIDUEL='$nv_r' where ID_RR=$RR_ID";
             
            $sql5 = "UPDATE t_r SET  PTR='$tr' ,TP='$iso'where ID_TDR= $TR_ID";

             


     $query1 = mysqli_query($conn,$sql);
     $query2 = mysqli_query($conn,$sql1);
     $query3 = mysqli_query($conn,$sql2);
     $query4 = mysqli_query($conn,$sql3);
     $query5 = mysqli_query($conn,$sql4);

     $query6 = mysqli_query($conn,$sql5);
     $query7 = mysqli_query($conn,$sql7);
     mysqli_begin_transaction($conn);
 
    }
    catch (mysqli_sql_exception $exception) 
     {
      mysqli_rollback($conn);
            throw $exception;
     echo "ErrorW";

    } 
    if($query7){
        if(! headers_sent()){
        header("location:  http://localhost/GESTIONDESRISQUE0621/");
     
    }else{ echo '<script type="text/javascript">window.location.href="http://localhost/GESTIONDESRISQUE0621/";</script>';}
       }
         
  
    
    }
  //    $DSR= $_POST['DSR'];
  //    $SM = $_POST['SM'];
  //    $Actifs= $_POST['Actifs'];

  //    $Contrôle = $_POST['Contrôle'];
  //    $iso= $_POST['iso'];
  //    $TR_ID= $_POST['TR_ID'];
  //    $tr=$_POST['TR'];
  //    $epme= $_POST['epme'];
  //    $Vulnérabilité = $_POST['Vulnérabilité'];

  //    $CDS_ID = $_POST['CDS_ID'];
  //    $D = $_POST['D'];
  //    $C = $_POST['C'];
  //    $I = $_POST['I'];
     

  //    $RB_ID = $_POST['RB_ID'];
  //    $IMPACT_B = $_POST['IMPACT_B'];
  //    $POTENTIALITE_B = $_POST['POTENTIALITE_B'];
  //    $sc_b=$POTENTIALITE_B*$IMPACT_B;
  //    if ($sc_b < 5) {


  //    $nv_b= "Risque Mineurs";
  // }
  // if ($sc_b >= 5) {


  //   $nv_b = "Risque Majeurs";
  // }
  // if ($sc_b >= 15) {


  //   $nv_b = "Risque Critiques";
  // }
   
     
    
     

  //    $RN_ID = $_POST['RN_ID'];
  //    $Rn_impact = $_POST['Rn_impact'];
  //    $Rn_potonti = $_POST['Rn_potonti'];
  //    $sc_n=$Rn_impact*$Rn_potonti;
  //    if ($sc_n< 5) {


  //    $nv_n= "Risque Mineurs";
  // }
  // if ($sc_n >= 5) {


  //   $nv_n = "Risque Majeurs";
  // }
  // if ($sc_n >= 15) {


  //   $nv_n = "Risque Critiques";
  // }
    


  //    $RR_ID = $_POST['RR_ID'];
  //    $RR_impact = $_POST['RR_impact'];
  //    $RR_potonti = $_POST['RR_potonti'];
  //    $sc_r=$RR_impact*$RR_potonti;
  //    if ($sc_r < 5) {


  //    $nv_r= "Risque Mineurs";
  // }
  // if ($sc_r >= 5) {


  //   $nv_r = "Risque Majeurs";
  // }
  // if ($sc_r>= 15) {


  //   $nv_r = "Risque Critiques";
  // }
  





   
     
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
 
    

     
           
// ,DSR,SM,AC,VULNERABILITES,RB,RN,TR,RR            ,'$DSR','$SM','$Actifs','$Vulnérabilité',$RN_ID,$tr      
// ,DSR,SM,AC,VULNERABILITES,RB,RN,TR,RR            ,'$DSR','$SM','$Actifs','$Vulnérabilité',$RN_ID,$tr      
  


//      $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
//              VALUES($CDS_ID , '$D' , '$C' , '$I')";


//  $sql2 = "INSERT INTO r_b(ID_RB,IMPACT_B,POTENTIALITE_B,RISKSCOREBRUT,NIVEAURISKBRUT)
//              VALUES($RB_ID ,$IMPACT_B,$POTENTIALITE_B,$sc_b, '$nv_b' )";
             


//              $sql3 = "INSERT INTO r_n(ID_RN,C_M_E_P,P_D_C,IMPACT_N,POTENTIALITE_N,RISKSCORENET,N_R_N)
//              VALUES($RN_ID ,'$SM' ,'$epme',$Rn_impact, $Rn_potonti,$sc_n,'$nv_n' )";
//               $sql4 = "INSERT INTO r_r(ID_RR,IMPACT_R,POTENTIALITE_R,RISKSCORERESIDUEL,NIVEAURISQUERESIDUEL)
//               VALUES(  $RR_ID ,$RR_impact, $RR_potonti,$sc_r,'$nv_r' )";
             
//              $sql5 = "INSERT INTO t_r(ID_TDR,PTR,TP)
//              VALUES(  $TR_ID,'$tr' ,  '$iso' )";

             


// $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
//              VALUES($CDS_ID , '$D' , '$C' , '$I')";


// $sql1 = "INSERT INTO cds(ID_CDS,D,C,I)
//              VALUES($CDS_ID , '$D' , '$C' , '$I')";
      
    
    


  //  $query = mysqli_query($this->conn,$sql);
  // $query2 = mysqli_query($this->$conn, $sql); 
    //   $query2 = mysqli_query($conn,$sql1);
    //   $query3 = mysqli_query($conn,$sql2);
    //   $query4 = mysqli_query($conn,$sql3);
    //   $query5 = mysqli_query($conn,$sql4);
    //   $query6 = mysqli_query($conn,$sql5);
     
   

   
      

   
//     if($query1){
//   header("location:  http://localhost/GESTIONDESRISQUE0621/");
//  echo "saalm";
//      }


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href="style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


</head>
<!-- <form  id="manage-home" action="hassan.php"  method="POST"  > -->
<body>

<div class="col-lg-12">
    <div class="card card-outline card-primary">
         <div class="card-body">
         <form action=""  method="POST" >
           <!-- <form action="" id="manage-home"> -->
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div id="msg" class=""></div>




                        <div class="row">
                            <div class="col-sm-6 form-group ">
                           
                                <label for="" class="control-label">categorie </label>

                                <select name="categorie" id="id"   class="form-control form-control-sm select2" >
                                   <option ><?php echo $row['CATEGORIE'] ?></option>

                                     <?php
                                    $CAT = $conn->query("SELECT  DISTINCT TYPE FROM lba ");
                                    while ($ro = $CAT->fetch_assoc()) :
                                    ?>
                                        <option ><?php echo ucwords($ro['TYPE']) ?></option> 
                                    <?php endwhile; ?>  
                                   

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">titre:</label>
                                <input name="titre" id="" class="form-control form-control-sm" value="<?php echo  $row['TITRE'] ?>"  >
                            </div>

                       


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">D</label>
                                <input name="D" id="" value="<?php echo  $r['D'] ?>"class="form-control form-control-sm"  >
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">I</label>
                                <input name="I" id=""  value="<?php echo  $r['I'] ?>" class="form-control form-control-sm"  >
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">C</label>
                                <input name="C" id="" value="<?php echo  $r['C'] ?>"  class="form-control form-control-sm"  >
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Description du scenario de risque</label>
                                <input name="DSR" id="" value="<?php echo  $row['DSR'] ?>" class="form-control form-control-sm"  >
                            </div>



                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Source de menace</label>
                                <input name="SM" id="" value="<?php echo  $row['SM'] ?>" class="form-control form-control-sm"  >
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Actifs concernées</label>
                                <input name="Actifs" id="" value="<?php echo  $row['AC'] ?>"  class="form-control form-control-sm" >
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Contrôle mis en place</label>
                                <input name="Contrôle" id="" value="<?php echo $rowRN['C_M_E_P'] ?>" class="form-control form-control-sm"  >
                            </div>

                            <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Vulnérabilité/s:  </label>
                                <select name="Vulnérabilité" id="id_v" class="form-control form-control-sm select2" >
                            
                                    <option ><?php echo $row['VULNERABILITES'] ?></option>
                                    <?php
                                    $rides = $conn->query("SELECT * FROM lv  ");
                                    while ($w = $rides->fetch_assoc()) :
                                    ?>
                                        <option ><?php echo $w['Vulnérabilité'] ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">iso</label>
                                <select name="iso" id="id_is" class="form-control form-control-sm select2" >
                                   <option ><?php echo $rt['TP'] ?></option>

                                    <?php
                                    $rides = $conn->query("SELECT * FROM mds  ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['OSM'] ?>"><?php echo ucwords($row['OSM']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div> 
                        </div>

                       

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                
                                <label for="" class="control-label">Traitment</label>
                                <select name="TR" id="TR" class="form-control form-control-sm select2" >
                                <option ><?php echo $rt['PTR'] ?></option>

                                    <?php
                                    $rides = $conn->query("SELECT  * FROM tr  ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['Traitment'] ?>"><?php echo ucwords($row['Traitment'])  ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Performance du contrôle</label>
                                <select name="epme" id="epme" class="form-control form-control-sm select2" >
                                    <option><?php echo $rowRN['P_D_C'] ?></option>
                                    
                                    <?php
                                    $rides = $conn->query("SELECT  * FROM epme  ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['N_description'] ?>"><?php echo ucwords($row['N_description'])?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                       




                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB impact</label>
                                <input name="IMPACT_B" id="w"  value="<?php echo $rowRB['IMPACT_B'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB potonti</label>
                                <input name="POTENTIALITE_B" id="q" value="<?php echo $rowRB['POTENTIALITE_B'] ?>"class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB</label>
                                <output name="RISKSCOREBRUT" id="e" value="<?php echo $rowRB['RISKSCOREBRUT'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RBNv</label>
                                <output name="NIVEAURISKBRUT" id="myid" value="<?php echo $rowRB['NIVEAURISKBRUT'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>

                           



                           
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Rn impact</label>
                                <input name="Rn_impact" id="x" value="<?php echo $rowRN['IMPACT_N'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Rn potonti</label>
                                <input name=" Rn_potonti" id="y" value="<?php echo $rowRN['POTENTIALITE_N'] ?>" class="form-control form-control-sm number text-right" onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RN</label>
                                <output name="RISKSCOREBRUT" id="z" value="<?php echo $rowRN['RISKSCORENET'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RNNv</label>
                                <output name="NIVEAURISKBRUT" id="myid2" value="<?php echo $rowRN['N_R_N'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>

                           



                           


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR impact</label>
                                <input name="RR_impact" id="h"  value="<?php echo $rowRR['IMPACT_R'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR potonti</label>
                                <input name="RR_potonti" id="j"  value="<?php echo $rowRR['POTENTIALITE_R'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR</label>
                                <output name="RISKSCOREBRUT" id="k" value="<?php echo $rowRR['RISKSCORERESIDUEL'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RRNv</label>
                                <output name="NIVEAURISKBRUT" id="myid3" value="<?php echo $rowRR['NIVEAURISQUERESIDUEL'] ?>" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" >
                            </div>


                          
                            <script type="text/javascript">
                            var q = document.getElementById("q"),
                                qValue = q.value;
                            var w = document.getElementById("w"),
                                wValue = w.value;

                            q.onchange = () => calculat();
                            w.onchange = () => calculat();
                        </script>
                        <script type="text/javascript">
                            var sum = 1;
                            function calculat() {
                                qValue = q.value;
                                wValue = w.value;

                                
                                var a1 = +qValue;
                                var b1 = +wValue;

                                sum1 = a1 * b1;
                                document.getElementById("e").value = sum1;
                                document.getElementById("e").innerHTML = sum1;
                                var v_var = sum1;
                                console.log(v_var);

                                if (v_var < 5) {


                                    document.getElementById("myid").innerHTML = "Risque Mineurs";
                                }
                                if (v_var >= 5) {


                                    document.getElementById("myid").innerHTML = "Risque Majeurs";
                                }
                                if (v_var >= 15) {


                                    document.getElementById("myid").innerHTML = "Risque Critiques";
                                }
                        
                            }

                            calculat()
                           
                      
                        </script>
                       


                        <script type="text/javascript">
                            var x = document.getElementById("x"),
                                xValue = x.value;
                            var y = document.getElementById("y"),
                                yValue = y.value;

                            x.onchange = () => calculate();
                            y.onchange = () => calculate();

                            function calculate() {
                                xValue = x.value;
                                yValue = y.value;

                                var sum = 1;
                                var a = +xValue;
                                var b = +yValue;

                                sum = a * b;
                                document.getElementById("z").value = sum;
                                document.getElementById("z").innerHTML = sum;
                                var v_var = sum;
                                console.log(v_var);

                                if (v_var < 5) {


                                    document.getElementById("myid2").innerHTML = "Risque Mineurs";
                                }
                                if (v_var >= 5) {


                                    document.getElementById("myid2").innerHTML = "Risque Majeurs";
                                }
                                if (v_var >= 15) {


                                    document.getElementById("myid2").innerHTML = "Risque Critiques";
                                }
                            }
                            calculate()
                        </script>


                        <script type="text/javascript">
                            var h = document.getElementById("h"),
                                hValue = h.value;
                            var j = document.getElementById("j"),
                                jValue = j.value;

                            h.onchange = () => cal();
                            j.onchange = () => cal();

                            function cal() {
                                hValue = h.value;
                                jValue = j.value;

                                var sum = 1;
                                var a = +hValue;
                                var b = +jValue;

                                sum = a * b;
                                document.getElementById("k").value = sum;
                                document.getElementById("k").innerHTML = sum;
                                var v_var = sum
                                console.log(v_var);

                                if (v_var < 5) {


                                    document.getElementById("myid3").innerHTML = "Risque Mineurs";
                                }
                                if (v_var >= 5) {


                                    document.getElementById("myid3").innerHTML = "Risque Majeurs";
                                }
                                if (v_var >= 15) {


                                    document.getElementById("myid3").innerHTML = "Risque Critiques";
                                }
                            }

                            cal()
                        </script>




















                     

<!-- 

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">DSR</label>
                                <input type="text" name="DSR" id="" cols="30" rows="2" class="form-control" <?php echo isset($DSR) ? $DSR : '' ?> />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">SM</label>
                                <input type="text" name="SM" id="" cols="30" rows="2" class="form-control" <?php echo isset($SM) ? $SM : '' ?> />
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">AC</label>
                                <input type="text" name="AC" id="" cols="30" rows="2" class="form-control" <?php echo isset($AC) ? $AC : '' ?> />
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">VULNERABILITES</label>
                                <input type="text" name="VULNERABILITES" id="" cols="30" rows="2" class="form-control" <?php echo isset($VULNERABILITES) ? $VULNERABILITES : '' ?> />
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB</label>
                                <input type="text" name="RB" id="" cols="30" rows="2" class="form-control" <?php echo isset($RB) ? $RB : '' ?> />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RN</label>
                                <input type="text" name="RN" id="" cols="30" rows="2" class="form-control" <?php echo isset($RN) ? $RN : '' ?> />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">TR</label>
                                <input type="text" name="TR" id="" cols="30" rows="2" class="form-control" <?php echo isset($TR) ? $TR : '' ?> />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR</label>
                                <input type="text" name="RR" id="" cols="30" rows="2" class="form-control" <?php echo isset($RR) ? $RR : '' ?> />
                            </div>
                        </div> 

-->




   
                    </div>
                </div>
                <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <!-- <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-home">Save</button> -->
                <input class="btn btn-flat  bg-gradient-primary mx-2" type="submit" name="submit " value="update">
                <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=home">Cancel</a>
            </div>
        </div> 
            </form>
        </div>
       
    </div>
</div>
<script>
    $('#manage-home').submit(function(e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_home',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast('Data successfully saved', "success");
                    setTimeout(function() {
                        location.href = 'index.php?page=home'
                    }, 2000)
                }
            }
        })
    })

    function displayImgCover(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cover').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


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