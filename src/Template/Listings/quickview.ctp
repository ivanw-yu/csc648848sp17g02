<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//=// __('Actions') ?></li>
        <li><//?= //$this->Html->link(__('Edit Listing'), ['action' => 'edit', $listing->listing_num]) ?> </li>
        <li><//?= //$this->Form->postLink(__('Delete Listing'), ['action' => 'delete', $listing->listing_num], ['confirm' => __('Are you sure you want to delete # {0}?', $listing->listing_num)]) ?> </li>
        <li><//?= //$this->Html->link(__('List Listings'), ['action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Listing'), ['action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Purchased Lists'), ['controller' => 'PurchasedLists', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Purchased List'), ['controller' => 'PurchasedLists', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Selling Lists'), ['controller' => 'SellingLists', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Selling List'), ['controller' => 'SellingLists', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Sold Lists'), ['controller' => 'SoldLists', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Sold List'), ['controller' => 'SoldLists', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Watching Lists'), ['controller' => 'WatchingLists', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Watching List'), ['controller' => 'WatchingLists', 'action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Wish Lists'), ['controller' => 'WishLists', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Wish List'), ['controller' => 'WishLists', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="modal listings view" id="quickview">
    <h3><?= h($listing->title) ?></h3>

                               <!-- Previously, this is how the images were displayed-->
                               <!--//<//?php if($listing->image !== null): ?>
                               <//?php $blobimg = //base64_encode(stream_get_contents($listing->image)); ?>
                               <a class = "aclass" onclick = "displaythumbnail('<//?php echo $blobimg; ?>');" >
                               <//?= //'<img src = "data:image;base64, ' . $blobimg . '" style = "width: 200px; height: 200px" />' ?>
                               </a>-->

                               <!-- Since images are stored as blob data url's, this is how it's accessed now-->
                               <?php if($listing->image !== null): ?>
                               <?php $blobimg = stream_get_contents($listing->image); ?>
                               <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                               <?= '<img src = "' . $blobimg . '" style = "width: 10em; height: 10em" />' ?>
                               </a>
                     <?php endif; ?>

 
    
</div>



