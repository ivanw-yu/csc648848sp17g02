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
            echo $this->Form->input('image1', [ 'id' => 'blob1' , 'type' => 'hidden']);
            echo $this->Form->input('image 2', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(1);']);
            echo $this->Form->input('image2', [ 'id' => 'blob2' , 'type' => 'hidden']);
            echo $this->Form->input('image 3', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(2);']);
            echo $this->Form->input('image3', [ 'id' => 'blob3' , 'type' => 'hidden']);
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn right grey', 'style' => 'margin: 15px; ']) ?>
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
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>