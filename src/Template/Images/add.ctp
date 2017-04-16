<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->create($image) ?>
    <fieldset style = "width: 50%; margin: 5%; font-size: 1.2em">
        <legend><?= __('Add Image') ?></legend>
        <?php
            //echo $this->Form->input('listing_id', ['options' => $listings, 'empty' => true]);
            echo $this->Form->input('image 1', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(1);']);
            echo $this->Form->input('image', [ 'id' => 'blob1' , 'type' => 'hidden']);
            echo $this->Form->input('image 2', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(2);']);
            echo $this->Form->input('image', [ 'id' => 'blob2' , 'type' => 'hidden']);
            echo $this->Form->input('image 3', ['type' => 'file', 'accept' => 'image/*', 'onchange' => 'imageUpload(3);']);
            echo $this->Form->input('image', [ 'id' => 'blob3' , 'type' => 'hidden']);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
<script>
    function imageUpload(id_num){
            var file = document.querySelector('input[type=file]').files[2 * (id_num-1)];
            var blob = document.getElementById('blobfield' + id_num);
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                blob.value = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
</script>