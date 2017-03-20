<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Private Message'), ['action' => 'edit', $privateMessage->registered_user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Private Message'), ['action' => 'delete', $privateMessage->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $privateMessage->registered_user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Private Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Private Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="privateMessages view large-9 medium-8 columns content">
    <h3><?= h($privateMessage->registered_user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($privateMessage->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered User Id') ?></th>
            <td><?= h($privateMessage->registered_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $privateMessage->has('registered_user') ? $this->Html->link($privateMessage->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $privateMessage->registered_user->username]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conversation') ?></th>
            <td><?= $privateMessage->has('conversation') ? $this->Html->link($privateMessage->conversation->conversation_num, ['controller' => 'Conversations', 'action' => 'view', $privateMessage->conversation->conversation_num]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Read') ?></th>
            <td><?= $privateMessage->is_read ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
