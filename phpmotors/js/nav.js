function toggleMenu() {
document.getElementById("primaryNav").classList.toggle('open');
}

const x = document.getElementById('humbergerBtn');
x.onclick = toggleMenu;