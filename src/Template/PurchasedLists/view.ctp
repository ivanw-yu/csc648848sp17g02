<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchased List'), ['action' => 'edit', $purchasedList->registered_user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchased List'), ['action' => 'delete', $purchasedList->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedList->registered_user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchased Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchased List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchasedLists view large-9 medium-8 columns content">
    <h3><?= h($purchasedList->registered_user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $purchasedList->has('registered_user') ? $this->Html->link($purchasedList->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $purchasedList->registered_user->username]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing') ?></th>
            <td><?= $purchasedList->has('listing') ? $this->Html->link($purchasedList->listing->title, ['controller' => 'Listings', 'action' => 'view', $purchasedList->listing->listing_num]) : '' ?></td>
        </tr>
    </table>
</div>
