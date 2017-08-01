import '../../node_modules/@fancyapps/fancybox';

(function(){
	// Extend Image Prototype Functionality
	Image.prototype.resize = function(){
		const container = this.parentNode;
		const containerRatio = container.offsetWidth / container.offsetHeight;
		const imageRatio = this.offsetWidth / this.offsetHeight;
		if(containerRatio > imageRatio){
			this.classList.remove('vertical');
			this.classList.add('horizontal');
		} else {
			this.classList.remove('horizontal');
			this.classList.add('vertical');
		}
	}

	//
	let galleryImages = [].slice.call(document.querySelectorAll('#gallery li'));
	galleryImages.forEach(function(_target){
		const image = _target.querySelector('img');
		image.onload = image.resize;
		image.src = image.src;
	});

	//
	window.addEventListener('resize', function(){
		galleryImages.forEach(function(_target){
			const image = _target.querySelector('img');
			image.resize();
		});
	});
}())