<div class="slider">
<?php
  $images = get_sub_field('images');
  foreach( $images as $image ):
    echo '<div class="item">'.wp_get_attachment_image( $image['id'], 'full' ).'</div>';
  endforeach;
?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
<script>
  let
    sliderPrev = document.querySelector('#textSliderNav .slide_prev'),
    sliderNext = document.querySelector('#textSliderNav .slide_next');
    slider = tns({
      container: '.slider',
      items: 1,
      autoplay: true,
      nav: false,
      controls: true,
      autoplayButtonOutput: false
    });
</script>
<style>
.slider .item img{
  display: block;
  width: 100%;
  height: auto;
}
.tns-outer{
  position: relative;
}
.tns-controls{
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-between;
  z-index: 10;
}
.tns-controls button{
  width: 50px;
  background: none;
  border: none;
  color: transparent;
  text-transform: uppercase;
  font-size: 0px;
  transition: .3s ease;
}
.tns-controls button:before{
  font-size: 50px;
  color: blue;
}
.tns-controls button[data-controls="prev"]:before{
  content: "❬";
}
.tns-controls button[data-controls="next"]:before{
  content: "❭";
}
</style>