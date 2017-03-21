<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Registered User'), ['action' => 'edit', $registeredUser->username]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Registered User'), ['action' => 'delete', $registeredUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $registeredUser->username)]) ?> </li>
        <li><?= $this->Html->link(__('List Registered Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registered User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Private Messages'), ['controller' => 'PrivateMessages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Private Message'), ['controller' => 'PrivateMessages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchased Lists'), ['controller' => 'PurchasedLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchased List'), ['controller' => 'PurchasedLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Selling Lists'), ['controller' => 'SellingLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Selling List'), ['controller' => 'SellingLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sold Lists'), ['controller' => 'SoldLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sold List'), ['controller' => 'SoldLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Watching Lists'), ['controller' => 'WatchingLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Watching List'), ['controller' => 'WatchingLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wish Lists'), ['controller' => 'WishLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wish List'), ['controller' => 'WishLists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registeredUsers view large-9 medium-8 columns content">
    <h3><?= h($registeredUser->username) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($registeredUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($registeredUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($registeredUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin') ?></th>
            <td><?= $registeredUser->is_admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $registeredUser->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Conversations') ?></h4>
        <?php if (!empty($registeredUser->conversations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Conversation Num') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->conversations as $conversations): ?>
            <tr>
                <td><?= h($conversations->conversation_num) ?></td>
                <td><?= h($conversations->date_created) ?></td>
                <td><?= h($conversations->message) ?></td>
                <td><?= h($conversations->registered_user_id) ?></td>
                <td><?= h($conversations->recipient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Conversations', 'action' => 'view', $conversations->conversation_num]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Conversations', 'action' => 'edit', $conversations->conversation_num]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Conversations', 'action' => 'delete', $conversations->conversation_num], ['confirm' => __('Are you sure you want to delete # {0}?', $conversations->conversation_num)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Listings') ?></h4>
        <?php if (!empty($registeredUser->listings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Listing Num') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Is Sold') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Item Desc') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Condition Id') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->listings as $listings): ?>
            <tr>
                <td><?= h($listings->listing_num) ?></td>
                <td><?= h($listings->date_created) ?></td>
                <td><?= h($listings->is_sold) ?></td>
                <td><?= h($listings->price) ?></td>
                <td><?= h($listings->location) ?></td>
                <td><?= h($listings->item_desc) ?></td>
                <td><?= h($listings->title) ?></td>
                <td><?= h($listings->category_id) ?></td>
                <td><?= h($listings->registered_user_id) ?></td>
                <td><?= h($listings->course_id) ?></td>
                <td><?= h($listings->condition_id) ?></td>
                <td><?= h($listings->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Listings', 'action' => 'view', $listings->listing_num]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Listings', 'action' => 'edit', $listings->listing_num]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Listings', 'action' => 'delete', $listings->listing_num], ['confirm' => __('Are you sure you want to delete # {0}?', $listings->listing_num)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Private Messages') ?></h4>
        <?php if (!empty($registeredUser->private_messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col"><?= __('Conversation Id') ?></th>
                <th scope="col"><?= __('Is Read') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->private_messages as $privateMessages): ?>
            <tr>
                <td><?= h($privateMessages->subject) ?></td>
                <td><?= h($privateMessages->registered_user_id) ?></td>
                <td><?= h($privateMessages->recipient_id) ?></td>
                <td><?= h($privateMessages->conversation_id) ?></td>
                <td><?= h($privateMessages->is_read) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PrivateMessages', 'action' => 'view', $privateMessages->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PrivateMessages', 'action' => 'edit', $privateMessages->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrivateMessages', 'action' => 'delete', $privateMessages->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $privateMessages->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Purchased Lists') ?></h4>
        <?php if (!empty($registeredUser->purchased_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->purchased_lists as $purchasedLists): ?>
            <tr>
                <td><?= h($purchasedLists->registered_user_id) ?></td>
                <td><?= h($purchasedLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchasedLists', 'action' => 'view', $purchasedLists->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchasedLists', 'action' => 'edit', $purchasedLists->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchasedLists', 'action' => 'delete', $purchasedLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedLists->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Selling Lists') ?></h4>
        <?php if (!empty($registeredUser->selling_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->selling_lists as $sellingLists): ?>
            <tr>
                <td><?= h($sellingLists->registered_user_id) ?></td>
                <td><?= h($sellingLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SellingLists', 'action' => 'view', $sellingLists->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SellingLists', 'action' => 'edit', $sellingLists->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SellingLists', 'action' => 'delete', $sellingLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sellingLists->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sold Lists') ?></h4>
        <?php if (!empty($registeredUser->sold_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->sold_lists as $soldLists): ?>
            <tr>
                <td><?= h($soldLists->registered_user_id) ?></td>
                <td><?= h($soldLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SoldLists', 'action' => 'view', $soldLists->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SoldLists', 'action' => 'edit', $soldLists->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SoldLists', 'action' => 'delete', $soldLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $soldLists->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Watching Lists') ?></h4>
        <?php if (!empty($registeredUser->watching_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->watching_lists as $watchingLists): ?>
            <tr>
                <td><?= h($watchingLists->registered_user_id) ?></td>
                <td><?= h($watchingLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WatchingLists', 'action' => 'view', $watchingLists->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WatchingLists', 'action' => 'edit', $watchingLists->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WatchingLists', 'action' => 'delete', $watchingLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $watchingLists->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Wish Lists') ?></h4>
        <?php if (!empty($registeredUser->wish_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($registeredUser->wish_lists as $wishLists): ?>
            <tr>
                <td><?= h($wishLists->registered_user_id) ?></td>
                <td><?= h($wishLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WishLists', 'action' => 'view', $wishLists->registered_user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WishLists', 'action' => 'edit', $wishLists->registered_user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WishLists', 'action' => 'delete', $wishLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $wishLists->registered_user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
