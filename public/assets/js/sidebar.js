let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.custom-sidebar');
let header = document.querySelector('header');
let main = document.querySelector('main');
// let li = document.querySelector('#dashboard');
// let spanDash = document.querySelector('#toolhint1');

btn.onclick = function () {
    sidebar.classList.toggle('active');
    header.classList.toggle('active-navbar');
    main.classList.toggle('active-main');
    console.log(sidebar);
};

// function showToolhint1(element) {
//     var toolhint = document.querySelector('.toolhint1');
//     // toolhint.textContent = "Toolhintshow";
//     toolhint.id = "toolhintshow";
//     console.log(toolhint);
// }

// function showToolhint2(element) {
//     var toolhint = document.querySelector('.toolhint2');
//     // toolhint.textContent = "Toolhintshow";
//     toolhint.id = "toolhintshow";
//     console.log(toolhint);
// }

function showToolhint1(element) {
    var toolhint = document.querySelector('#toolhint');
    // toolhint.textContent = "Toolhintshow";
    toolhint.classList.add("toolhintshow");
    toolhint.classList.remove("toolhint");
    console.log(toolhint);
}

function hideToolhint1(element) {
    var toolhint = document.querySelector('#toolhint');
    // toolhint.textContent = "Dashboard";
    toolhint.classList.remove("toolhintshow");
    toolhint.classList.add("toolhint");
    console.log(toolhint);
}

function showToolhint2(element) {
    var toolhint = document.querySelector('#toolhint2');
    // toolhint.textContent = "Toolhintshow";
    toolhint.classList.add("toolhintshow");
    toolhint.classList.remove("toolhint");
    console.log(toolhint);
}

function hideToolhint2(element) {
    var toolhint = document.querySelector('#toolhint2');
    // toolhint.textContent = "Dashboard";
    toolhint.classList.remove("toolhintshow");
    toolhint.classList.add("toolhint");
    console.log(toolhint);
}

// function hideToolhint1(element) {
//     var toolhint = document.querySelector('.toolhint1');
//     // toolhint.textContent = "Dashboard";
//     toolhint.id = "";
//     console.log(toolhint);
// }

// function hideToolhint2(element) {
//     var toolhint = document.querySelector('.toolhint2');
//     // toolhint.textContent = "Dashboard";
//     toolhint.id = "";
//     console.log(toolhint);
// }


// document.addEventListener("DOMContentLoaded", function () {
//     const links = document.querySelectorAll("li a");

//     links.forEach((link) => {
//         link.addEventListener("mouseenter", function () {
//             const iElement = this.querySelector("i");
//             if (iElement) {
//                 const toolhint = document.createElement("span");
//                 toolhint.className = "toolhint";
//                 toolhint.textContent = "{{ $title }}"; // Ganti dengan teks tooltip yang sesuai
//                 this.appendChild(toolhint);
//             }
//         });

//         link.addEventListener("mouseleave", function () {
//             const toolhint = this.querySelector(".toolhint");
//             if (toolhint) {
//                 this.removeChild(toolhint);
//             }
//         });
//     });
// }); x``

// $(document).ready(function () {
//     $("li a").hover(
//         function () {
//             $(this).next(".toolhint").show();
//         },
//         function () {
//             $(this).next(".toolhint").hide();
//             console.log("hallo");
//         }
//     );
// });

// li.addEventListener('mouseenter', () => {

// })
