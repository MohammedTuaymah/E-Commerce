<?php 
$errors = array();
if(count($errors) > 0): ?>     <!-- if there is more than one error -->
    <div class="msg error">
        <?php foreach ($errors as $error): ?>    <!-- see how many errors there -->
            <li><?php echo $error; ?></li>          <!-- display each of them  -->
        <?php endforeach; ?>
    </div>
<?php endif; ?>