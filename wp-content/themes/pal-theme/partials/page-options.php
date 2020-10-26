<script>
  const queryString = window.location.search,
    track = `https://savingsscanner.org/click${queryString}`,
    newLink = track;

  const addClickFunc = () => {
    var formData = new FormData();

    formData.append("action", "addClick");
    formData.append("post_id", <?php echo get_the_ID(); ?>);
    formData.append("ip", USER_IP);

    var request = new XMLHttpRequest();
    request.open('POST', '<?php echo AJAX_URL; ?>', true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400) {
        console.log(this.response);
        setTimeout(()=>{
          window.location.href = newLink;
        }, 1000);
      } else {
        console.log(this.response);
        setTimeout(()=>{
          window.location.href = newLink;
        }, 1000);
      }
    };

    request.onerror = function() {
      console.log(this.response);
        setTimeout(()=>{
          window.location.href = newLink;
        }, 1000);
    };

    request.send(formData);
  }
</script>

<?php if( get_field('preloader') ): ?>
  <?php get_template_part( './partials/block', 'preloader' ); ?>
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
            } else {
              window.location.href = newLink;
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
  <script>
    let textLinks = document.querySelectorAll('.content a[href], [data-url]');
    textLinks.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        openPreloader();
      });
    });
  </script>
<?php else: ?>
  <script>
    let links = document.querySelectorAll('.content a[href], [data-url]');
    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        if(UNIQ_USER){
          addClickFunc();
        } else {
          window.location.href = newLink;
        }
      });
    });
  </script>
<?php endif; ?>