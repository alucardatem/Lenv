<form method="post" action="/~rotariudan/Lenv/contact/result" >
    <label for="Name">Name</label> <input type="text" name="Name" id="Name" value="<?php if(isset($Name)) {
        echo $Name;}?>"><br/>
    <?php
        if(isset($nameError)):
    ?>
    <span style="color: #ff0000;"><?=$nameError?></span><br/>
    <?php endif;?>

    <label for="Phone">Phone</label> <input type="text" name="Phone" id="Phone" value="<?php if(isset($Phone)) { echo $Phone;}?>"><br/>

    <?php
        if(isset($phoneError)):
    ?>
    <span style="color: #ff0000;"><?=$phoneError?></span><br/>
    <?php endif;?>

    <label for="From">Email</label> <input type="text" name="From" id="From" value="<?php if(isset($From)) { echo $From;}?>"><br/>

    <?php
        if(isset($fromError)):
    ?>
    <span style="color: #ff0000;"><?=$fromError?></span><br/>
    <?php endif;?>

    <label for="Message">Message</label> <textarea name="Message" id="Message"><?php if(isset($Message)) { echo $Message;}?></textarea><br/>
    <?php
        if(isset($messageError)):
    ?>
    <span style="color: #ff0000;"><?=$messageError?></span><br/>
    <?php endif;?>

    <input type="submit" name="Send" id="Send" value="Send"><br/>
</form>