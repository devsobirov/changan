import { addClass, containsClass, removeClass } from './helpers.js';
import modal from './modal.js';

modal('.header__info-link', '.modal-order-phone', '.modal-order-phone .modal__close');

modal('.card-car__btn-blue', '.modal-reserve', '.modal-reserve .modal__close');

// блок с конфигурацией
const modalErrorDelete = modal => {
	modal.querySelectorAll('.form__input')?.forEach(input => {
		removeClass(input, 'just-validate-error-field');
	});
	modal.querySelectorAll('.just-validate-error-label')?.forEach(errorElement => errorElement.remove());
};

document.querySelectorAll('.configuration__list').forEach(list => {
	const configurationLists = list.querySelector('.configuration__lists');
	configurationLists.addEventListener('click', e => {
		const btnOpen = e.target;

		if (containsClass(btnOpen, 'configuration__lists-btn')) {
			let modal = document.querySelector('.modal-reserve');

			const btnClose = document.querySelector('.modal-reserve .modal__close');
			const body = document.body;

			const removeActiveClassModal = () => {
				removeClass(body, '_lock');
				removeClass(modal, 'active');
				modalErrorDelete(modal);
				btnClose.removeEventListener('click', removeActiveClassModal);
			};
			// открытие модального окна
			e.preventDefault();
			addClass(body, '_lock');
			addClass(modal, 'active');

			// закрытие модального окна: по кнопке
			btnClose?.addEventListener('click', removeActiveClassModal, { once: true });

			// закрытие модального окна: по области вокруг модального окна
			modal?.addEventListener(
				'click',
				e => {
					if (e.target === modal) {
						removeActiveClassModal();
					}
				},
				{ once: true },
			);
		}
	});
});
