<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/7/14
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="block-content">
    <?php
        if(isset($viewContent)&& $viewContent!=null)
        {
            echo $viewContent->getContent();
        }
    ?>

</div>