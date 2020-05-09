<option value="">--Seleccione--</option>
<?php
    $index = 0;
    foreach($docs as $d){
    ?>
    <option value="<?=$index++?>"><?=$d?></option>
    <?php
    }
?>