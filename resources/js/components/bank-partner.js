// console.log(window.innerWidth);
if (window.innerWidth <= 688) {
	const bankPartners = document.querySelectorAll('.bank-partner__bank');
	const btnShowBanks = document.querySelector('.bank-partner__btn-show');

	for (let i = 8; i < bankPartners.length; i++) {
		// console.log(bankPartners[i], i);
		bankPartners[i].style.display = 'none';
	}

	btnShowBanks.addEventListener('click', () => {
		for (let i = 8; i < bankPartners.length; i++) {
			// console.log(bankPartners[i], i);
			bankPartners[i].style.display = 'flex';
		}
		btnShowBanks.style.display = 'none';
	});
}
