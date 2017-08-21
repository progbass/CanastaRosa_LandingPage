    <div class="wrapper">
	<?php echo $this->element('/admin/header');?>
      <?php echo $this->element('/admin/sidebar');?>

	  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/easyzoom.css" />
	  
     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/users/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/users');?>">Admin Management</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
				<div class="easyzoom easyzoom--overlay easyzoom--with-toggle">
				<?php //if($loggeduser['User']['image']){?>
				 <a href="<?php echo $this->webroot;?>files/user/<?php echo $loggeduser['User']['image']?>" target="_blank">
                  <img alt="User profile picture" class="profile-user-img img-responsive img-circle" src="<?php echo $this->webroot;?>files/user/<?php echo $loggeduser['User']['image']?>">
				  </a>
				  <?php// } //else { ?>
				  <!-- <a href="<?php //echo $this->webroot;?>img/avatar5.png" target="_blank">
				    <img alt="User Image" class="img-circle" src="<?php //echo $this->webroot;?>img/avatar5.png" target="_blank">
					</a> -->
				 <?php //} ?>
         <form action="<?php echo $this->webroot;?>users/edit_pro/<?php echo $loggeduser['User']['id']; ?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="data[User][image]" value="123456">
          <input type="submit" name="submit" value="Remove Image" class="btn btn-primary" style="margin-left: 25%; margin-top: 10px;">
          </form>
				 </div>
				 <!-- <button class="toggle" data-active="true">Switch off</button> -->
				 		 
                  <h3 class="profile-username text-center">
				  <?php if($loggeduser['User']['username']){?>
                      <?php echo $loggeduser['User']['username']?> 
					  <?php } else { ?>
				    <?php echo 'No Name';?>
				 <?php } ?>
				  </h3>
                  <p class="text-muted text-center"><?php echo $loggeduser['User']['role']?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Total User</b> <a class="pull-right"><?php echo $totaluser;?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Male</b> <a class="pull-right"><?php echo $totalusermale;?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Female</b> <a class="pull-right"><?php echo $totaluserfemale;?></a>
                    </li>
					<li class="list-group-item">
                      <b>My Motto : </b><?php echo $loggeduser['User']['description']?>
                    </li>
                  </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active">
				  <a href="<?php echo $this->Html->url('/admin/users/profiles/'. $loggeduser['User']['id']);?>" data-toggle="tab">Edit Profile</a>
				  </li>
                  <li>
				  <a href="<?php echo $this->Html->url('/admin/users/changepassword/'. $loggeduser['User']['id']);?>">Change Password</a>
				  </li>
                </ul>
				<div class="tab-content">
				<div class="" id="settings">
				<?php echo $this->Form->create('User',array('class'=>'form-horizontal','type'=>'file')); ?>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value='<?php echo $description['User']['username']?>' name='data[User][username]' placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" value='<?php echo $description['User']['email']?>' name='data[User][email]' placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Profile Picture</label>
                        <div class="col-sm-10">
                          <input type="file" name='data[User][image]' value='<?php echo $description['User']['image']?>'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name='data[User][address]' value='<?php echo $description['User']['address']?>'>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control edittext" name='data[User][description]' value='<?php echo $description['User']['description']?>'><?php echo $description['User']['description']?></textarea>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
<?php echo $this->Form->select('sex',array('Male'=>'Male','Female'=>'Female'),
                       array('label'=>"",'class'=>'form-control','empty'=>'Choose a Gender')); ?>                         
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
<?php echo $this->Form->select('status',array('1'=>'Active','0'=>'Deactive'),
                       array('label'=>"",'class'=>'form-control','empty'=>'Choose a Name')); ?>                         
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name='submit' class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
				</div>
				
				
				
               
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <script src="<?php echo $this->webroot;?>js/easyzoom.js"></script>
	 <script>
	 // Instantiate EasyZoom instances
	var $easyzoom = $('.easyzoom').easyZoom();

	// Setup thumbnails example
	var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

	$('.thumbnails').on('click', 'a', function(e) {
		var $this = $(this);

		e.preventDefault();

		// Use EasyZoom's `swap` method
		api1.swap($this.data('standard'), $this.attr('href'));
	});

	// Setup toggles example
	var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');
		$('.toggle').on('click', function() {
			var $this = $(this);
			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	</script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
		 selector: ".edittext",
		 plugins: "textcolor,media,code",
		 toolbar: "forecolor backcolor,code",
    });
    </script>
	  <?php echo $this->element('/admin/footer');?>
      
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
      