          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo SITE_ROOT;  ?>assets/dist/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['firstname']."</p><p> ".$_SESSION['lastname']; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Logged In</a>
            </div>
          </div>