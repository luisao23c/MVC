<?php
 namespace Publics\Css\Config_Global;
class Css{
    static function link($css){
       ?>
        <style>
        <?php
        include_once ("./public/css/{$css}.css");
        
        ?>
        </style>
        <?php
    }

}

?>