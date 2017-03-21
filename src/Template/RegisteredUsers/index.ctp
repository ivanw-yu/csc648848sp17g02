<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Registered User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Private Messages'), ['controller' => 'PrivateMessages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Private Message'), ['controller' => 'PrivateMessages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchased Lists'), ['controller' => 'PurchasedLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchased List'), ['controller' => 'PurchasedLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Selling Lists'), ['controller' => 'SellingLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Selling List'), ['controller' => 'SellingLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sold Lists'), ['controller' => 'SoldLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sold List'), ['controller' => 'SoldLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Watching Lists'), ['controller' => 'WatchingLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Watching List'), ['controller' => 'WatchingLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wish Lists'), ['controller' => 'WishLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wish List'), ['controller' => 'WishLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registeredUsers index large-9 medium-8 columns content">
    <h3><?= __('Registered Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_admin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registeredUsers as $registeredUser): ?>
            <tr>
                <td><?= h($registeredUser->username) ?></td>
                <td><?= h($registeredUser->password) ?></td>
                <td><?= h($registeredUser->is_admin) ?></td>
                <td><?= h($registeredUser->is_active) ?></td>
                <td><?= h($registeredUser->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $registeredUser->username]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registeredUser->username]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registeredUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $registeredUser->username)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
