<?php
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default body">
                <div class="panel-heading text-center">
                    <h2>TERVETULOA</h2>
                </div>
                <div class="panel-body">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>
                    <?= $this->Form->label('username', 'Käyttäjänimi'); ?>
                    <?= $this->Form->control('username', array( 'label' => false )) ?>
                    <?= $this->Form->label('password', 'Avain'); ?>
                    <?= $this->Form->control('password', array( 'label' => false )) ?>
                    <?= $this->Form->button('Kirjaudu sisään', array('class' => 'btn btn-default btn-block')) ?>
                    <?= $this->Form->end() ?>                            
                </div>		
            </div>             
        </div>  
        <div class="col-md-4"></div>
    </div>
</div>




