  <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo $this->request->webroot;?>">Canastaroca</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
		<div>
			<?php $x = $this->Flash->render(); ?>
			<?php if ($x) { ?>
				<div class="alert success">
					<span class="icon"></span>
					<strong></strong><?php echo $x; ?>
				</div>
			<?php } ?>
		</div>
        <p class="login-box-msg">Sign in to start your session</p>
        <?= $this->Form->create() ?>
          <div class="form-group has-feedback">
            <input type="email" name='email' class="form-control" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name='password' class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        <?php echo $this->Form->end();?>

        <!-- <a href="<?php //echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_forgetpwd')); ?>">I forgot my password</a><br> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	</body>
	<?php 
	echo $this->Html->css(array(
                '/admin/plugins/iCheck/flat/blue'
				));
	?>
	<style>
	.sidebar-mini {
    background: #d2d6de none repeat scroll 0 0;
}
.message.error {
    color: red;
    font-size: 15px;
}
.message.success{color: red;font-size: 15px;}
	</style>