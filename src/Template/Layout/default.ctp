<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
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
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>
    <?= $this->Html->script(['https://code.jquery.com/jquery-1.12.4.min.js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js']); ?>
    <?= $this->Html->script('custom.js'); ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css'); ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Titillium+Web'); ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');?>
    <?= $this->Html->css('main.css'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Ympäristökeskus</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><?= $this->Html->link("Etusivu", '/') ?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <?php
                        if ($username) {
                            echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); 
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?= $this->Flash->render() ?>
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
