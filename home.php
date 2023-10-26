<?php include 'db_connect.php' ?>
<div class="col-lg-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <div class="card-tools">
        <?php if ($_SESSION['login_type'] == 1) : ?>
          <a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index.php?page=test_new_home2"><i class="fa fa-plus"></i> Add New</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="card-body">
      <table class="table tabe-hover table-bordered" id="list">
        <!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
        <thead>
          <tr>
            <th rowspan="2">ID</td>
            <th rowspan="2">Catégorie</td>
            <th rowspan="2">Titre</td>
            <th colspan="3">Critères de sécurité impactés</td>
            <th rowspan="2" width=20%>Description du scenario de risque</td>
            <th rowspan="2">Source de menace</td>
            <th rowspan="2">Actifs concernées</td>
            <th rowspan="2" width=25%>Vulnérabilités</td>


            <th colspan="4">Risque Brut</td>
            <th colspan="6">Risque Net</td>
            <th colspan="2">Traitement des risques</td>
            <th colspan="4">Risques résiduel</td>
              <?php if ($_SESSION['login_type'] == 1) : ?>
            <th rowspan="2">action</td>
            <?php endif; ?>

          </tr>
          <tr>
            <th>D</td>
            <th>I</td>
            <th>C</td>
            <th>Impact</td>
            <th>Potentialité </td>
            <th>Risk Score brut</td>
            <th>Niveau du risque brut</td>
            <th width=20%>Contrôle mis en place </td>
            <th>Performance du contrôle</td>
            <th>Impact </td>
            <th>Potentialité </td>
            <th>Risk Score Net</td>
            <th>Niveau du risque Net</td>
            <th>Plan de traitement de risque</td>
            <th width=20%>Traitement proposée</td>
            <th>Impact</td>
            <th>Potentialité </td>
            <th>Risk Score résiduel</td>
            <th>Niveau du risque résiduel
              </td>

          </tr>
        </thead>
        <tbody>
          <?php

          // cd.id,cd.CATEGORIE,cd.TITRE,ds.D,ds.I,ds.C,cd.DSR,cd.SM,cd.AC,cd.VULNERABILITES,rb.IMPACT,rb.POTENTIALITE,rb.RISKSCOREBRUT,rb.NIVEAURISKBRUT,rn.C_M_E_P,rn.P_D_C,rn.IMPACT,rn.POTENTIALITE,rn.RISKSCORENET,
          //           rn.N_R_N,rr.IMPACT,rr.POTENTIALITE,rr.RISKSCORERESIDUEL,rr.NIVEAURISQUERESIDUEL,rt.PTR,rt.TP

          $qry = $conn->query("SELECT *
            FROM  c_d_r cd,cds ds ,r_b rb,r_n rn,t_r rt,r_r rr
          where ds.ID_CDS =cd.CDS_ID and
                rb.ID_RB=cd.RB and 
                rn.ID_RN=cd.RN and
                rt.ID_TDR=cd.TR and
                rr.ID_rr=cd.RR ");
          while ($row = $qry->fetch_assoc()) :
          ?>
            <tr>

              <td class=""><b><?php echo ucwords($row['id']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['CATEGORIE']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['TITRE']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['D']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['C']) ?></b></td>


              <td class=""><b><?php echo ucwords($row['I']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['DSR']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['SM']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['AC']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['VULNERABILITES']) ?></b></td>


              <td class=""><b><?php echo ucwords($row['IMPACT_B']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['POTENTIALITE_B']) ?></b></td>

              <?php
              $v = $row['RISKSCOREBRUT'];

              if ($v < 5) {
                echo "<td style='background-color:green'>" . $v . "</td>";
                echo "<td style='background-color:green'>" . $row['NIVEAURISKBRUT'] . "</td>";
              } elseif ($v >= 5 && $v <= 14) {
                echo "<td  style='background-color:yellow'>" . $v . "</td>";
                echo "<td style='background-color:yellow'>" . $row['NIVEAURISKBRUT'] . "</td>";
              } elseif ($v >= 15) {
                echo "<td style='background-color:red' >" . $v . "</td>";
                echo "<td style='background-color:red'>" . $row['NIVEAURISKBRUT'] . "</td>";
              }

              ?>

              <td class=""><b><?php echo ucwords($row['C_M_E_P']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['P_D_C']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['IMPACT_N']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['POTENTIALITE_N']) ?></b></td>



              <?php
              $v = $row['RISKSCORENET'];

              if ($v < 5) {
                echo "<td style='background-color:green'>" . $v . "</td>";
                echo "<td style='background-color:green'>" . $row['N_R_N'] . "</td>";
              } elseif ($v >= 5 && $v <= 14) {
                echo "<td  style='background-color:yellow'>" . $v . "</td>";
                echo "<td style='background-color:yellow'>" . $row['N_R_N'] . "</td>";
              } elseif ($v >= 15) {
                echo "<td style='background-color:red' >" . $v . "</td>";
                echo "<td style='background-color:red'>" . $row['N_R_N'] . "</td>";
              }

              ?>



              <td class=""><b><?php echo ucwords($row['PTR']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['TP']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['IMPACT_R']) ?></b></td>
              <td class=""><b><?php echo ucwords($row['POTENTIALITE_R']) ?></b></td>

              <?php
              $v = $row['RISKSCORERESIDUEL'];

              if ($v < 5) {
                echo "<td style='background-color:green'>" . $v . "</td>";
                echo "<td style='background-color:green'>" . $row['NIVEAURISQUERESIDUEL'] . "</td>";
              } elseif ($v >= 5 && $v <= 14) {
                echo "<td  style='background-color:yellow'>" . $v . "</td>";
                echo "<td style='background-color:yellow'>" . $row['NIVEAURISQUERESIDUEL'] . "</td>";
              } elseif ($v >= 15) {
                echo "<td style='background-color:red' >" . $v . "</td>";
                echo "<td style='background-color:red'>" . $row['NIVEAURISQUERESIDUEL'] . "</td>";
              }

              ?>








              <?php if ($_SESSION['login_type'] == 1) : ?>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="index.php?page=updatehome&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
                      <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-flat delete_home" data-id="<?php echo $row['id'] ?>">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              <?php endif; ?>

            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<style>
  table td {
    vertical-align: middle !important;
  }
</style>
<script>
  $(document).ready(function() {
    $('#list').dataTable()
    $('.view_home').click(function() {
      uni_modal("risks's Details", "view_home.php?id=" + $(this).attr('data-id'), "large")
    })
    $('.delete_home').click(function() {
      _conf("Are you sure to delete this risk?", "delete_home", [$(this).attr('data-id')])
    })
  })

  function delete_home($id) {
    start_load()
    $.ajax({
      url: 'ajax.php?action=delete_home',
      method: 'POST',
      data: {
        id: $id
      },
      success: function(resp) {
        if (resp == 1) {
          alert_toast("Data successfully deleted", 'success')
          setTimeout(function() {
            location.reload()
          }, 1500)

        }
      }
    })
  }
</script>