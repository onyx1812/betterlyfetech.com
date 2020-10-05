<div class="images">
<?php
  $images = get_sub_field('images');
  foreach( $images as $image ):
    echo '<div>'.wp_get_attachment_image( $image['id'], 'full' ).'</div>';
  endforeach;
?>
</div>