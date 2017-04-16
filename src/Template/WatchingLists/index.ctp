<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//?= __('Actions') ?></li>
        <li><//?= $this->Html->link(__('New Watching List'), ['action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="watchingLists index large-9 medium-8 columns content">
    <h3><?= __('Watching Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('registered_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($watchingLists as $watchingList): ?>
            <tr>
                <td><?= $watchingList->has('registered_user') ? $this->Html->link($watchingList->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $watchingList->registered_user->username]) : '' ?></td>
                <td><?= $watchingList->has('listing') ? $this->Html->link($watchingList->listing->title, ['controller' => 'Listings', 'action' => 'view', $watchingList->listing->listing_num]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $watchingList->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $watchingList->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $watchingList->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $watchingList->registered_user_id)]) ?>
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
