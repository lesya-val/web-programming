// Бургер-меню
const icon = document.querySelector('.icon')
if (icon) {
	const nav = document.querySelector('.nav')
	icon.addEventListener('click', () => {
		document.body.classList.toggle('lock')
		icon.classList.toggle('icon--active')
		nav.classList.toggle('nav--active')
	})
}