<option value="">--Selecione--</option>
    <?php foreach($modulos as $m){?>
        <option value="<?=$m['idModulo']?>"><?=$m['nombreModulo']?></option>
    <?php }?>