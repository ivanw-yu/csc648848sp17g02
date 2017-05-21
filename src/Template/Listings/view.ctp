<?php
/**
  * @var \App\View\AppView $this
  */
$title = $listing->title;
$this->assign('title', $title);
?>
<style>
    .carousel .indicators .indicator-item {
        background-color: grey;
        height: 10px;
        width: 10px;
    }
    .carousel .indicators .indicator-item.active {
        background-color: #5e35b1;
    }
</style>

<script>
  function setModalLabelAndFormInput(name, title, item){
    // for displaying name and title on modal
    document.getElementById('seller_name').innerHTML = name;
    document.getElementById('seller_item').innerHTML = title;
    // for form inputs
    document.getElementById('receiver').value = name;
    document.getElementById('items_listing_id').value = item;
    //document.getElementById('sender').value = "<?= $currentUser ?>";
  }
</script>

<div class="content">
    <nav style="background-color: inherit; height: 50px; line-height: 50px;">
        <div class="bread-wrapper">
            <div class="col s12 bread-content">
                <a class="breadcrumb" style="cursor: pointer;" onclick="window.history.go(-1); return false;"><strong><</strong> Back to previous page</a>                
            </div>
        </div>
    </nav>

    <div class="page-content">
        <div class="row" style="display: flex; justify-content: space-around; padding-top: 25px; padding-bottom: 25px;">
            
            <div class="col m12 s12">
                    <div class="col m1"></div>
                    
                    <div class="item-details col m5 s12" style="height: auto; background-color: #fcfcfc; box-shadow: 5px 5px 10px #cecece;">
                        <div class="row carousel" style="height: 345px; margin-bottom: -30px;">
                            <h5><center><?= h($listing->title) ?></center></h5>
                            <!-- Since images are stored as blob data url's, this is how it's accessed now-->
                            <?php if($listing->image !== null): ?>
                                <?php $blobimg = stream_get_contents($listing->image); ?>
                                <a class = "carousel-item" style="overflow: hidden;" onclick = "displaythumbnail('<?php echo $blobimg; ?>');">
                                  <?= '<img src = "' . $blobimg . '"style = "width: 270px; height: 270px;" />' ?>
                                </a>
                                <?php foreach($images as $image): ?>
                                    <?php $blobimg = stream_get_contents($image->image); ?>
                                    <a class = "carousel-item" style="overflow: hidden;" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                                        <?= '<img src = " ' . $blobimg . '" />' ?>
                                    </a>
                                <?php endforeach; ?>

                                <!-- for testing, delete later -->
                                <!--<a class = "carousel-item" style="overflow: hidden;" onclick = "displaythumbnail('https://upload.wikimedia.org/wikipedia/commons/d/d2/Jeans_for_men.jpg');">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d2/Jeans_for_men.jpg">
                                </a>
                                <a class = "carousel-item" style="overflow: hidden;" onclick = "displaythumbnail('https://upload.wikimedia.org/wikipedia/commons/1/1f/FD_1.jpg');">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/1f/FD_1.jpg">
                                </a>-->
                                <!-- for testing, delete later -->
                                
                                
                            <?php endif; ?>
                        </div>
                        <table class="vertical-table" style="display: flex; justify-content: center;">
                            <tr>
                                <th scope="row"><?= __('Condition') ?></th>
                                <td><?= h($listing->condition_id) ?></td>
                                <th scope="row"><?= __('$') ?></th>
                                <td><?= h($listing->price) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Description') ?></th>
                                <td><?= h($listing->item_desc) ?></td>
                            </tr>
                             <tr>
                                <th scope="row"><?= __('Category') ?></th>
                                <td><?= h($listing->category->category_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Date Added') ?></th>
                                <td><?= h($listing->date_created->format('m/d/Y')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Seller') ?></th>
                                <td><?= $listing->registered_user->username ?><!--<//?= //$listing->has('registered_user') ? $this->Html->link($listing->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $listing->registered_user->username]) : '' ?>--></td>
                            </tr>
                         <!--    <tr>
                                <th scope="row"><//?= __('Location') ?></th>
                                <td><//?= h($listing->location) ?></td>
                            </tr> -->
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
                            
                        </table>

                        <div class="row contact-seller" style="padding-bottom: 10px;">
                                <!-- Show contact seller button.  Popup a message box if the user
                                 is signed in.  Otherwise, popup a registration form. -->
                                <?php if($currentUser !== null): ?>
                                  <button type="button" data-target="contact_box" class="btn grey right" onclick = "setModalLabelAndFormInput('<?= $listing->registered_user_id ?>', '<?= $listing->title ?>', '<?= $listing->listing_num ?>');">Contact Seller</button>

                                <?php else: ?>
                                  <button type="button" data-target="modal1" class="btn grey right">Contact Seller</button>
                                <?php endif; ?>
                                </br>
                        </div>
                    </div>
                    <div class="col m1"></div>

                    <div class="map col m4 s12" style="height: auto; background-color: #fcfcfc; box-shadow: 5px 5px 10px #cecece;">
                        <span class="row"><h6>PICKUP LOCATION</h6></span>
                        <a class="row" style="padding: 10px; display: flex; justify-content: center; align-items: center;">
                            <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyAaex_V9gcWMaRqb-e6yJcfbaj9z2COtVU', ['plugin' => false]); ?>
                            <?= $this->GoogleMap->map(); ?>
                            <?= $this->GoogleMap->addMarker("map_canvas", 1, h($listing->location)); ?>

                        </a>
                        <span class="row right">
                            <?= h($listing->location) ?>
                        </span>
                    </div>
                    <div class="col m1"></div>

                    


            </div>

        </div>








          
       

            <!-- Button for adding the listing to watching list. -->
          <!--   <//?php if($currentUser !== null): ?>
                <//?= $this->Form->create(null, ['url' => ['controller' => 'WatchingLists',
                                                         'action' => 'add']]); ?>
                <div class = "clearfix">
                    <button type = "submit" class ="btn btn-primary btn-md signupbtn"> Add to watching list </button>
                </div>
                <input type ="hidden" name="listing_id" value="<?= $listing->listing_num ?>">
                <input type ="hidden" name="registered_user_id" value="<?= $currentUser ?>">
                
                <//?= $this->Form->end();?>
            <//?php else: ?>
                <button type="button" data-target="modal1" class="btn">Add to watching list</button>

            <//?php endif; ?> -->

           

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
                        $(document).ready(function(){
                          $('.carousel').carousel({indicators:true});
                        });
                </script>

    </div>
    
</div>



