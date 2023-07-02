const navbarToggle = document.querySelector('.navbar-toggle');
const sidebar = document.querySelector('.sidebar');

navbarToggle.addEventListener('click', () => {
  sidebar.classList.toggle('active');
});
