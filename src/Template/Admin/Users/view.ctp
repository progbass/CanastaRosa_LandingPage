<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php if($loggeduser->role == "Administrator"){?>
<div class="wrapper">

      <?php echo $this->element('/admin/header');?>
      <?php echo $this->element('/admin/sidebar');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administrator Managemant
            <small>Administrator View</small>
          </h1>
          <ol class="breadcrumb">
           <li><a href="<?php echo $this->request->webroot.'admin/users/dashboard';?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
           <li><a href="<?php echo $this->request->webroot.'admin/users';?>"><i class="fa fa-dashboard"></i> <?php echo __('Administrator Managemant'); ?></a></li>
           <li class="active">Administrator View</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Photo : </label>
                      <?php if($user->profile_pic){ ?>
                        <img src='<?php echo $this->request->webroot.'files/user/'.$user->profile_pic;?>' style="width:150px;height:150px;border-radius: 50%;">
                       <?php } else { ?>
             <div class="circle_admincandidate">
                 <p>N/A</p>
             </div>
					 <?php }  ?>
                    </div>
				    <div class="form-group">
                      <label for="exampleInputEmail1">Role : </label>
                       <?= $user->role; ?>
                    </div>
		<div class="form-group">
				 <label for="exampleInputEmail1">Username : </label>
                      <?= h($user->username) ?>
                </div>
                    <div class="form-group">
					<label for="exampleInputEmail1">email : </label>
                      <?= h($user->email) ?>
                    </div>
					<div class="form-group">
					<label for="exampleInputEmail1">address : </label>
                      <?= h($user->address) ?>
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Gender: </label>
					  <?php
                    if ($user->gender == 'Male') {
                        echo 'Male';
                    } else {
                        echo "Female";
                    }
                    ?>
                        </div>
						<div class="form-group">
						<label for="exampleInputEmail1">Mobile No.: </label>
                      <?php echo $user->mobile_no; ?>
						</div>
            <div class="form-group">
            <label for="exampleInputEmail1">Description : </label>
                      <?php echo $user->description; ?>
            </div>
						<div class="form-group">
						<label for="exampleInputPassword1">Status : </label>
						<?php
                    if ($user->status == 1) {
                        echo 'Active';
                    } else {
                        echo "Deactive";
                    }
                    ?>
					   </div>
                      <div class="form-group">
            <label for="exampleInputEmail1">Date : </label>
                      <?php echo $user->date; ?>
            </div>
            </div>

                    </div>
                  </div><!-- /.box-body -->
                <?php echo $this->Form->end();?>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php echo $this->element('/admin/footer');?>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php } else {
    echo '<h2>Sorry,You are not Authorised</h2>';
  }
  ?>
<style>
.circle_admincandidate{
    position:relative;
    background:#666;
    width:110px;
    height:110px;
    text-align:center;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.circle_admincandidate p
{
    font:italic 52px Georgia;
    color:#fff;
    vertical-align:middle;
    height:50px;
    position: inherit;
    top:15%;
}
</style>