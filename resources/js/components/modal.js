import { addClass, removeClass } from './helpers.js';

const modalErrorDelete = modal => {
	modal.querySelectorAll('.form__input')?.forEach(input => {
		removeClass(input, 'just-validate-error-field');
		removeClass(input, 'just-validate-success-field');
		input.value = '';
	});
	modal.querySelectorAll('.just-validate-error-label')?.forEach(errorElement => errorElement.remove());
};

const modal = (btnOpen, modal, btnClose, isLink = false) => {
	!isLink && (btnOpen = document.querySelector(btnOpen));
	modal = document.querySelector(modal);
	const modalClose = modal.querySelector('.modal__body');
	btnClose = document.querySelector(btnClose);
	const body = document.body;
	const removeActiveClassModal = () => {
		removeClass(body, '_lock');
		removeClass(modal, 'active');
		modalErrorDelete(modal);
	};
	// открытие модального окна
	btnOpen?.addEventListener('click', e => {
		e.preventDefault();
		addClass(body, '_lock');
		addClass(modal, 'active');
	});
	// закрытие модального окна: по кнопке
	btnClose?.addEventListener('click', () => {
		removeActiveClassModal();
	});
	// закрытие модального окна: по области вокруг модального окна
	modal?.addEventListener('click', e => {
		if (e.target === modalClose) {
			removeActiveClassModal();
		}
	});
};
// btnOpen --- класс кнопки, при клике на которую будет ОТКРЫВАТЬСЯ модальное окно
// modal --- класс открываемого модального окна
// btnClose --- класс кнопки, при клике на которую будет ЗАКРЫВАТЬСЯ модальное окно
export default modal;
