<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!-- New conversations can only be starting by creating a new
             private message.
         -->
        <!--<li><?= $this->Html->link(__('New Conversation'), ['action' => 'add']) ?></li>-->
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conversations index large-9 medium-8 columns content">
    <h3><?= __('Conversations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('conversation_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registered_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conversations as $conversation): ?>
            <tr>
                <td><?= $this->Number->format($conversation->conversation_num) ?></td>
                <td><?= h($conversation->date_created) ?></td>
                <td><?= h($conversation->message) ?></td>
                <td><?= h($conversation->registered_user_id) ?></td>
                <td><?= $conversation->has('registered_user') ? $this->Html->link($conversation->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $conversation->registered_user->username]) : '' ?></td>
                <td class="actions">
        <!-- Viewing, editing, and deleting a single message doesn't make
             sense right now.  Maybe in the future, but it's not first
             priority.
         -->
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $conversation->conversation_num]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conversation->conversation_num]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conversation->conversation_num], ['confirm' => __('Are you sure you want to delete # {0}?', $conversation->conversation_num)]) ?>-->
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
    <?= $this->Form->create(NULL, ['url' => ['controller' => 'Conversations',
                                             'action' => 'add', $sender,
                                                                $recipient,
                                                                $conversation_id
                                  ]]) ?>
    <fieldset>
        <legend><?= __('Reply') ?></legend>
        <?php
            echo $this->Form->input('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
