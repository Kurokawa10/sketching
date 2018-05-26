
    <?php
    include_once 'Conexion.php';
    include_once 'GaleriaDAO.php';
    include_once '../objetos/Galeria.php';
    include_once 'UsuarioDAO.php';
    include_once '../objetos/Usuario.php';

    if (isset($_POST['getdata'])) {

        $lim = $_POST['getdata'];
        $autorId = $_POST['autor'];

        $autorDao = UsuarioDAO::singletonUsuario();
        $autor = $autorDao->getUsuario($autorId);
        
        $galeriaDao = GaleriaDAO::singletonGaleria();
        $galerias2 = $galeriaDao->getLimGaleriasByUser($autorId, $lim);
        if(!empty($galerias2)){
            foreach ($galerias2 as $value) { ?>
                <div class="vikash" id="<?php echo $value->getId(); ?>">
                    <div class="col s12">
                        <div class="card large">
                            <div class="card-image">
                                <a href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId(); ?>">
                                    <img class="responsive-img materialboxed" src="interfaz/galerias/<?php echo $autor->getUsername().'/'.$value->getId().'/0.jpg'; ?>">
                                    <span class="card-title"><strong><?php echo $value->getvisitas(); ?> Views</strong></span>
                                </a>
                            </div>
                            <div class="card-content">
                                <a href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId(); ?>">
                                    <h5><?php echo $value->getNombre(); ?></h5>
                                    <h6><?php if($value->getTipo() == 1){
                                            echo '1€ sub';
                                        }elseif ($value->getTipo() == 3){
                                            echo '3€ sub';
                                        }elseif ($value->getTipo() == 5){
                                            echo '5€ sub';
                                        }else{
                                            echo 'Public';
                                        } ?> Gallery</h6>
                                </a>
                                <a style="float: right" href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId().'#disqus_thread'; ?>">comments</a>
                            </div>
                        </div>
                    </div>
                </div>
    <?php   }
        }
    } ?>


