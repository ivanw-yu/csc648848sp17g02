<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - Add Listing';
$this->assign('title', $title);
?>

<div class="listings form large-9 medium-8 columns content">

    <?php $blob = 0; ?>
    <!-- the image doesn't get submitted -->
    
    <?= $this->Form->create($listing, ['enctype' =>'multipart/form-data']) ?>
    <fieldset style = "width: 50%; margin: 5%; font-size: 1.2em">
        <legend style = "font-size: 2em"><?= __('Add Listing') ?></legend>
        <?php
            //echo $this->Form->input('date_created');
            //echo $this->Form->input('is_sold');
            echo $this->Form->input('file', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload();']);
            echo $this->Form->input('price');
            echo $this->Form->input('location',array('default'=>'SFSU'));
            echo $this->Form->input('item_desc');
            echo $this->Form->input('title');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('image', [ 'id' => 'blobfield' , 'type' => 'hidden']);
            //echo $this->Form->input('registered_user_id', ['options' => $registeredUsers]);
            //echo $this->Form->input('course_id', ['options' => $courses, 'empty' => true]); //Commented out for now, need to find a way to make this optional
            echo $this->Form->input('condition_id'/*, ['options' => $conditions, 'empty' => true]*/);
            //echo $this->Form->input('tags');
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
        <?= $this->Form->button(__('Add item')) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>

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


