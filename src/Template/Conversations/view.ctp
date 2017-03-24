<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conversation'), ['action' => 'edit', $conversation->conversation_num]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conversation'), ['action' => 'delete', $conversation->conversation_num], ['confirm' => __('Are you sure you want to delete # {0}?', $conversation->conversation_num)]) ?> </li>
        <li><?= $this->Html->link(__('List Conversations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conversation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conversations view large-9 medium-8 columns content">
    <h3><?= h($conversation->conversation_num) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($conversation->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered User Id') ?></th>
            <td><?= h($conversation->registered_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $conversation->has('registered_user') ? $this->Html->link($conversation->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $conversation->registered_user->username]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conversation Num') ?></th>
            <td><?= $this->Number->format($conversation->conversation_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($conversation->date_created) ?></td>
        </tr>
    </table>
</div>
