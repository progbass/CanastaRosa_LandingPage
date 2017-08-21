<header class="main-header">
        <!-- Logo -->
        <a class="logo" href="<?php echo $this->request->webroot;?>" target="_blank">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?= __('canastaroca') ?></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?=  __('canastaroca'); ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav role="navigation" class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a role="button" data-toggle="offcanvas" class="sidebar-toggle" href="#">
            <span class="sr-only"><?php echo __('Toggle navigation'); ?></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<?php if($loggeduser->profile_pic){?>
                  <img alt="User Image" class="user-image" src="<?php echo $this->request->webroot;?>files/user/<?php echo $loggeduser->profile_pic;?>">
				  <?php } else { ?>
				    <img alt="User Image" class="user-image" src="<?php echo $this->request->webroot;?>img/avatar5.png">
				 <?php } ?>
                  <span class="hidden-xs">
				  <?php if($loggeduser->username){?>
				  <?php echo ucfirst($loggeduser->username);?>
				  <?php } else { ?>
				    <?php echo 'No Name';?>
				 <?php } ?>
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
				  <?php if($loggeduser->profile_pic){?>
                  <img alt="User Image" class="img-circle" src="<?php echo $this->request->webroot;?>files/user/<?php echo $loggeduser->profile_pic;?>">
				  <?php } else { ?>
				    <img alt="User Image" class="img-circle" src="<?php echo $this->request->webroot;?>img/avatar5.png">
				 <?php } ?>
                    <p>
                    <?php if($loggeduser->username){?>
            <?php echo __('Hi'); ?>
            <?php } ?>
					<?php if($loggeduser->username){?>
                      <?php echo ucfirst($loggeduser->username);?> 
					  <?php } else { ?>
				    <?php echo 'No Name';?>
				 <?php } ?>
				 
                      <small>Member since <?php echo date("jS F, Y H:i a", strtotime($loggeduser->date)); ?></small>
                    </p>
                  </li>
                                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php if($loggeduser->role == 'Administrator'){?>
                         <a class="btn btn-default btn-flat" href="<?php echo $this->request->webroot.'admin/users/profiles/'.$loggeduser->id;?>">Profile</a>
                     <?php } ?>
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-default btn-flat" href="<?php echo $this->request->webroot.'admin/users/logout';?>">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <?php if($loggeduser->role == 'Administrator'){?>
                   <a href="<?php echo $this->request->webroot.'admin/users/profiles/'. $loggeduser->id;?>" title='Setting'><i class="fa fa-gears"></i></a>
                <?php } ?>
              </li>
		
            </ul>
          </div>
        </nav>
      </header>
	  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>admin/bootstrap/css/style.css" />
	  
	  <style>
	  .slimScrollDiv .menu a:hover {
    background: #e7e7e7 none repeat scroll 0 0 !important;
}
.menu{overflow-y: scroll !important;}
	  </style>
	  
	  