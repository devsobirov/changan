const rangeSliders = document.querySelectorAll('.range-slider');

let mainColor = '#d5d5d5';
const rangeColor = '#435dff';

if (window.innerWidth <= 825) {
	mainColor = 'transparent';
}

// NOTE: ежемесячный платёж
const monthPayCalc = () => {
	const totalPrice = Number(document.querySelector('.total-price').innerText.replaceAll(' ', ''));

	const monthPay = document.querySelector('.month-pay');
	const firstPayCurrent = Number(document.querySelector('.first-pay').innerHTML.split(' ')[0].replaceAll('&nbsp;', ''));
	const creditTermCurrent = Number(document.querySelector('.range-credit-term').value);
	// console.log(firstPayCurrent, creditTermCurrent);
	// console.log(firstPayCurrent / creditTermCurrent);
	monthPay.innerHTML = Number(((totalPrice - firstPayCurrent) / creditTermCurrent).toFixed(0)).toLocaleString();
};

// NOTE: первоначальный платёж
const firstPayRange = () => {
	const currentRange = rangeSliders[0];
	const tempSliderValue = currentRange.value;
	const progress = (tempSliderValue / currentRange.max) * 100;

	currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

	const firstPay = document.querySelector('.first-pay');

	const firstPayCalc = tempSliderValue => {
		const totalPrice = Number(document.querySelector('.total-price').innerText.replaceAll(' ', ''));
		// console.log(Number(totalPrice), 'totalPrice');
		// console.log(Number(tempSliderValue), 'tempSliderValue');
		firstPay.innerHTML = (totalPrice * (Number(tempSliderValue) / 100)).toLocaleString();
	};

	firstPayCalc(tempSliderValue);

	currentRange.addEventListener('input', e => {
		const tempSliderValue = e.target.value;
		const progress = (tempSliderValue / currentRange.max) * 100;

		currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

		firstPayCalc(tempSliderValue);
		monthPayCalc();
	});
};

// NOTE: число срока кредитования
const countCreditTerm = value => {
	const creditTerm = document.querySelector('.credit-term');
	creditTerm.innerHTML = value + 6;
};

// NOTE: срок кредитования
const creditTermRange = () => {
	const currentRange = rangeSliders[1];
	const tempSliderValue = currentRange.value - 6;
	const progress = (tempSliderValue / (currentRange.max - 6)) * 100;

	currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

	countCreditTerm(tempSliderValue);

	currentRange.addEventListener('input', e => {
		const tempSliderValue = e.target.value - 6;
		const progress = (tempSliderValue / (currentRange.max - 6)) * 100;
		// console.log(tempSliderValue, progress);

		currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

		countCreditTerm(tempSliderValue);
		monthPayCalc();
	});
};

// NOTE: вызов функций
firstPayRange(); // первоначальный платёж
creditTermRange(); // срок кредитования
monthPayCalc(); // ежемесячный платёж
