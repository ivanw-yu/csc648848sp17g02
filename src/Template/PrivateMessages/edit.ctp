<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $privateMessage->registered_user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $privateMessage->registered_user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Private Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="privateMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($privateMessage) ?>
    <fieldset>
        <legend><?= __('Edit Private Message') ?></legend>
        <?php
            echo $this->Form->input('subject');
            echo $this->Form->input('recipient_id', ['options' => $registeredUsers]);
            echo $this->Form->input('is_read');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
