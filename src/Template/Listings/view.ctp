<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="content">
  <nav style="background-color: inherit; height: 50px; line-height: 50px;">
    <div class="bread-wrapper">
      <div class="col s12 bread-content">
        <a class="breadcrumb" href="#!" onclick="window.location.href = '../../'">Home</a>
        <a class="breadcrumb" href="#!" onclick="window.location.href = '../'">Listings</a>
        <a class="breadcrumb" >Details</a>
      </div>
    </div>
  </nav>

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

            <!-- Show contact seller button.  Popup a message box if the user
                 is signed in.  Otherwise, popup a registration form. -->
            <br>
            <?php if($currentUser !== null): ?>
              <button type="button" data-target="contact_box" class="btn">Contact Seller</button>

            <?php else: ?>
              <button type="button" data-target="modal1" class="btn">Contact Seller</button>
            <?php endif; ?>
      <div id = "contact_box" class= "modal">
            <span onclick = "document.getElementById('contact_box').style.display = 'none'" class = "modal-close" title = "Close">x</span>
            <!--<form  method="post" class ="modal-content animate"
            action = "../RegisteredUsers/add">-->
            <?= $this->Form->create(null, ['url' => ['controller' => 'PrivateMessages', 'action' => 'add'], 'class'=>'modal-content animate']); ?>
              <div class = "container1">
              <label>Contact <?= $listing->registered_user->username ?></label><br>
              <label><b>Subject</b></label><br>
              <input type = "text" name = "subject" placeholder = "subject" required><br>
              <label><b>Message</b></label><br>
              <input type = "text" name = "message" placeholder = "message" required><br>
              <input type ="hidden" name="recipient_id" value="<?= $listing->registered_user->username ?>">
              <div class = "clearfix">
                <button type = "button" class=" cancelbtn btn btn-primary btn-md" onclick = "document.getElementById('contact_box').style.display = 'none'">Cancel</button>
                <button type = "submit" class ="btn btn-primary btn-md signupbtn"> Send </button>
                </div>
                </div>
              <?= $this->Form->end();?>
        </div>

<!-- Button for adding the listing to watching list. -->
<?php if($currentUser !== null): ?>
    <?= $this->Form->create(null, ['url' => ['controller' => 'WatchingLists',
                                             'action' => 'add']]); ?>
    <div class = "clearfix">
        <button type = "submit" class ="btn btn-primary btn-md signupbtn"> Add to watching list </button>
    </div>
    <input type ="hidden" name="listing_id" value="<?= $listing->listing_num ?>">
    <input type ="hidden" name="registered_user_id" value="<?= $currentUser ?>">
    
    <?= $this->Form->end();?>
<?php else: ?>
    <button type="button" data-target="modal1" class="btn">Add to watching list</button>
    <!-- <button type="button" class="btn btn-primary btn-md" onclick = "document.getElementById('id01').style.display = 'block'" style = "width:auto;">Add to watching list</button> -->
<?php endif; ?>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item Desc') ?></th>
            <td><?= h($listing->item_desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition') ?></th>
            <td><?= h($listing->condition_id) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $listing->has('category') ? $this->Html->link($listing->category->category_name, ['controller' => 'Categories', 'action' => 'view', $listing->category->category_name]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($listing->date_created->format('m/d/Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= $listing->registered_user->username ?><!--<//?= //$listing->has('registered_user') ? $this->Html->link($listing->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $listing->registered_user->username]) : '' ?>--></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($listing->location) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><//?= __('Title') ?></th>
            <td><//?= h($listing->title) ?></td>
        </tr> -->
        <!-- <tr>
            <th scope="row"><//?= __('Course') ?></th>
            <td><//?= $listing->has('course') ? $this->Html->link($listing->course->course_name, ['controller' => 'Courses', 'action' => 'view', $listing->course->course_name]) : '' ?></td>
        </tr> -->
       <!--  <tr>
            <th scope="row"><//?= __('Listing Num') ?></th>
            <td><//?= $this->Number->format($listing->listing_num) ?></td>
        </tr> -->
        <!-- <tr>
            <th scope="row"><//?= __('Is Sold') ?></th>
            <td><//?= $listing->is_sold ? __('Yes') : __('No'); ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($listing->price) ?></td>
        </tr>
    </table>
    <!-- Commented Section 1 starts-->
    <!-- Commented Section 1 ends-->
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
    <div class="related">
        <h5><?= ('Location on Map') ?></h5>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyAaex_V9gcWMaRqb-e6yJcfbaj9z2COtVU', ['plugin' => false]); ?>
        <?= $this->GoogleMap->map(); ?>
        <?= $this->GoogleMap->addMarker("map_canvas", 1, h($listing->location)); ?>
    </div>
    
</div>



