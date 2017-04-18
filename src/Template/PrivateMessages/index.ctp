<?php
/**
  * @var \App\View\AppView $this
  */
?>

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//?= __('Actions') ?></li>
        <li><//?= $this->Html->link(__('New Private Message'), ['action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>-->
        <!-- Conversations can only be seen by clicking on one in the table.
             They can only be added by creating a new private message or by
             clicking on a conversation and replying. -->
        <!--<li><//?= //$this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?></li>
        <li><//?= //$this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?></li>
    </ul>
</nav>-->

<div class="privateMessages index large-9 medium-8 columns content">
    <h3><?= __('Buyer Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registered_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th>
                <!--<th scope="col"><//?= $this->Paginator->sort('conversation_id') ?></th>-->
                <!--<th scope="col"><//?= $this->Paginator->sort('is_read') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($privateMessages as $privateMessage): ?>
            <tr>
                <td><?= h($privateMessage->subject) ?></td>
                <td><?= h($privateMessage->registered_user_id) ?></td>
                <td><?= h($privateMessage->recipient_id) ?></td>
                <!--<td><//?= $privateMessage->has('registered_user') ? $this->Html->link($privateMessage->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $privateMessage->registered_user->username]) : '' ?></td>-->
                <!--<td><//?= $privateMessage->has('conversation') ? $this->Html->link($privateMessage->conversation->conversation_num, ['controller' => 'Conversations', 'action' => 'view', $privateMessage->conversation->conversation_num]) : '' ?></td>
                <td><//?= h($privateMessage->is_read) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View Message'),
                            [
                             'controller' => 'Conversations',
                             'action' => 'index', $privateMessage
                                                      ->conversation_id
                            ]) ?>
                    <!--<//?= $this->Html->link(__('Edit'), ['action' => 'edit', $privateMessage->registered_user_id]) ?>-->
                    <!--<//?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $privateMessage->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $privateMessage->registered_user_id)]) ?>-->
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
