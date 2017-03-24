<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->create($image) ?>
    <fieldset>
        <legend><?= __('Add Image') ?></legend>
        <?php
            //echo $this->Form->input('listing_id', ['options' => $listings, 'empty' => true]);
            echo $this->Form->input('image 1');
            echo $this->Form->input('image 2');
            echo $this->Form->input('image 3');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
