<?php ?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
			<?php if($loggeduser->profile_pic){?>
			  <img alt="User Image" class="img-circle" src="<?php echo $this->request->webroot;?>files/user/<?php echo $loggeduser->profile_pic;?>">
			  <?php } else { ?>
				<img alt="User Image" class="user-image" src="<?php echo $this->request->webroot;?>img/avatar5.png">
			 <?php } ?>
            </div>
            <div class="pull-left info">
			  <?php if($loggeduser->username){?>
				  <p><?php echo ucfirst($loggeduser->username);?></p>
				  <?php } else { ?>
				    <p><?php echo 'No Name';?></p>
				 <?php } ?>
              <a href="#" title='Profile Setting'><i class="fa fa-circle text-success"></i> Online</a>|
			  <a href="<?php echo $this->request->webroot.'admin/users/logout';?>" title='Signout'>Signout</a>
            </div>
          </div>
          <!-- search form -->
          <form class="sidebar-form" method="get" action="#">
            <div class="input-group">
              <!-- <input type="text" placeholder="Search..." class="form-control" name="q">
              <span class="input-group-btn">
                <button class="btn btn-flat" id="search-btn" name="search" type="submit"><i class="fa fa-search"></i></button>
              </span> -->
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
            	<?php if($loggeduser->role == 'Administrator'){?>
            	<a href="<?php echo $this->request->webroot.'admin/users/dashboard';?>"><i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
				<?php }
				/*elseif($loggeduser['User']['role'] == 'Admin') { ?>
				<a href="<?php echo $this->Html->url('/admin/users/dashboard');?>"><i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
				<?php } elseif($loggeduser['User']['role'] == 'User') { ?>
				<a href="<?php echo $this->Html->url('/users/administrator_dashboard');?>"><i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
				<?php } */ ?>
			</li>
			<li>
				<?php if($loggeduser->role == 'Administrator') { ?>
				    <a href="<?php echo $this->request->webroot.'admin/users';?>">
						<i class="fa fa-user"></i>
						<span>Users</span>
					</a>
				<?php } ?>

			</li>
                        <li>
				<?php if($loggeduser->role == 'Administrator'){?>
					<a href="<?php echo $this->request->webroot.'admin/categories';?>">
						<i class="fa fa-user"></i>
						<span>Categories</span>
					</a>
				<?php } ?>
			</li>      

			<!--li>
				<?php //if($loggeduser['User']['role'] == 'Administrator'){?>
					<a href="<?php //echo $this->Html->url('/admin/carehomes');?>">
						<i class="fa fa-map-marker"></i>
						<span>Care Homes Management</span>
					</a>
				<?php //} ?>

			</li-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
