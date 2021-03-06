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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'Clicker App';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('bootstrap.min.css');?>
    <?= $this->Html->script('jquery-1.12.1.min.js');?>
    <?= $this->Html->script('bootstrap.min.js');?>
</head>
<body class="home">
    <header>
        <div class="header-image">
            <h1>The Simple Clicker App</h1>
<!--            <div class="login" id="login-modal">-->
<!--                <a id="login" rel="leanModal" name="test" href="#show_login_modal">Login/Sign Up</a>-->
<!---->
<!--            </div>-->
            <div>
<!--                --><?php //debug($this->request->session()->read('Auth.User')); ?>
                <?php if(!$loggedIn): ?>
<!--                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login/Sign Up</button>-->
                <button class="btn btn-info btn-lg"><?php echo $this->HTML->link('Login', array('controller' => 'users','action' => 'login')); ?></button>
                <button class="btn btn-info btn-lg"><?php echo $this->HTML->link('Register', array('controller' => 'users','action' => 'register')); ?></button>
                <?php else: ?>
                    <button class="btn btn-info btn-lg"><?php echo $this->HTML->link('Account ', array('controller' => 'users','action' => $this->request->session()->read('Auth.User.id'))); ?></button>
                    <button class="btn btn-info btn-lg"><?php echo $this->HTML->link('Logout', array('controller' => 'users','action' => 'logout')); ?></button>
                <?php endif; ?>
        </div>
    </header>
    <div id="content">

        <div class="row center-block">
            <div class="row">
                <div class="columns large-12 checks lightgreenblock">
                    <p>Here are the steps to start using the application</p>
                </div>
            </div>

        </div>


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->


                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                        <div class="login-home">
                            <h1>Login</h1>
                            <?= $this->Form->create(); ?>
                            <?= $this->Form->input('email'); ?>
                            <?= $this->Form->input('password'); ?>
                            <?= $this->Form->button('Login'); ?>
                            <?= $this->Form->end(); ?>
                        </div>
                        <div class="create-account-home">
                            <?= $this->Form->create() ?>
                            <fieldset>
                                <legend><?= __('Create User') ?></legend>
                                <?php
                                echo $this->Form->input('email');
                                echo $this->Form->input('password');
                                ?>
                            </fieldset>
                            <?= $this->Form->button(__('Submit')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <footer>
    </footer>
</body>
</html>
