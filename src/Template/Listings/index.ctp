<?php
/**
  * @var \App\View\AppView $this
  */
?>

<script type="text/javascript">
function f() {
    var selectBox = document.getElementById("select_sort");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById('sort_' + selectedValue).firstChild.click();
}
</script>


<div class="content">
  <nav style="background-color: inherit; height: 50px; line-height: 50px;">
    <div class="bread-wrapper">
      <div class="col s12 bread-content">
        <a class="breadcrumb" href="#!" onclick="window.location.href = './'">Home</a>
            <a class="breadcrumb">Listings</a>
      </div>
    </div>
  </nav>

  <!--<form class="filter" action="">-->

    <div class="page-content">

      <div class="row">
        <div class="search-details" style="width: 100%; padding-right: 4rem; padding-left: 4rem; padding-top: 1rem; padding-bottom: 1rem;">
          <div class="left col m7 s12"> 
            Showing <?= count($listings) ?> results 
            <?= strlen($this->request->query['tags']) ? 'of "' . $this->request->query['tags'] . '"' : 'from ' . (strlen($this->request->query['category_filter']) ? $this->request->query['category_filter'] : ' all categories')   ?>
          </div>
          <div class="right col m4 s12 sorting"> 
            <div class="sorting right"> 
              <div class="input-field col s3">
                <label style="font-size: 1.1rem;">sort: </label>
              </div>
              <div style = "display: none;" >
              <div class='hidden' id="sort_date_asc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Oldest']) ?></div>
              <div class='hidden' id="sort_date_desc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Newest']) ?></div>
              <div class='hidden' id="sort_price_asc"><?= $this->Paginator->sort('price', $options=['direction' => '$-$$$']) ?></div>
              <div class='hidden' id="sort_price_desc"><?= $this->Paginator->sort('price', $options=['direction' => '$$$-$']) ?></div>
              </div>
              <div class="input-field col s9">

                <?php $select_sort_options = array('date_createddesc' => 'Newest', 'date_createdasc' =>'Oldest', 'priceasc' =>'$-$$$', 'pricedesc' =>'$$$-$'); 
                  $queried_sort = $this->request->query['sort'] . $this->request->query['direction'];
                  $sort_selected = strlen($queried_sort) ? $select_sort_options[$queried_sort] : 'Newest'; ?>
                <select id="select_sort" onchange="f();">
                  <option value="title" disabled="true" selected> <?= $sort_selected ?></option>
                    <option value="date_desc" id="sort_date_desc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Newest']) ?></option>
                  <option value="date_asc" id="sort_date_asc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Oldest']) ?></option>
                  <option value="price_asc" id="sort_price_asc"><?= $this->Paginator->sort('price', $options=['direction' => '$-$$$']) ?></option>
                  <option value="price_desc" id="sort_price_desc"><?= $this->Paginator->sort('price', $options=['direction' => '$$$-$']) ?></option>
                  
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>


    <div class="row">
      <div class="col m3 s12">
      <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>
          <ul class="collapsible" data-collapsible="expandable" style="line-height: normal; min-width: 90%">
            <li>
              <div class="collapsible-header active" style="padding-left: 2rem;">CONDITION</div>
              <div class="collapsible-body" style="padding-top: 10px; padding-bottom: 10px;">
                <!-- Do not change any attributes or properties!  Let me
                     know if changes are necessary.
                     (David, 4/15/17) -->
                <p>
                  <input name='condition_new' value='new' type="checkbox" id="test1" />
                  <label for="test1">New</label>
                </p>
                <p>
                  <input name='condition_like_new' value='like_new' type="checkbox" id="test2" />
                  <label for="test2">Like New</label>
                </p>
                <p>
                  <input name='condition_good' value='good' type="checkbox" id="test3" />
                  <label for="test3">Good</label>
                </p>
                <p>
                  <input name='condition_fair' value='fair' type="checkbox" id="test4" />
                  <label for="test4">Fair</label>
                </p>
                <p>
                  <input name='condition_poor' value='poor' type="checkbox" id="test5" />
                  <label for="test5">Poor</label>
                </p>
              </div>
            </li>
            <li>

              <div class="collapsible-header active" style="padding-left: 2rem;">PRICE RANGE</div>
              <div class="collapsible-body" style="padding-top: 10px; padding-bottom: 10px;">
                <!-- Do not change any attributes or properties!  Also,
                     the filtering code assumes price ranges are separated
                     by steps of 25 ([0,25), [25,50), and so on.  Please do
                     not change any of these without letting me know.
                     (David, 4/15/17)-->
                <p>
                  <input name='price' value='1' type="checkbox" id="test6" />
                  <label for="test6">Under $25</label>
                </p>
                <p>
                  <input name='price' value='2' type="checkbox" id="test7" />
                  <label for="test7">$25 - $49.99</label>
                </p>
                <p>
                  <input name='price' value='3' type="checkbox" id="test8" />
                  <label for="test8">$50 - $74.99</label>
                </p>
                <p>
                  <input name='price' value='4' type="checkbox" id="test9" />
                  <label for="test9">$75 - $99.99</label>
                </p>
                <p>
                  <input name='price' value='5' type="checkbox" id="test10" />
                  <label for="test10">$100 or more</label>
                </p>               
              </div>
            </li>
            <div class="collapsible-header active" style="padding-left: 2rem;"> 
                <button type="submit" style= "width: 100%;">
                  Apply
                </button>
              </div>
          </ul>

        
        <!-- Send the selected fory and search terms -->
        <input name='category_filter' value='<?= $default_category ?>' type="hidden" />
        <input name='tags' value='<?= $this->request->query['tags'] ?>' type="hidden" />

      <?= $this->Form->end() ?>
      </div>



        <div class="col m9 s12">

          
            <?php $counter = 0; ?>
            <?php foreach ($listings as $listing): ?> 
              <?php if($counter === 0): ?>
                  <?= '<div class="row' . $rownum . '">' ?>
              <?php endif; ?>
              <div class="col s12 m6 l4 card-container">
                <div class="card medium hoverable">
                  <div class="card-image">
                    <?php if($listing->image !== null): ?>
                      <?php $blobimg = stream_get_contents($listing->image); ?>
                      <a class = "item-img" style = "text-decoration: none" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                      <?= '<img src = " ' . $blobimg . '" style = "width: 400px; height: 250px" />' ?>
                      </a>
                    <?php endif; ?>
                  </div>
                  <div class="card-content">

                    <span class="card-title">
                      <?= $this->Html->link(__($listing->title), ['action' => 'view', $listing->listing_num]) ?>
                    </span>

                    <a class="left"><?= h($listing->condition_id) ?></a>
                    <a class="right">$ <?= h($listing->price) ?></a>
                    
                  
                  </div>
                  <div class="card-action">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $listing->listing_num]) ?>
                    <?= '<a href="#quickview' . $listing->listing_num . '">Quick View</a>' ?>

                

                    <?= '<div class="modal" id="quickview' . $listing->listing_num . '">' ?>
                      <div class="modal-content">
                        <div class="row">
                          <h5><?= $this->Html->link(__($listing->title), ['action' => 'view', $listing->listing_num]) ?></h5>  
                        </div>
                        <div class="row">

                          <div class="col m7" style="overflow: hidden;">
                            <a class = "item-img" style = "text-decoration: none" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                              <?= '<img src = " ' . $blobimg . '" style = "width: 400px; height: 250px" />' ?>
                            </a>
                          </div>

                          <div class="col m5">
                            <div class="row">
                              <span><?= h($listing->condition_id) ?></span>
                              <span class="right">$ <?= h($listing->price) ?></span>
                            </div>
                            <div class="row">
                              <span><strong>Description: </strong> <?= h($listing->item_desc) ?></span>
                            </div>
                            <div class="row">
                              <?= $this->Html->link(__('View more details'), ['action' => 'view', $listing->listing_num]) ?>
                            </div>

                          </div>
                            
                        </div>
                        <div class="modal-footer">
                          <?php if($currentUser !== null): ?>
                            <a class="btn modal-close" href="#contact_box">Contact Seller</a>
                          <?php else: ?>
                            <a class="btn modal-close" href="#modal1">Contact Seller</a>
                          <?php endif; ?>

                        </div>
                      </div>
                    <?= '</div>'; ?> 
                    <?= $this->Html->link( $item->title, ['controller' => 'Listings', 'action' => 'view', $item->listing_num] ) ?>
                  </div>
                </div>
              </div>

            <?php $counter++;
              if($counter >2){
                $counter = 0;
                echo '</div>';
               }?>
              
            <?php endforeach; ?>
            <?php if($counter < 3): ?>
              <?= '</div>' ?>

            <?php endif; ?>

            

        </div>
      </div>

  <!--</form>-->
</div>

<script>
    document.getElementById('txtkey').value = "<?= $this->request->query['tags']; ?>";
    var price_range = <?= $this->request->query['price']; ?>;
    if (price_range) {
        document.getElementById('price_range').value = price_range;
        document.getElementById('test' + (price_range + 5)).checked = true;
    }
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
    $('.collapsible').collapsible();
  });

  function f() {
    var selectBox = document.getElementById("select_sort");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById('sort_' + selectedValue).firstChild.click();
  }
</script>

