<section class="product" style="
  border-radius: <?php echo get_sub_field('box_radius'); ?>px;
  background-image: <?php echo get_sub_field('gradient'); ?>;
">
  <?php if( get_sub_field('progress_line') ): ?>
  <div class="progress-bar" style="
    position: absolute;
    left: 0; top: 0;
    width: 100%;
    animation: .6s linear infinite animate-stripes;
    background-size: 30px 30px;
    background-color: #38ca3f;
    height: 15px;
    width: 100%;
    background-image: linear-gradient(135deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
  "></div>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-5">
      <img src="<?php echo get_sub_field('image'); ?>" alt="" width="100%">
    </div>
    <div class="col-md-7">
      <h4><?php echo get_sub_field('title'); ?></h4>
      <div class="text"><?php echo get_sub_field('text'); ?></div>
      <?php if( get_the_ID() == 1875 ): ?>
      <a href="https://www.bls29trk.com/69PDQW/3MZNPR/" class="btn"
      <?php elseif( in_array(get_the_ID(), array(1910, 1972, 1974, 1908, 1592, 1140, 1609)) ): ?>
      <a href="https://sakmtracker.com/click" class="btn"
      <?php else: ?>
      <a href="https://savingsscanner.org/click" class="btn"
      <?php endif; ?>

      style="
        background-color: <?php echo get_sub_field('btn_bg'); ?>;
        border-color: <?php echo get_sub_field('btn_brd'); ?>;
        color: <?php echo get_sub_field('btn_color'); ?>;
        border-radius: <?php echo get_sub_field('btn_radius'); ?>px;
        font-size: <?php echo get_sub_field('btn_size'); ?>px;
        font-weight: <?php echo get_sub_field('btn_weight'); ?>;
        <?php if( get_sub_field('btn_img') ): ?>
        background-image: url('<?php echo get_sub_field('btn_img'); ?>');
        background-repeat: no-repeat;
        background-position: 8px center;
        padding-left: 60px !important;
        <?php endif; ?>
      " >
        <?php echo get_sub_field('btn_txt'); ?>
      </a>
      <div class="subtext"><?php echo get_sub_field('subtext'); ?></div>
    </div>
  </div>
</section>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-product.css">
