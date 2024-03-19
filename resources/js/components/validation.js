import JustValidate from 'just-validate';
import './../vendor/inputMask.js';

// formSelector --- класс формы

const successFormSend = event => {
	event.target.reset();

	document.querySelectorAll('.form')?.forEach(form => {
		form.querySelectorAll('.form__input')?.forEach(input => {
			if (input.classList.contains('just-validate-error-field')) {
				input.classList.remove('just-validate-error-field');
			}
			if (input.classList.contains('just-validate-success-field')) {
				input.classList.remove('just-validate-success-field');
			}
		});
	});

	// при удачной валидации модальное окно закрывается
	document.querySelectorAll('.modal').forEach(modal => {
		modal.classList.contains('active') && modal.classList.remove('active') && body.classList.remove('_lock');
	});

	const body = document.body;
	const modal = document.querySelector('.modal-sendForm');
	const modalClose = modal.querySelector('.modal__body');
	const btnClose = document.querySelector('.modal-sendForm .modal__close');

	body.classList.add('_lock');
	modal.classList.add('active');

	btnClose.addEventListener('click', () => {
		body.classList.remove('_lock');
		modal.classList.remove('active');
	});

	modal.addEventListener('click', e => {
		if (e.target === modalClose) {
			body.classList.remove('_lock');
			modal.classList.remove('active');
		}
	});
	setTimeout(() => {
		body.classList.remove('_lock');
		modal.classList.remove('active');
	}, 5000);
};

const validateForms = form => {
	const inputTel = form.querySelector('input[type="tel"]');

	if (inputTel) {
		const inputMask = new Inputmask('+7 (999) 999 - 99 - 99');
		inputMask.mask(inputTel);
	}

	const validation = new JustValidate(form, { focusInvalidField: true });

	const inputName = form.querySelector('.input__name');

	if (inputName) {
		// console.log('name', form);

		validation
			.addField('.input__name', [
				{
					rule: 'minLength',
					value: 3,
					errorMessage: 'Впишите не менее 3 букв',
				},
				{
					rule: 'maxLength',
					value: 30,
					errorMessage: 'Впишите не более 30 букв',
				},
				{
					rule: 'required',
					value: true,
					errorMessage: 'Введите имя',
				},
			])
			.addField('.input__tel', [
				{
					rule: 'required',
					value: true,
					errorMessage: 'Некорректный номер',
				},
				{
					rule: 'function',
					validator: function () {
						const phone = inputTel.inputmask.unmaskedvalue();
						return phone.length === 10;
					},
					errorMessage: 'Некорректный номер',
				},
			])
			.onSuccess(event => {
				successFormSend(event);
			});
	} else {
		validation
			.addField('.input__tel', [
				{
					rule: 'required',
					value: true,
					errorMessage: 'Некорректный номер',
				},
				{
					rule: 'function',
					validator: function () {
						const phone = inputTel.inputmask.unmaskedvalue();
						return phone.length === 10;
					},
					errorMessage: 'Некорректный номер',
				},
			])
			.onSuccess(event => {
				successFormSend(event);
			});
	}
};

export default validateForms;
