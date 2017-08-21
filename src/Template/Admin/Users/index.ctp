    <?php if($loggeduser->role == "Administrator"){?>
    <div class="wrapper">
      <?php echo $this->element('/admin/header');?>
      <?php echo $this->element('/admin/sidebar');?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo __('Administrator Management'); ?>
            <small><?php echo __('Administrator tables'); ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->request->webroot.'admin/users/dashboard';?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
            <li class="active"><?php echo __('Administrator tables'); ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			 
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo __('Administrator Tables'); ?></h3>
				  <?php
		         /*  if($loggeduser['User']['role'] !== "Admin" || $loggeduser['User']['role'] !== "User"){?>
				  <span style="float: right;">
				  <a href='<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'administrator_add')); ?>' class='btn bg-navy'><i class="fa fa-user"></i>&nbsp; <?php echo __('New Add'); ?></a>
				  </span>
				  <?php } */?>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th><?php echo __('Type'); ?></th>
			<th><?php echo __('Username'); ?></th>
                        <th><?php echo __('Photo'); ?></th>
                        <th><?php echo __('Email'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Status'); ?></th>
			<th><?php echo __('Action'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach ($users as $user): ?>
				    <tr>
             <td><?php echo ($user->role); ?></td>
					   <td><?php echo ($user->username); ?></td>
					  <td>
					  <?php if($user->profile_pic){?>
					  <img alt="User Image"  width="56" height="50" src="<?php echo $this->request->webroot;?>files/user/<?php echo $user->profile_pic;?>">
					  <?php } else { ?>
						<img alt="User Image" width="58" src="<?php echo $this->request->webroot;?>img/avatar5.png">
					 <?php } ?>
					  </td>
					  <td><?php echo ($user->email); ?></td>
					  <td><?php echo date("jS F, Y", strtotime($user->date)); ?></td>
					 <td><?php if ($user->status == '0') { ?>
						<?php echo $this->Form->postLink('Deactivate', array('action' => 'activate', $user->id), array('escape' => false, 'class' => 'btn btn-default'));
						?></span><?php } else { ?>
							<?php echo $this->Form->postLink('Activate', array('action' => 'block', $user->id), array('escape' => false, 'class' => 'btn btn-default'));
							?></span> <?php } ?>&nbsp;
					</td>
					  <td>
					 
					   <?php echo $this->Html->link(__('View'), array('action' => 'view', $user->id),array('class'=>'btn btn-success')); ?>
					   <?php echo $this->Html->link(__("Edit"), array('action' => 'edit', $user->id),array('class'=>'btn btn-primary')); ?>
					   <?php if($user->adminis_disabled == 1){ ?>
					   <a href="javascript::void(0)" class="btn btn-default">Delete</a>
					   <?php }else{ ?>
			           <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user->id), array('class'=>'btn btn-danger'), __('Are you sure you want to delete', $user->id)); ?>
					   <?php } ?>
					   <?php if($user->adminis_disabled == 1){ ?>
					   <a href="javascript::void(0)" class="btn btn-default">Deactivate</a>
					   <?php }else{ ?>
					   <?php
						if ($user->status == 0) {
							echo $this->Form->postLink(('Activate'), array('Controller' => 'Users', 'action' => 'activate', $user->id), array('escape' => false, 'class' => 'btn btn-danger', 'title' => 'Active'));
						} else {
							echo $this->Form->postLink(('Deactivate'), array('controller' => 'Users', 'action' => 'deactivate', $user->id), array('escape' => false, 'class' => 'btn btn-success', 'title' => 'Block'));
						}
						?>
						<?php } ?>
					  </td>
				    </tr>
						<?php endforeach; ?>
                    </tbody>
                  </table>
                   </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>

      <?php echo $this->element('/admin/footer');?>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php } else {
      echo "<h2>sorry you are not authorised.</h2>";
    }  ?>
    <style>
	.dataTable .btn.btn-default{cursor:auto;}
	</style>
