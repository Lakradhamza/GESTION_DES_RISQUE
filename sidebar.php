  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
      <a href="./" class="brand-link">
        <?php if ($_SESSION['login_type'] == 1) : ?>
          <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
        <?php else : ?>
          <h3 class="text-center p-0 m-0"><b>USER</b></h3>
        <?php endif; ?>

      </a>

    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-th-house"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <?php if ($_SESSION['login_type'] ==  1) : ?>
            <li class="nav-item">
              <a href="#" class="nav-link nav-edit_actif">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  gestion des actifs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php?page=new_actif" class="nav-link nav-new_actif tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=actif_list" class="nav-link nav-actif_list tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link nav-edit_Vulnérabilité">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  gestion des vulnérabilité
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php?page=new_Vulnérabilité" class="nav-link nav-new_Vulnérabilité tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=Vulnérabilité_list" class="nav-link nav-Vulnérabilité_list tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link nav-edit_mesure">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  gestion des mesures
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php?page=new_mesure" class="nav-link nav-new_mesure tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=mesure_list" class="nav-link nav-mesure_list tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- <li class="nav-item dropdown"> 
              <a href="./index.php?page=reports" class="nav-link nav-reports">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Sales Report
                </p>
              </a>
            </li>-->
            <li class="nav-item">
              <a href="#" class="nav-link nav-edit_user">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Add New</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
    $(document).ready(function() {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if (s != '')
        page = page + '_' + s;
      if ($('.nav-link.nav-' + page).length > 0) {
        $('.nav-link.nav-' + page).addClass('active')
        if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
          $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
          $('.nav-link.nav-' + page).parent().addClass('menu-open')
        }

      }

    })
  </script>
 