import { closestElement, containsClass, removeClass, toggleClass } from './helpers.js';

const inputSelect = document.querySelectorAll('.input-select');
inputSelect?.forEach(inputSelect => {
	const inputSelectText = inputSelect.querySelector('.input-select__text');
	const inputSelectOptions = inputSelect.querySelector('.input-select__options');
	const body = document.body;

	const removeClassInputSelect = e => {
		// console.log('cl', closestElement(e.target, 'input-select'));

		if (!closestElement(e.target, 'input-select')) {
			// console.log('first');
			body.removeEventListener('click', removeClassInputSelect);
			removeClass(inputSelect, 'input-select-active');
		}
	};

	inputSelectText.addEventListener('click', () => {
		toggleClass(inputSelect, 'input-select-active');
		body.removeEventListener('click', removeClassInputSelect);

		if (containsClass(inputSelect, 'input-select-active')) {
			body.addEventListener('click', removeClassInputSelect);
		}
	});

	inputSelectOptions.addEventListener('click', e => {
		if (containsClass(e.target, 'input-select__option')) {
			inputSelectText.querySelector('.input-select__text-inner').innerText = e.target.innerText;
			body.removeEventListener('click', removeClassInputSelect);
			removeClass(inputSelect, 'input-select-active');
		}
	});
});
