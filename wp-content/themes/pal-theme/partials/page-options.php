<?php
  $data = '';
  if(have_rows('param')):
    while (have_rows('param')):
      the_row();
      if( get_row_index() === 1){
        $data .= get_sub_field('key') .'='. get_sub_field('value');
      } else {
        $data .= '&'.get_sub_field('key') .'='. get_sub_field('value');
      }
    endwhile;
  endif;
?>

<script>
  let link = '<?php the_field('link'); ?>',
    url = window.location.href,
    queryStart = url.indexOf("?") + 1,
    queryEnd = url.indexOf("#") + 1 || url.length + 1,
    query = url.slice(queryStart, queryEnd - 1),
    dynData = '<?php echo $data; ?>',
    newLink = link+'?';

  if( dynData !== '' ) {
    newLink += dynData;
    if( (query !== url || query !== '') && query.length > 0) {
      if( queryStart !== 0 && (queryEnd - queryStart) > 1){
        newLink += '&';
        newLink += query;
      }
    }
  } else {
    if( (query !== url || query !== '') && query.length > 0) {
      if( queryStart !== 0 && (queryEnd - queryStart) > 1){
        newLink += query;
      }
    }
  }
</script>

<script>
  const addClickFunc = () => {
    var formData = new FormData();

    formData.append("action", "addClick");
    formData.append("post_id", <?php echo get_the_ID(); ?>);
    formData.append("ip", USER_IP);

    var request = new XMLHttpRequest();
    request.open('POST', '<?php echo AJAX_URL; ?>', true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400) {
        window.location.href = newLink;
      } else {
        window.location.href = newLink;
      }
    };

    request.onerror = function() {
      window.location.href = newLink;
    };

    request.send(formData);
  }
</script>

<?php if( get_field('preloader') ): ?>
  <div id="preloader" class="preloader hide">
    <div class="preloader-inner">
      <ul>
        <li class="active">&nbsp;</li>
        <?php $i=0; while ( have_rows('preloader_items') ) : the_row(); $i++; ?>
          <li><?php echo get_sub_field('text'); ?></li>
        <?php endwhile; ?>
      </ul>
      <progress max="75" value="0" id="preloaderProgress"></progress>
    </div>
  </div>
  <link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-preloader.css">
  <style>
    .preloader progress[value]::-webkit-progress-value {
      background: <?php the_field('preloader_color'); ?> !important;
    }
  </style>
  <script>
    const openPreloader = () => {
      let preloader = document.getElementById('preloader'),
          preloaderProgress = document.getElementById('preloaderProgress'),
          intervalTime = 2000,
          preloaderInterval = setInterval(preloaderAnim, intervalTime);

      setTimeout(()=>{
        preloaderAnim()
      }, 500);

      preloader.classList.remove('hide');

      setTimeout(function(){
          clearInterval(preloaderInterval);
          preloader.classList.add('hide');
          setTimeout(()=>{
            if(UNIQ_USER){
              addClickFunc();
            }
          }, 500);
      }, 4 * intervalTime);

      function preloaderAnim(){
          let activeItem = document.querySelector('.preloader li.active');
          activeItem.classList.remove('active');
          activeItem.nextElementSibling.classList.add('active');
          preloaderProgress.value = preloaderProgress.value + 20;
      }
    }


  </script>
  <?php if( get_field('no_img_links') ): ?>
    <script>
      let textLinks = document.querySelectorAll('.content a[href], [data-url]');
      textLinks.forEach( link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          openPreloader();
        });
      });
    </script>
  <?php else: ?>
    <script>
      let textLinks = document.querySelectorAll('.content a[href], [data-url], .content img');
      textLinks.forEach( link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          openPreloader();
        });
      });
    </script>

  <?php endif; ?>
<?php else: ?>
  <script>
    // let textLinks = document.querySelectorAll('.content a[href], [data-url]');
    // for (var i = 0; i < textLinks.length; i++) {
    //   textLinks[i].href = newLink;
    // }
    let links = document.querySelectorAll('.content a[href], [data-url], .content img');
    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        if(UNIQ_USER){
          addClickFunc();
        }
      });
    });
  </script>


<?php endif; ?>