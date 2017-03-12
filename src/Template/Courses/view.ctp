<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->course_name]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->course_name], ['confirm' => __('Are you sure you want to delete # {0}?', $course->course_name)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->course_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Course Name') ?></th>
            <td><?= h($course->course_name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Listings') ?></h4>
        <?php if (!empty($course->listings)): ?>
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
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->listings as $listings): ?>
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
</div>
