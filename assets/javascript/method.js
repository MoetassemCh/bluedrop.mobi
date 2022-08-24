// const $ = require("jquery");

// $(document).ready(function () {
//   $(".nav-toggler").each(function (_, navToggler) {
//     var target = $(navToggler).data("target");
//     $(navToggler).on("click", function () {
//       $(target).animate({
//         height: "toggle",
//       });
//     });
//   });
// });


const btn=document.getElementById('menu-btn')
const menu = document.getElementById("menu");

btn.addEventListener('click',navButton)

function navButton(){
 btn.classList.toggle('open')
 menu.classList.toggle('flex')
 menu.classList.toggle("hidden");
}




