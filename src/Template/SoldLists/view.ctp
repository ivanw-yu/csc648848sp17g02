<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sold List'), ['action' => 'edit', $soldList->registered_user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sold List'), ['action' => 'delete', $soldList->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $soldList->registered_user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sold Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sold List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="soldLists view large-9 medium-8 columns content">
    <h3><?= h($soldList->registered_user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $soldList->has('registered_user') ? $this->Html->link($soldList->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $soldList->registered_user->username]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing') ?></th>
            <td><?= $soldList->has('listing') ? $this->Html->link($soldList->listing->title, ['controller' => 'Listings', 'action' => 'view', $soldList->listing->listing_num]) : '' ?></td>
        </tr>
    </table>
</div>
