<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - Add Additional Images';
$this->assign('title', $title);
?>

<div class="images form s12 m10 columns content">
    <?= $this->Form->create($image, ['enctype' =>'multipart/form-data']) ?>
    <fieldset style = "width: 40%; background-color:white; font-size: 1.2em; box-shadow: 5px 5px 10px #cecece; display: flex; justify-content: center; margin: 30px;">
        <legend><?= __('Add Additional Images (optional)') ?></legend>
        <?php
            //echo $this->Form->input('listing_id', ['options' => $listings, 'empty' => true]);
            echo $this->Form->input('image 1', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(0);']);
            echo "<br>";
            echo '<div id = "file_size_warning1" style = "font-size: .7em"> </div>';
            echo $this->Form->input('image1', [ 'id' => 'blob1' , 'type' => 'hidden']);
            echo $this->Form->input('image 2', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(1);']);
            echo "<br>";
             echo '<div id = "file_size_warning2" style = "font-size: .7em"> </div>';
            echo $this->Form->input('image2', [ 'id' => 'blob2' , 'type' => 'hidden']);
            echo $this->Form->input('image 3', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(2);']);
            echo "<br>";
             echo '<div id = "file_size_warning3" style = "font-size: .7em"> </div>';
            echo $this->Form->input('image3', [ 'id' => 'blob3' , 'type' => 'hidden']);
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => "btn right grey", 'style' => 'margin: 15px; ']) ?>
        <?= $this->Html->link(__(Skip), ['controller' => 'Listings', 'action' => 'view', $item_id], ['class' => "btn right grey", 'style' => 'width: 20%; margin-left: 80%; padding-right: 10%']) ?>
        <!--<a href = "<//?= 'listings/index/' . $item_id ?>"><div id = "skip" class = "btn right grey" style = "color: white"> Skip</div> </a>-->
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
<script>
    function imageUpload(id_num){
        var file = document.querySelectorAll('input[type=file]')[id_num].files[0];
        var blob = document.getElementById('blob' + (id_num+1));
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            blob.value = reader.result;
            if(file.size > 750000){
                document.getElementById("file_size_warning" + (parseInt(id_num)+1)).style.color = "red";
                document.getElementById("file_size_warning"+ (parseInt(id_num)+1)).innerHTML = "Image "+ (id_num + 1) + " size too big, max size: 750KB";
                blob.value = "";
            }else{
                document.getElementById("file_size_warning"+ (parseInt(id_num)+1)).innerHTML = "";
            }
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>