<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - Add Listing';
$this->assign('title', $title);
?>
<style type="text/css">
    .select-wrapper {
        width: 30%;
    }
</style>

<div class="listings form col s12 m10 content">

    <?php $blob = 0; ?>
    <!-- the image doesn't get submitted -->
    
    <?= $this->Form->create($listing, ['enctype' =>'multipart/form-data']) ?>
        <div class="row" style="display: flex; justify-content: space-between; padding: 25px;">
            <fieldset class="col s10" style = "width: 100%; background-color:white; font-size: 1.2em; box-shadow: 5px 5px 10px #cecece; display: flex; justify-content: center;">
                <legend style = "font-size: 2em"><?= __('Add Item') ?></legend>
                <div class="add-contents" style="padding-left: 20px; padding-right: 20px;">
                <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                <?php
                    //echo $this->Form->input('date_created');
                    //echo $this->Form->input('is_sold');
                    //echo $this->Form->input('price', ['pattern' => '[1-9]']);
        	    // Use this instead of Form->input because 'pattern' does not seem
        	    // to work with that.
                echo "<label class='row' for='title_input'>Title</label>";

                    echo "<div class='row'> <input class='col m12 s10' id='title_input' name='title' type='text' ".
                         " maxlength='64'" .
                         " pattern='(\w|[. \t])+' ".
                         " title='No more than 64 numbers, letters, and periods are allowed' required>" .
                         "</input> </div>";
                echo "<label class='row' for='price_input'>Price ($)</label>";
                    echo "<div class='row'> <input class='col m12 s10' id='price_input' name='price' type='text' maxlength='10'" .
                         " pattern='(\d+)|(\d+.\d\d?)' ".
                         " title='Enter only numbers, or a number with one decimal point' required>" .
                         "</input> </div>";
                echo "<label class='row' for='desc_input'>Description<br></label>";
                    echo "<div class='row'> <textarea class='col m12 s10' id='desc_input' name='item_desc' type='text' ".
                         " maxlength='128'" .
                         " pattern='(\w|[. \t])+' ".
                         " title='No more than 128 numbers, letters, and periods are allowed' required>" .
                         "</textarea></div> ";
                echo "<div class='row'>";
                echo $this->Form->input('location',array(
                        'default'=>'SFSU',
                        'class' => 'col m12 s10',
                        'label' => array('class' => 'row')));
                echo "</div>";
                echo $this->Form->input('category_id', array(
                    'options' => $categories));
                    echo $this->Form->input('image', [ 'id' => 'blobfield' , 'type' => 'hidden']);
                    //echo $this->Form->input('registered_user_id', ['options' => $registeredUsers]);
                    //echo $this->Form->input('course_id', ['options' => $courses, 'empty' => true]); //Commented out for now, need to find a way to make this optional
                echo $this->Form->input('condition_id'/*, ['options' => $conditions, 'empty' => true]*/);
                    //echo $this->Form->input('tags');
                echo $this->Form->input('file', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload();', 'label' => array('class' => 'row')]);
        	    echo '<div id = "file_size_warning" style = "font-size: .7em"> </div>';
                ?>

                <script>
                    function initAutocomplete() {
                        //debugger;
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
                <?= $this->Form->button(__('Add item'), ['class' => 'btn right grey', 'style' => 'margin: 15px; ']) ?>
                <br>                <br>
                <p style = "position: relative; width: 100%;font-size: .75em">More images can be added on the next page.</p>
                </div>

            </fieldset>

        </div>

    <?= $this->Form->end() ?>

</div>

<script>

    // This stores the image as a data url. in html, just do <img src = stream_get_contents($listing->image) ...> to display, base64 encoding is not needed.
    function imageUpload(){
        var file = document.querySelector('input[type=file]').files[0];
        var blob = document.getElementById('blobfield');
        var reader = new FileReader();
        debugger;
        reader.addEventListener("load", function () {
            blob.value = reader.result;
            if(file.size > 750000){
                document.getElementById("file_size_warning").style.color = "red";
                document.getElementById("file_size_warning").innerHTML = "Image size too big, max size: 750KB";
                blob.value = "";
            }else{
                document.getElementById("file_size_warning").innerHTML = "";
            }
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


