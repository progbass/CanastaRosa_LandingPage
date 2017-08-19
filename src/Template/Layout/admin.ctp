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
         'bootstrap.min',
         'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
         'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
         'AdminLTE.min',
         'skins.min',
         'blue',
         'bootstrap3-wysihtml5.min'
         
         ]) ?>
    <?=$this->Html->script([
        'knockout-3.4.0',
        'jquery-2.2.3.min',
        'jquery.form.min',
        'app.min',
        'bootstrap.min',
        'icheck.min']);?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <?= $this->Flash->render() ?>
    <div class="container clearfix">
     <?= $this->fetch('content') ?>
    </div>
  
</body>
</html>
