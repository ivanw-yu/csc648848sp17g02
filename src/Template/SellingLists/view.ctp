<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Selling List'), ['action' => 'edit', $sellingList->registered_user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Selling List'), ['action' => 'delete', $sellingList->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sellingList->registered_user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Selling Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Selling List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sellingLists view large-9 medium-8 columns content">
    <h3><?= h($sellingList->registered_user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $sellingList->has('registered_user') ? $this->Html->link($sellingList->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $sellingList->registered_user->username]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing') ?></th>
            <td><?= $sellingList->has('listing') ? $this->Html->link($sellingList->listing->title, ['controller' => 'Listings', 'action' => 'view', $sellingList->listing->listing_num]) : '' ?></td>
        </tr>
    </table>
</div>
