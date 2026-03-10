document.addEventListener('DOMContentLoaded', () => {
	const sliders = document.querySelectorAll('.sm-blog-slider');
	
	sliders.forEach(slider => {
		const slides = slider.querySelectorAll('.sm-blog-slide');
		const prevBtn = slider.querySelector('.sm-nav-prev');
		const nextBtn = slider.querySelector('.sm-nav-next');
		const counterCurrent = slider.querySelector('.sm-nav-counter .current');
		
		let currentIndex = 0;
		const total = slides.length;

		const updateSlider = (newIndex: number) => {
			slides[currentIndex].classList.remove('active');
			currentIndex = (newIndex + total) % total;
			slides[currentIndex].classList.add('active');
			if (counterCurrent) counterCurrent.textContent = (currentIndex + 1).toString();
		};

		if (prevBtn) {
			prevBtn.addEventListener('click', () => updateSlider(currentIndex - 1));
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', () => updateSlider(currentIndex + 1));
		}
	});
});
