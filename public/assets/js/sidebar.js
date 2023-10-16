let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.custom-sidebar');

btn.onclick = function () {
    sidebar.classList.toggle('active');
};