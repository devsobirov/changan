import { toggleClass } from './helpers.js';

const addressCheckItem = document.querySelector('.address-map__check-item');
const addressCheckInput = addressCheckItem.querySelector('.address-map__check-input');

addressCheckItem.addEventListener('click', () => {
	toggleClass(addressCheckInput, 'address-map__check-input-active');
});
