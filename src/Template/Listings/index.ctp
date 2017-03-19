<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Listing'), ['action' => 'add']) ?></li>
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
</nav>
<div class="listings index large-9 medium-8 columns content">
    <h3><?= __('Listings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('listing_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_sold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_desc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registered_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <!-- this was added to allow image to be displayed -->
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listings as $listing): ?>
            <tr>
                <td><?= $this->Number->format($listing->listing_num) ?></td>
                <td><?= h($listing->date_created) ?></td>
                <td><?= h($listing->is_sold) ?></td>
                <td><?= h($listing->price) ?></td>
                <td><?= h($listing->location) ?></td>
                <td><?= h($listing->item_desc) ?></td>
                <td><?= h($listing->title) ?></td>
                <td><?= $listing->has('category') ? $this->Html->link($listing->category->category_name, ['controller' => 'Categories', 'action' => 'view', $listing->category->category_name]) : '' ?></td>
                <td><?= $listing->has('registered_user') ? $this->Html->link($listing->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $listing->registered_user->username]) : '' ?></td>
                <td><?= $listing->has('course') ? $this->Html->link($listing->course->course_name, ['controller' => 'Courses', 'action' => 'view', $listing->course->course_name]) : '' ?></td>
                <td><!-- This is how blobs are displayed on the webpage. $listings->image will return a "resource id", stream_get_contents() gets the contents (binary) associated with the id, and base64_encode() encodes those contents so an image will be rendered-->
                    <?php if($listing->image !== null): ?>
                               <?php $blobimg = base64_encode(stream_get_contents($listing->image)); ?>
                               <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                               <?= '<img src = "data:image;base64, ' . $blobimg . '" style = "width: 40px; height: 40px" />' ?>
                               </a>
                               
                     <?php endif; ?>         
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $listing->listing_num]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $listing->listing_num]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listing->listing_num], ['confirm' => __('Are you sure you want to delete # {0}?', $listing->listing_num)]) ?>
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
    <a id = 'thumbnailImg' onclick = 'hide();'>
        
        </a>
        <script>
                                    var displayed = false;
                                    // the parameter is the base64_encoded binary representation of the blob image.
                                    function displaythumbnail(theimg) {
                                        var thumbnailView = document.getElementById('thumbnailImg');
                                            thumbnailView.style.display = ""; 
                                            thumbnailView.style.backgroundColor = "rgba(0, 0, 0, 0.5)"; //makes transparent background.
                                            thumbnailView.style.position = "fixed";
                                            thumbnailView.style.top = "0%";
                                            thumbnailView.style.left = "0%";
                                            thumbnailView.zIndex = "100";
                                            thumbnailView.style.width = "100%";
                                            thumbnailView.style.height = "100%";
                                            thumbnailView.style.textAlign = "center";
                                            thumbnailView.innerHTML = '<img src = "data:image;base64, ' + theimg + '" style = "position: relative; top: 15%; width: 60%; height: 70%" />';
                                            displayed = true;
                                    }

                                    function hide(){
                                        // removes the image after it's clicked again in the enlarged view.
                                        if(displayed){
                                            document.getElementById('thumbnailImg').style.display = "none";
                                            displayed = false;
                                        }
                                    }
        </script>
</div>
