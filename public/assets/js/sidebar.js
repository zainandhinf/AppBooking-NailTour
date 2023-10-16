let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.custom-sidebar');
let header = document.querySelector('header');
let main = document.querySelector('main');

btn.onclick = function () {
    sidebar.classList.toggle('active');
    header.classList.toggle('active-navbar');
    main.classList.toggle('active-main');
    console.log(header);
};