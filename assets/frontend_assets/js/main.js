//==============================
//    Owl Slider
//===============================
$('.owl-slider').owlCarousel({
loop: true,
dots: false,
autoplay: true,
autoplayTimeout: 4000,
autoplayHoverPause: true,
smartSpeed: 1500,
center: true,
responsive: {
0: {
items: 1
},
600: {
items: 1
},
1000: {
items: 1
}
}
})
//==============================
//    Owl Slider
//===============================
$('.our-gift-card-carousel').owlCarousel({
loop: true,
dots: false,
autoplay: true,
autoplayTimeout: 4000,
autoplayHoverPause: true,
smartSpeed: 1500,
center: true,
responsive: {
0: {
items: 1
},
600: {
items: 2
},
1000: {
items: 3
}
}
})
//==============================
//    Owl Carosal
//===============================
$('.owl-gift-category').owlCarousel({
loop: true,
dots: false,
autoplay: true,
autoplayTimeout: 2000,
autoplayHoverPause: true,
smartSpeed: 500,
responsive: {
0: {
items: 2
},
600: {
items: 3
},
1000: {
items: 4
}
}
})
//==============================
//    Owl Carosal
//===============================
$('.owl-order').owlCarousel({
loop: true,
dots: false,
autoplay: true,
autoplayTimeout: 2000,
autoplayHoverPause: true,
smartSpeed: 500,
center: true,
responsive: {
0: {
items: 1
},
600: {
items: 1
},
1000: {
items: 1
}
}
})
//============Fixed Menu======================
$(document).ready(function () {
$(window).scroll(function () {
var menuFixed = $(this).scrollTop();
if (menuFixed > 40) {
$('body').addClass('fixed');
} else {
$('body').removeClass('fixed');
}
})
})
//============Scroll Top======================
$(document).ready(function () {
$('.top').click(function () {
$('html, body').animate({
scrollTop: 0
}, 1000)
});
$('.top').hide();
$(window).scroll(function () {
var topButton = $(this).scrollTop();
if (topButton < 400) {
$('.top').fadeOut();
} else {
$('.top').fadeIn();
}
});
});
//============Zoom======================
function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("demo");
var captionText = document.getElementById("caption");
if (n > slides.length) {
slideIndex = 1
}
if (n < 1) {
slideIndex = slides.length
}
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace("active", "");
}
slides[slideIndex - 1].style.display = "block";
dots[slideIndex - 1].className += "active";

};
/*captionText.innerHTML = dots[slideIndex - 1].alt;*/
//============Password Hide Show======================
var eye = false;
function toggle() {
if (eye) {
document.getElementById("password").setAttribute('type', 'password');
document.getElementById("eye1").style.display = 'none';
document.getElementById("eye").style.display = 'block';
eye = false;
} else {
document.getElementById("password").setAttribute('type', 'text');
document.getElementById("eye").style.display = 'none';
document.getElementById("eye1").style.display = 'block';
eye = true;
}
};
//Print button================
function onClickPrint() {
window.print()
}