    <?php get_template_part( 'partials/block', 'footer' ); ?>
    <?php get_template_part( 'partials/page', 'options' ); ?>
    <?php wp_footer(); ?>
    <?php
      if( get_field('footer_scripts') ):
        the_field('footer_scripts');
      endif;
    ?>

  <?php if( get_field('page_progress') ): ?>
    <div class="progress-container">
      <div class="progress-bar" id="progressBar"></div>
      <div class="progress-indicator" id="progressIndicator">READING PROGRESS: 0%</div>
    </div>
    <style type="text/css">
      .progress-container {
        width: 100%;
        height: 16px;
        background: #444;
        position: fixed;
        top:0;
        left:0;
      }
      .progress-bar {
        height: 16px;
        background-color: #a4508b;
        background-image: linear-gradient(326deg, #a4508b 0%, #5f0a87 74%);
        width: 0%;
      }
      .progress-indicator{
        font-size: 10px;
        color: #fff;
        font-family: 'Arial';
        position: absolute;
        left: 10px;
        top: 0;
        line-height: 16px;
      }
    </style>
    <script type="text/javascript">
      const progressBar = () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById("progressBar").style.width = scrolled + "%";
        document.getElementById("progressIndicator").innerHTML = "READING PROGRESS: " + scrolled.toFixed() + "%";
      }
      window.onscroll = () => {progressBar()};
    </script>
  <?php endif; ?>

  </body>
</html>