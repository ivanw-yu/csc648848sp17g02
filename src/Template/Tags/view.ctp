<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->listing_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->listing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->listing_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->listing_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Listing') ?></th>
            <td><?= $tag->has('listing') ? $this->Html->link($tag->listing->title, ['controller' => 'Listings', 'action' => 'view', $tag->listing->listing_num]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Name') ?></th>
            <td><?= h($tag->tag_name) ?></td>
        </tr>
    </table>
</div>
