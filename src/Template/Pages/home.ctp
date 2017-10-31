<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>
    <?= $this->Html->script(['https://code.jquery.com/jquery-1.12.4.min.js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js']); ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css'); ?>
    <?= $this->Html->css("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Titillium+Web:300,400,600,700,900"); ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');?>
    <?= $this->Html->css('site.css'); ?>
</head>
<body class="home">

    <div class="container-fluid jumbotron"></div>

    <div class="container text-center icons">
        <h2>TERVETULOA</h2>
        <div class="row">
            <div class="col-md-4 icon-wrapper">
                <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                <h4>Klikkaa oheista linkkiä</h4>
            </div> 
            <div class="col-md-4 icon-wrapper">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <h4>Kirjaudu sisään</h4>
                <?= $this->Html->link('Siirry täyttämään lomake', '/users/login', ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-4 icon-wrapper">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <h4>Täytä lomake</h4>            
            </div>         
        </div> 
    </div>
</body>
</html>
