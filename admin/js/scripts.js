/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    // tombol range
    var ratingInput = document.getElementById('Rating');
    var ratingValue = document.getElementById('ratingValue');

    // Membaca nilai awal rating dari input range
    var initialRating = ratingInput.value;
    ratingValue.textContent = initialRating;

    // Menangkap perubahan nilai rating
    ratingInput.addEventListener('input', function () {
        var currentRating = ratingInput.value;
        ratingValue.textContent = currentRating;
    });


    // summernote
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 400,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    });
});