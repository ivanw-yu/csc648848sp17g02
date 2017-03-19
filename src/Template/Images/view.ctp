<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->image_num]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->image_num], ['confirm' => __('Are you sure you want to delete # {0}?', $image->image_num)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="images view large-9 medium-8 columns content">
    <h3><?= h($image->image_num) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Listing') ?></th>
            <td><?= $image->has('listing') ? $this->Html->link($image->listing->title, ['controller' => 'Listings', 'action' => 'view', $image->listing->listing_num]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Num') ?></th>
            <td><?= $this->Number->format($image->image_num) ?></td>
        </tr>
    </table>
</div>
