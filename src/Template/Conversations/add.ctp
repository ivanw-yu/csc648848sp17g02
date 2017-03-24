<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Conversations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conversations form large-9 medium-8 columns content">
    <?= $this->Form->create($conversation) ?>
    <fieldset>
        <legend><?= __('Add Conversation') ?></legend>
        <?php
            echo $this->Form->input('message');
            echo $this->Form->input('recipient_id', ['options' => $registeredUsers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
