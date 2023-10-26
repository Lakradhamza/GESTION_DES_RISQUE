




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
         <form action="hassan.php"  method="POST" >
           <!-- <form action="" id="manage-home"> -->
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div id="msg" class=""></div>




                        <div class="row">
                            <div class="col-sm-6 form-group ">
                           
                                <label for="" class="control-label">categorie</label>

                                <select name="categorie" id="id" class="form-control form-control-sm select2" required>
                                   

                                    <?php
                                    $rides = $conn->query("SELECT * FROM lba ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['TYPE'] ?>"></option> 
                                    <?php endwhile; ?> 
                                   

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">titre</label>
                                <input name="titre" id="" class="form-control form-control-sm"  required>
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">ID_CDS</label>
                                <input name="CDS_ID" id="" class="form-control form-control-sm"  required>
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">D</label>
                                <input name="D" id="" class="form-control form-control-sm"  required>
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">I</label>
                                <input name="I" id="" class="form-control form-control-sm"  required>
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">C</label>
                                <input name="C" id="" class="form-control form-control-sm"  required>
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Description du scenario de risque</label>
                                <input name="DSR" id="" class="form-control form-control-sm"  required>
                            </div>



                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Source de menace</label>
                                <input name="SM" id="" class="form-control form-control-sm"  required>
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Actifs concernées</label>
                                <input name="Actifs" id="" class="form-control form-control-sm" required>
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Contrôle mis en place</label>
                                <input name="Contrôle" id="" class="form-control form-control-sm"  required>
                            </div>

                            <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Vulnérabilité/s</label>
                                <select name="Vulnérabilité" id="id_v" class="form-control form-control-sm select2" required>
                                    <option value=""></option>

                                    <?php
                                    $rides = $conn->query("SELECT * FROM lv  ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['Vulnérabilité'] ?>"><?php echo ucwords($row['Vulnérabilité']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">iso</label>
                                <select name="iso" id="id_is" class="form-control form-control-sm select2" required>
                                    <option value=""></option>

                                    <?php
                                    $rides = $conn->query("SELECT * FROM mds  ");
                                    while ($row = $rides->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['OSM'] ?>"><?php echo ucwords($row['OSM']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div> 
                        </div>

                        <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">ID_TR</label>
                                <input name="TR_ID" id="" class="form-control form-control-sm"  required>
                            </div>

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Traitment</label>
                                <select name="TR" id="TR" class="form-control form-control-sm select2" required>
                                    <option value=""></option>

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
                                <select name="epme" id="epme" class="form-control form-control-sm select2" required>
                                    <option value=""></option>

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
                                <label for="" class="control-label">ID_RB</label>
                                <input name="RB_ID" id="" class="form-control form-control-sm"  required>
                            </div> 




                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB impact</label>
                                <input name="IMPACT_B" id="w" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB potonti</label>
                                <input name="POTENTIALITE_B" id="q" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>

                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RB</label>
                                <output name="RISKSCOREBRUT" id="e" value="sum" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RBNv</label>
                                <output name="NIVEAURISKBRUT" id="myid" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>

                           



                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">ID_RN</label>
                                <input name="RN_ID" id="" class="form-control form-control-sm"  required>
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Rn impact</label>
                                <input name="Rn_impact" id="x" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Rn potonti</label>
                                <input name=" Rn_potonti" id="y" class="form-control form-control-sm number text-right" onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>

                           



                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">ID_RR</label>
                                <input name="RR_ID" id="" class="form-control form-control-sm"  required>
                            </div>


                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR impact</label>
                                <input name="RR_impact" id="h" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">RR potonti</label>
                                <input name="RR_potonti" id="j" class="form-control form-control-sm number text-right"  onfocus="$(this).select()" onkeyup="update_tbl()" required>
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
                 <input type="submit" name="submit" value="submit">
            </form>
        </div>
        <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <!-- <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-home">Save</button> -->
               
                <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=home">Cancel</a>
            </div>
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

