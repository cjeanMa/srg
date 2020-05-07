
                <option value="">--Seleccione--</option>
                <?php if(isset($modulos)){ foreach($modulos as $m){?>
                    <option value="<?php echo $m['idModulo'];?>"><?php echo $m['nombreModulo'];?></option>
                <?php } }?>
