<?php
if (isset($block['data']['preview_image_help'])) :    /* rendering in inserter preview  */
    echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else :

?>
    <section class="starter-block starter-block-NameOfBlock">
       <!-- Developer to fill -->
    </section>
<?php endif; ?>