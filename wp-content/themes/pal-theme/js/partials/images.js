let images = document.querySelectorAll('img[data-src]');
function winPosition(){
	let position = window.scrollY + window.outerHeight;
	for (var i = 0; i < images.length; i++) {
		if( position >= images[i].offsetTop ){
			images[i].src = images[i].dataset.src;
		}
	}
}
window.addEventListener('scroll', winPosition);
window.addEventListener('load', winPosition);