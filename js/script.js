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

function handleMenuClick(element) {
    // Remove "active" class from all menu items
    var menuItems = document.querySelectorAll('.nav-link');
    menuItems.forEach(function (item) {
        item.classList.remove('active');
    });

    // Add "active" class to the clicked menu item
    element.classList.add('active');
}

// login
$(document).ready(function(){
    $(".veen .rgstr-btn button").click(function(){
        $('.veen .wrapper').addClass('move');
        // $('.body').css('background','#e0b722');
        $(".veen .login-btn button").removeClass('active');
        $(this).addClass('active');

    });
    $(".veen .login-btn button").click(function(){
        $('.veen .wrapper').removeClass('move');
        // $('.body').css('background','#ff4931');
        $(".veen .rgstr-btn button").removeClass('active');
        $(this).addClass('active');
    });
});