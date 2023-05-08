<?php
 namespace Publics\Js\Config_Global;
 class Js{
    static function script($js){
       ?>
        <script>
        <?php
        include_once ("./public/js/{$js}.js");
        ?>
        </script>
        <?php
    }

}

?>