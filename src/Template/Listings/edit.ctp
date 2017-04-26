<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'Edit item';
$this->assign('title', $title);
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $listing->listing_num],
                ['confirm' => __('Are you sure you want to delete # {0}?', $listing->listing_num)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Listings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchased Lists'), ['controller' => 'PurchasedLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchased List'), ['controller' => 'PurchasedLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Selling Lists'), ['controller' => 'SellingLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Selling List'), ['controller' => 'SellingLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sold Lists'), ['controller' => 'SoldLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sold List'), ['controller' => 'SoldLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Watching Lists'), ['controller' => 'WatchingLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Watching List'), ['controller' => 'WatchingLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wish Lists'), ['controller' => 'WishLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wish List'), ['controller' => 'WishLists', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="listings form large-9 medium-8 columns content" style="padding: 5%;">
    <?= $this->Form->create($listing) ?>
    <fieldset>
        <legend><?= __('Edit Listing') ?></legend>
        <?php
            $checked = '';
            if ($listing->is_sold == 1) {
                $checked = 'checked';
            }
            //echo $this->Form->input('date_created');
            //echo $this->Form->input('is_sold');
            echo "<input name='is_sold' {$checked} " .
                 "type='checkbox' id='is_sold_checkbox' /> ".
                 "<label for='is_sold_checkbox'>Sold</label>";
            echo $this->Form->input('price');
            echo $this->Form->input('location');
            echo $this->Form->input('item_desc');
            echo $this->Form->input('title');
            //echo $this->Form->input('category_id', ['options' => $categories]);
            //echo $this->Form->input('registered_user_id', ['options' => $registeredUsers]);
            //echo $this->Form->input('course_id', ['options' => $courses, 'empty' => true]);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
