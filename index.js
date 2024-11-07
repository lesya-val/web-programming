// Бургер-меню
const icon = document.querySelector(".icon");
if (icon) {
  const nav = document.querySelector(".nav");
  icon.addEventListener("click", () => {
    document.body.classList.toggle("lock");
    icon.classList.toggle("icon--active");
    nav.classList.toggle("nav--active");
  });
}

const loader = document.getElementById("loader");

// Скрываем лоадер после загрузки страницы
window.addEventListener("load", () => {
  loader.style.display = "none";
});

// Проверяем, загружена ли страница через 1 секунду и показываем лоадер, если она еще не загружена
setTimeout(() => {
  if (document.readyState !== "complete") {
    loader.style.display = "flex";
  }
}, 1000);
