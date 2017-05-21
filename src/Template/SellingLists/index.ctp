<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - My Items';
$this->assign('title', $title);
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//?= __('Actions') ?></li>
        <li><//?= $this->Html->link(__('New Selling List'), ['action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Listings'), ['controller' => 'Listings', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Listing'), ['controller' => 'Listings', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="sellingLists index l9 m8 s12 columns content">
    <!-- <h3><//?= 'Welcome ' . $currentUser . ', here are items you\'re selling: ' ?></h3> -->
    <!-- <h4> <//?= __('Selling Lists') ?></h4> -->
   <!-- <div class="row">
    <div class="col-sm-6" style = "width: 50%">-->

    <div class="row" style="display: flex; justify-content: center; padding: 16px;">
        <fieldset class="col s12 m8" style = "background-color:white; box-shadow: 5px 5px 10px #cecece; display: flex; justify-content: center;">
            <legend style = "font-size: 2em"><?= __('My Items') ?></legend>
            

            <div cellpadding="0" cellspacing="0" style = "margin: auto">
                <?php foreach ($sellingLists as $sellingList): ?>
                <div class="row">
                    <div class="col s4" style="padding-top: 20px; padding-bottom: 15px;">
                        <div class="row">
                            <?= $sellingList->has('listing') ? $this->Html->link($sellingList->listing->title, ['controller' => 'Listings', 'action' => 'view', $sellingList->listing->listing_num]) : '' ?>
                        </div>
                        <div class="row">
                            <?php $blobimg = stream_get_contents($sellingList->listing->image); ?>
                            <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                            <?= $sellingList->has('listing') && $sellingList->listing->has('image') ? '<img src = "' . $blobimg . '" style = "width: 15vw; height: 15vw;" />' : '' ?>
                            </a>
                        </div>                            
                    </div>

                    <div class="col s8">

                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>

                            <tbody class="row">
                                <td><?= $sellingList->has('listing') ? '$' . $sellingList->listing->price : '' ?></td>
                                <td><?= $sellingList->has('listing') ? $sellingList->listing->item_desc : '' ?></td>
                                <td class="actions">
                                <!-- There is already a link to view a listing.
                                <//?= $this->Html->link(__('View'), ['action' => 'view', $sellingList->registered_user_id]) ?>
            -->                 <!-- Added 4/27 to allow user to view the messages sent from buyers for corresponding item-->
                                <?= $this->Html->link('View Messages', ['controller' => 'PrivateMessages', 'action' => 'index', $sellingList->listing_id]) ?>
                                <!-- <h6> SellingList Id: <//?= $sellingList->listing_id ?> </h6> -->
                                <br><br>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Listings', 'action' => 'edit', $sellingList->listing->listing_num]) ?>
                                <br><br>
                                 <!-- No deleting allowed at the moment. Update 4/8: Let users remove their own items. -->
                                <?= $this->Form->postLink(__('Remove'), ['action' => 'delete', $sellingList->listing_id], ['confirm' => __('Are you sure you want to delete this listing?', $sellingList->title)]) ?>
                            </td>
                            </tbody>
                        </table>
                        
                    </div>


                    
                </div>
                <div class="divider"></div>
                <?php endforeach; ?>
            </div>
        </fieldset>
    </div>
    <!--</div>
    </div>-->
    <div class="paginator row" style = "display: flex; justify-content: center;">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

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
