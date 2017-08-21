<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
     <?= $this->Html->css([
         '/admin/bootstrap/css/bootstrap.min',
                '/admin/dist/css/AdminLTE.min',
                '/admin/plugins/iCheck/flat/blue',
                '/admin/dist/css/skins/_all-skins.min',
         '/admin/plugins/datatables/dataTables.bootstrap'
         ]) ?>
    <?=$this->Html->script([
        '/admin/plugins/jQuery/jQuery-2.1.4.min',
	'/admin/bootstrap/js/bootstrap.min.js',
        '/admin/plugins/slimScroll/jquery.slimscroll.min',
        '/admin/plugins/fastclick/fastclick.min',
        '/admin/dist/js/app.min',
        '/admin/dist/js/demo',
        '/admin/plugins/datatables/jquery.dataTables.min',
        '/admin/plugins/datatables/dataTables.bootstrap.min'
        ]); ?>   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="content"> 
  <?= $this->Flash->render() ?>
    <!--<div class="container clearfix">-->
     <?= $this->fetch('content') ?>
    </div>     
</body>
</html>
