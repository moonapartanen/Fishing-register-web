<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="body">
    <div class="container">
        <h2>Hei <?= $username; ?>, ole hyvä ja täytä kysely</h2>
        <?php foreach ($surveys as $survey): ?>
            <?= $survey->array[0]?>
       
         <?php endforeach; ?>
        <?= $this->Form->create($form) ?>
        <?= $this->Form->button('Lähetä', array('class' => 'btn btn-default')) ?>
        <?= $this->Form->end() ?>       
    </div>
</div>
