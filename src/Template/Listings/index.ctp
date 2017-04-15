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


  <div class="page-content">
    <div class="row">
      <div class="search-details" style="width: 100%; padding-right: 4rem; padding-left: 4rem; padding-top: 1rem; padding-bottom: 1rem;">
        <div class="left col m7 s12"> Showing 1-9 of 19 results of "calculus 4th edition book"</div>
        <div class="right col m4 s12 sorting"> 
          <div class="sorting right"> 
            <div class="input-field col s3">
              <label style="font-size: 1.1rem;">sort: </label>
            </div>

            <div class='hidden' id="sort_date_asc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Oldest']) ?></div>
            <div class='hidden' id="sort_date_desc"><?= $this->Paginator->sort('date_created', $options=['direction' => 'Newest']) ?></div>
            <div class='hidden' id="sort_price_asc"><?= $this->Paginator->sort('price', $options=['direction' => '$-$$$']) ?></div>
            <div class='hidden' id="sort_price_desc"><?= $this->Paginator->sort('price', $options=['direction' => '$$$-$']) ?></div>

            <div class="input-field col s9">
              <select id="select_sort" onchange="f();">
                <option value="title" disabled="true">sort</option>
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
                <p>
                  <input name='category' value='new' type="checkbox" id="test1" />
                  <label for="test1">New</label>
                </p>
                <p>
                  <input name='category' value='like_new' type="checkbox" id="test2" />
                  <label for="test2">Like New</label>
                </p>
                <p>
                  <input name='category' value='good' type="checkbox" id="test3" />
                  <label for="test3">Good</label>
                </p>
                <p>
                  <input name='category' value='fair' type="checkbox" id="test4" />
                  <label for="test4">Fair</label>
                </p>
                <p>
                  <input name='category' value='poor' type="checkbox" id="test5" />
                  <label for="test5">Poor</label>
                </p>
              </div>
            </li>
            <li>
              <div class="collapsible-header active" style="padding-left: 2rem;">PRICE RANGE</div>
              <div class="collapsible-body" style="padding-top: 10px; padding-bottom: 10px;">
                <!-- Do not change the 'name' or 'value' attributes!  Also,
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
          </ul>
        <button type="submit">
          Apply
        </button>
        <!-- Send the selected category and search terms -->
        <input name='category_filter' value='<?= $default_category ?>' type="hidden" />
        <input name='tags' value='<?= $this->request->query['tags']; ?>' type="hidden" />

      <?= $this->Form->end() ?>
      </div>

      <div class="col m9 s12">

        
          <?php $counter = 0; ?>
          <?php foreach ($listings as $listing): ?> 
            <?php if($counter === 0): ?>
                <?= '<div class="row' . $rownum . '">' ?>
            <?php endif; ?>
            <div class="col s12 m6 l4 card-container">
              <div class="card medium">
                <div class="card-image">
                  <?php if($listing->image !== null): ?>
                    <?php $blobimg = stream_get_contents($listing->image); ?>
                    <a class = "aclass" style = "text-decoration: none" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                    <?= '<img src = " ' . $blobimg . '" style = "width: 400px; height: 250px" />' ?>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="card-content">

                  <span class="card-title">
                    <?= h($listing->title) ?>
                  </span>

                  <a>$ <?= h($listing->price) ?></a>
                  <?= h($listing->condition_id) ?>
                  <?= h($listing->category_id) ?>
                <?= $this->Html->link(__('View'), ['action' => 'view', $listing->listing_num]) ?>
                </div>
                <div class="card-action">
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
  </div>
</div>


<script>
    document.getElementById('txtkey').value = "<?= $this->request->query['tags']; ?>";  
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

