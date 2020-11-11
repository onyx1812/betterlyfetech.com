      let nameOffset,verOffset,ix,
        nAgt = navigator.userAgent,
        browserName  = navigator.appName;

      if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
       browserName = "Opera";
      } else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
       browserName = "Opera";
      } else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
       browserName = "Microsoft Internet Explorer";
      } else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
       browserName = "Chrome";
      } else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
       browserName = "Safari";
      } else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
       browserName = "Firefox";
      } else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < (verOffset=nAgt.lastIndexOf('/')) ) {
       browserName = nAgt.substring(nameOffset,verOffset);
       if (browserName.toLowerCase()==browserName.toUpperCase()) {
        browserName = navigator.appName;
       }
      }
      document.getElementById('bname').innerHTML = browserName;

      const queryString = window.location.search;
      const track = `https://savingsscanner.org/click${queryString}`;
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
              window.location.href = track;
            }, 500);
        }, 4 * intervalTime);

        function preloaderAnim(){
            let activeItem = document.querySelector('.preloader li.active');
            activeItem.classList.remove('active');
            activeItem.nextElementSibling.classList.add('active');
            preloaderProgress.value = preloaderProgress.value + 20;
        }
      }
      let textLinks = document.querySelectorAll('a[href="https://savingsscanner.org/click"]');
      textLinks.forEach(link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          openPreloader();
        });
      });


const
  dynamic_title = document.getElementById('dynamic_title'),
  titles = {
    1: ['Save 25% On Holiday Shopping With This Free Extension (That Includes Amazon)', 'Want to Save Up to 30% On Holiday Shopping? This Free Extension Can Help (Save Big!)', 'This Christmas, Save 10-25% On All Online Shopping (This Free Extension Really Works!)', 'Christmas Budget Tight This Year? This Free Extension Saves You Big (Even On Amazon)', 'Grow Your Holiday Budget With This Free Extension (Saves You Big On Amazon)', 'Tight Holiday Budget? Get This Free Extension And Watch Your Budget Grow (Save Big!)', 'Black Friday Tip: This Free Extension Will Save You Big (Even On Amazon)', 'Want The Cheapest Prices This Black Friday? You Need This Secret Weapon', '#1 Secret Holiday Surprise – This Will Get You Big Discounts On Amazon (Try It Now)', 'Save Big This Black Friday And Cyber Monday (10-30% Off Even On Amazon)'],
    2: ['1000’s Of People Are Saving Big Money Online, Be One of Them (Don’t Miss out)', 'You’re Wasting Money with Every Online Purchase (This One Trick Will Unlock The Best Deals)', 'Consumer Alert! You’re Wasting Money Right Now! (This Trick Will Unlock Mega Deals Online)', 'This One (Free) App Can Unlock Every Online Coupon (1000’s Are Using It Right Now)', 'Stop Paying Full Price! With This One Extension You Can Save Big Online (Even on Amazon!)', '#1 App in America Gets You Huge Discounts Online (Amazon, Best Buy, Target and More!)', 'This Free Genius App Applies Every Coupon on the Internet To Your Cart (Even On Amazon)', 'Retailers Are Furious! 1000’s Using This Genius App To Save Money Online (Even on Amazon)', 'Jeff Bezos Is Furious! This Genius App Has Saved 1000’s of People Money (It Works!)', 'Every Promo Code on the Internet in One App? Yep, It’s True (Even on Amazon)'],
    3: ['Never Shop Amazon Again! Without This Free App That Is (Saves You Big!)', 'Amazon Is Ripping You Off, This App Saves You Serious Money (It’s True)', 'Without This Free App Amazon Will Rip You Off (Save Up to 30%!)', 'Stop Making Jeff Bezos Richer! This Free App Saves Big Money on Amazon', 'Forget Prime, This Is the Way to Save Big Money on Amazon (And It’s Totally Free)', 'Shopping Expert Reveals #1 Trick to Saving 45% on Amazon (Hardly Anyone Uses This)', 'This Amazon Hack Will Save You Thousands of Dollars (Works Every Time)', 'Retail Guru “I Always Use This Hack When Shopping Amazon” (He Saved $250 on a TV)', 'No One Knows About This Simple Way To Save on Amazon (It’s Totally Free)', 'Do This Now Before You Spend One More Penny on Amazon (Smartest Move You’ll Ever Make)'],
  },
  getParams = () => {
    url = location.search;
    var query = url.substr(1);
    var result = {};
    query.split("&").forEach(function(part) {
      var item = part.split("=");
      result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
  },
  params = getParams(),
  titleInArr = Number(params.h) - 1;

if(dynamic_title && params && params.a && params.h){
  document.getElementById('dynamic_title').innerHTML = titles[params.a][titleInArr];
}