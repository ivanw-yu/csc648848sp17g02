<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Listings'), ['action' => 'index']) ?></li>
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
<div class="listings form large-9 medium-8 columns content">

    <?php $blob = 0; ?>
    <!-- the image doesn't get submitted -->
    
    <?= $this->Form->create($listing, ['enctype' =>'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Listing') ?></legend>
        <?php
            //echo $this->Form->input('date_created');
            //echo $this->Form->input('is_sold');
            echo $this->Form->input('file', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'preview(); imageUpload();']);
            echo $this->Form->input('price');
            echo $this->Form->input('location');
            echo $this->Form->input('item_desc');
            echo $this->Form->input('title');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('image', [ 'id' => 'blobfield' , 'type' => 'hidden']);
            //echo $this->Form->input('registered_user_id', ['options' => $registeredUsers]);
            echo $this->Form->input('course_id', ['options' => $courses, 'empty' => true]);
            echo $this->Form->input('condition_id'/*, ['options' => $conditions, 'empty' => true]*/);
            echo $this->Form->input('tags');
        ?>
        <script>
            function initAutocomplete() {
                debugger;
             autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('location')),
            {types: ['geocode']});
            autocomplete.addListener('place_changed', fillInAddress);
            }
            function fillInAddress() {
                debugger;
                var place = autocomplete.getPlace();
            }   
        </script>
        <?=$this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyAaex_V9gcWMaRqb-e6yJcfbaj9z2COtVU&libraries=places&callback=initAutocomplete');?>
    </fieldset>
    <?= $this->Form->button(__('Add image')) ?>
    <?= $this->Form->end() ?>
</div>

<img src = "" height = "500" width = "500" alt = "image prev..">
<div id="test" style = "width:500px, height: 500px">weqnjenw</div>
<script>

    // This stores the image as a data url. in html, just do <img src = stream_get_contents($listing->image) ...> to display, base64 encoding is not needed.
    function imageUpload(){
        var file = document.querySelector('input[type=file]').files[0];
        var blob = document.getElementById('blobfield');
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            blob.value = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    // used for testing purposes only.
    function preview(){
        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
        preview.src = reader.result;
        document.getElementById("test").innerHTML = window.atob(reader.result);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    /*function convertToBlob(dataURL) {
        var binary = atob(dataURL.split(",")[1]);
        var binaryArray = [];
        //var binaryString = "";
        var i = 0;
        for(var i = 0; i < binary.length; i++) {
            binaryArray.push(binary.charCodeAt(i));
            //binaryString += binary.charCodeAt(i);
        }
        //return binaryString;
        return new Blob([new Uint8Array(binaryArray)], {
        type: "image/jpeg"
      });
    }*/   
</script>


