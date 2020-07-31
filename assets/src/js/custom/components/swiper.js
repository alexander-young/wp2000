import Swiper, { Navigation, Pagination } from 'swiper';

const SwiperSlider = () => {
	// core version + navigation, pagination modules:

	// configure Swiper to use modules
	Swiper.use([Navigation, Pagination]);

	new Swiper( '.swiper-container', {
		pagination: {
			el: '.swiper-pagination'
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});

}
export default SwiperSlider;
