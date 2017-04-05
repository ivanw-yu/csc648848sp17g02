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
<div class="listings view large-9 medium-8 columns content">
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

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($listing->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($listing->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Desc') ?></th>
            <td><?= h($listing->item_desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($listing->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $listing->has('category') ? $this->Html->link($listing->category->category_name, ['controller' => 'Categories', 'action' => 'view', $listing->category->category_name]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registered User') ?></th>
            <td><?= $listing->registered_user->username ?><!--<//?= //$listing->has('registered_user') ? $this->Html->link($listing->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $listing->registered_user->username]) : '' ?>--></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $listing->has('course') ? $this->Html->link($listing->course->course_name, ['controller' => 'Courses', 'action' => 'view', $listing->course->course_name]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Num') ?></th>
            <td><?= $this->Number->format($listing->listing_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($listing->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Sold') ?></th>
            <td><?= $listing->is_sold ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition') ?></th>
            <td><?= h($listing->condition_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Purchased Lists') ?></h4>
        <?php if (!empty($listing->purchased_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->purchased_lists as $purchasedLists): ?>
            <tr>
                <td><?= h($purchasedLists->registered_user_id) ?></td>
                <td><?= h($purchasedLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchasedLists', 'action' => 'view', $purchasedLists->registered_user_id]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'PurchasedLists', 'action' => 'edit', $purchasedLists->registered_user_id]) ?>
                    <//?= //$this->Form->postLink(__('Delete'), ['controller' => 'PurchasedLists', 'action' => 'delete', $purchasedLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedLists->registered_user_id)]) ?> -->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Selling Lists') ?></h4>
        <?php if (!empty($listing->selling_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->selling_lists as $sellingLists): ?>
            <tr>
                <td><?= h($sellingLists->registered_user_id) ?></td>
                <td><?= h($sellingLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SellingLists', 'action' => 'view', $sellingLists->registered_user_id]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'SellingLists', 'action' => 'edit', $sellingLists->registered_user_id]) ?>
                    <//?= //$this->Form->postLink(__('Delete'), ['controller' => 'SellingLists', 'action' => 'delete', $sellingLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sellingLists->registered_user_id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sold Lists') ?></h4>
        <?php if (!empty($listing->sold_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->sold_lists as $soldLists): ?>
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
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($listing->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col"><?= __('Tag Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->tags as $tags): ?>
            <tr>
                <td><?= h($tags->listing_id) ?></td>
                <td><?= h($tags->tag_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->listing_id]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->listing_id]) ?>
                    <//?= //$this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->listing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->listing_id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Watching Lists') ?></h4>
        <?php if (!empty($listing->watching_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->watching_lists as $watchingLists): ?>
            <tr>
                <td><?= h($watchingLists->registered_user_id) ?></td>
                <td><?= h($watchingLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WatchingLists', 'action' => 'view', $watchingLists->registered_user_id]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'WatchingLists', 'action' => 'edit', $watchingLists->registered_user_id]) ?>
                    <//?=// $this->Form->postLink(__('Delete'), ['controller' => 'WatchingLists', 'action' => 'delete', $watchingLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $watchingLists->registered_user_id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Wish Lists') ?></h4>
        <?php if (!empty($listing->wish_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Registered User Id') ?></th>
                <th scope="col"><?= __('Listing Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->wish_lists as $wishLists): ?>
            <tr>
                <td><?= h($wishLists->registered_user_id) ?></td>
                <td><?= h($wishLists->listing_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WishLists', 'action' => 'view', $wishLists->registered_user_id]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'WishLists', 'action' => 'edit', $wishLists->registered_user_id]) ?>
                    <//?= //$this->Form->postLink(__('Delete'), ['controller' => 'WishLists', 'action' => 'delete', $wishLists->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $wishLists->registered_user_id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <a id = 'thumbnailImg' onclick = 'hide();'>
        
        </a>
        <script>
                                    var displayed = false;
                                    // the parameter is the data url of the blob image.
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
                                            thumbnailView.style.cursor = "zoom-out"; 
                                             thumbnailView.innerHTML = '<img src = "' + theimg + '" style = "position: relative; top: 15%; width: 60%; height: 70%" />';
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
</div>
