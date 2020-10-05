<div class="comment">
  <div class="comment-author">
    <img src="<?php echo get_sub_field('image'); ?>" alt="" width="48px">
    by
    <span class="name"><?php echo get_sub_field('name'); ?></span>
    |
    <span class="date"><?php echo get_sub_field('date'); ?></span>
  </div>
  <div class="comment-text" style="
    <?php if( get_sub_field('icon_brd') ): ?>
    border-color: <?php echo get_sub_field('icon_brd'); ?>;
    border-width: 1px;
    border-style: solid;
    <?php endif; ?>
  ">
    <div class="comment-text__icon" style="
      color: <?php echo get_sub_field('text_color'); ?>;
      background-color: <?php echo get_sub_field('icon_bg'); ?>;
    ">
      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><g> <g id="right_x5F_quote"> <g> <path style="fill:#fff;" d="M0,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H0z"> </path> <path style="fill:#fff;" d="M20,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H20z"> </path> </g> </g> </g> </svg>
    </div>
    <h5><?php echo get_sub_field('text'); ?></h5>
  </div>
</div>