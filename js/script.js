// Toggling Sidebar
document.getElementById("sidebarCollapse").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("content").classList.toggle("active");
});

document.getElementById("sidebarCollapseX").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("content").classList.toggle("active");
});

function handleMenuClick(element) {
    // Menghapus class "aktif" dari semua menu
    var menuItems = document.querySelectorAll(".nav-link");
    menuItems.forEach(function (item) {
        item.classList.remove("active");
    });

    // Menambahkan class "active" pada menu yang di-klik
    element.classList.add("active");
}

// login
$(document).ready(function () {
    $(".veen .rgstr-btn button").click(function () {
        $(".veen .wrapper").addClass("move");
        // $('.body').css('background', '#e0b722');
        $(".veen .login-btn button").removeClass("active");
        $(this).addClass("active");
    });
    $(".veen .login-btn button").click(function () {
        $(".veen .wrapper").removeClass("move");
        // $('.body').css('background', '#ff4931');
        $(".veen .rgstr-btn button").removeClass("active");
        $(this).addClass("active");
    });
});

// Script untuk mengatur penggantian latar belakang foto saat slide berganti
var carouselItems = document.querySelectorAll(".carousel-item"); // Ambil semua elemen dengan kelas 'carousel-item'
var header = document.getElementById("header"); // Ambil elemen dengan id 'header'

// Fungsi untuk mengubah latar belakang foto sesuai dengan slide yang aktif
function changeBackground() {
    var activeItem = document.querySelector(".carousel-item.active"); // Ambil elemen dengan kelas 'carousel-item' yang memiliki kelas 'active'
    var backgroundImage = activeItem.style.backgroundImage; // Ambil URL latar belakang foto dari elemen yan    g aktif
    header.style.backgroundImage = backgroundImage; // Set latar belakang foto pada elemen dengan id 'header'
}
// Tambahkan event listener untuk event 'slid.bs.carousel' yang terjadi saat slide berganti
header.addEventListener("slid.bs.carousel", changeBackground);

$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").addClass("active");
    });

    $("#sidebarCollapseX").on("click", function () {
        $("#sidebar").removeClass("active");
    });

    $("#sidebarCollapse").on("click", function () {
        if ($("#sidebar").hasClass("active")) {
            $(".overlay").addClass("visible");
            console.log("it's working!");
        }
    });

    $("#sidebarCollapseX").on("click", function () {
        $(".overlay").removeClass("visible");
    });
});


// login
$(document).ready(function () {
    $(".veen .rgstr-btn button").click(function () {
        $('.veen .wrapper').addClass('move');
        // $('.body').css('background', '#e0b722');
        $(".veen .login-btn button").removeClass('active');
        $(this).addClass('active');

    });
    $(".veen .login-btn button").click(function () {
        $('.veen .wrapper').removeClass('move');
        // $('.body').css('background', '#ff4931');
        $(".veen .rgstr-btn button").removeClass('active');
        $(this).addClass('active');
    });
});

// Script untuk mengatur penggantian latar belakang foto saat slide berganti
var carouselItems = document.querySelectorAll('.carousel-item'); // Ambil semua elemen dengan kelas 'carousel-item'
var header = document.getElementById('header'); // Ambil elemen dengan id 'header'

// Fungsi untuk mengubah latar belakang foto sesuai dengan slide yang aktif
function changeBackground() {
    var activeItem = document.querySelector('.carousel-item.active'); // Ambil elemen dengan kelas 'carousel-item' yang memiliki kelas 'active'
    var backgroundImage = activeItem.style.backgroundImage; // Ambil URL latar belakang foto dari elemen yan    g aktif
    header.style.backgroundImage = backgroundImage; // Set latar belakang foto pada elemen dengan id 'header'
}
// Tambahkan event listener untuk event 'slid.bs.carousel' yang terjadi saat slide berganti
header.addEventListener('slid.bs.carousel', changeBackground);