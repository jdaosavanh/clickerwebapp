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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('styles.css') ?>
<!--    --><?php //echo $this->Html->css('bootstrap.min.css');?>
    <?php echo $this->Html->script('jquery-1.12.1.min.js');?>
<!--    --><?php //echo $this->javascript('bootstrap.min.js');?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="left home-list">
           <li class="name">
                <h1> <?php echo $this->Html->link('Home',array('controller' => 'pages', 'action' => 'display', 'home'))?></h1>

            </li>
            <li class="name">
            <h1> <?php echo $this->Html->link('Back',$this->request->referer()); ?></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="right">
                <?php if($loggedIn): ?>
                <li><?php echo $this->HTML->link('Logout', array('controller' => 'users','action' => 'logout')); ?></li>
                <?php endif; ?>
            </ul>
        </section>
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
