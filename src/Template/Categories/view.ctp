<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//?=// __('Actions') ?></li>
        <li><//?= //$this->Html->link(__('Edit Category'), ['action' => 'edit', $category->category_name]) ?> </li>
        <li><//?= //$this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->category_name], ['confirm' => __('Are you sure you want to delete # {0}?', $category->category_name)]) ?> </li>
        <li><//?= //$this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><//?= //$this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?> </li>
        <li><//?= //$this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->

<div class="categories view large-9 medium-8 columns content" style = "width: 100%">
    <h3><?= h($category->category_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category Name') ?></th>
            <td><?= h($category->category_name) ?></td>
        </tr>
    </table>
    <div class="related" style = "width: 100%">
        <h4><?= __('Related Listings') ?></h4>
        <?php if (!empty($category->listings)): ?>
        <table cellpadding="0" cellspacing="0" style = "width: 100%">
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
            <?php $blob = array(); ?>
            <?php foreach ($category->listings as $listings): ?>
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
                <td><!-- This is how blobs are displayed on the webpage. $listings->image will return a "resource id", stream_get_contents() gets the contents (binary) associated with the id, and base64_encode() encodes those contents so an image will be rendered-->
                    <?php if($listings->image !== null): ?>
                               <?php $blobimg = base64_encode(stream_get_contents($listings->image)); ?>
                               <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                               <?= '<img src = "data:image;base64, ' . $blobimg . '" style = "width: 40px; height: 40px" />' ?>
                               </a>
                     <?php endif; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Listings', 'action' => 'view', $listings->listing_num]) ?>
                    <!--<//?= //$this->Html->link(__('Edit'), ['controller' => 'Listings', 'action' => 'edit', $listings->listing_num]) ?>
                    <//?= //$this->Form->postLink(__('Delete'), ['controller' => 'Listings', 'action' => 'delete', $listings->listing_num], ['confirm' => __('Are you sure you want to delete # {0}?', $listings->listing_num)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
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
                                            thumbnailView.style.cursor = "zoom-out"; 
                                            thumbnailView.style.textAlign = "center";
                                            thumbnailView.style.cursor = "zoom-out";
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
</div>

