<div class="row" >
    <?php
    Include('Conexion.php');

    if (isset($_POST['getdata'])) {

        $lim = $_POST['getdata'];
        $autor = $_POST['autor'];
        
        $galeriaDao = GaleriaDAO::singletonGaleria();
        $galerias2 = $galeriaDao->getLimGaleriasByUser($autor, $lim);
        foreach ($galerias2 as $value) { ?>
                <div class="vikash" id="<?php echo $value->getId(); ?>">
                    <div class="col s12">
                        <div class="card large">
                            <div class="card-image">
                                <a href="#">
                                <img class="responsive-img" src="interfaz/app_images/logo.png">
                                <span class="card-title"><?php echo $value->getNombre(); ?></span>
                                </a>
                            </div>
                            <div class="card-content">
                                <p><?php echo $value->getDescripcion(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
    <?php }} ?>
</div>

