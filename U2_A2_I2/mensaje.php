<!-- Uso: asigne $message y/o $message2 y $class luego incluya este modulo -->
<div>
    
    <?php
    if (isset($message)) {
    ?>
        <div id="mensajeDeUsuario" class="<?php echo $class ?>"><?php echo $message ?></div>
    <?php
    }

    if (isset($message2)) {
    ?>
        <div id="mensajeDeUsuario2" class="<?php echo $class2 ?>"><?php echo $message2 ?></div>
    <?php
    }
    ?>
</div>