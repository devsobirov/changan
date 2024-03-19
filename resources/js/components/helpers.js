export const addClass = (element, cls) => {
	element?.classList.add(cls);
};
export const toggleClass = (element, cls) => {
	element?.classList.toggle(cls);
};
export const removeClass = (element, cls) => {
	element?.classList.remove(cls);
};
export const containsClass = (element, cls) => {
	return element?.classList.contains(cls);
}; // true/false
export const containsAndRemove = (element, cls) => {
	element?.classList.contains(cls) && element.classList.remove(cls);
};
export const removeClassArray = (elements, cls) => {
	elements?.forEach(element => {
		element?.classList.remove(cls);
	});
};
export const closestElement = (element, cls) => {
	return element?.closest(`.${cls}`);
}; // ищет ближайшего родителя
