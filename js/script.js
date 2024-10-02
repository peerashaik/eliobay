window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function() {
    $(".user .action").click(function() {
        $("body").removeClass('buyer');
        $("body").addClass('user');
        $(".nav-link.buyer").removeClass('active');
        $(".tab-pane.buyer").removeClass('active');
        $(".nav-link.user").addClass('active');
        $(".tab-pane.user").addClass('active');
    });

    $(".buyer .action").click(function() {
        $("body").removeClass('user');
        $("body").addClass('buyer');
        $(".nav-link.user").removeClass('active');
        $(".tab-pane.user").removeClass('active');
        $(".nav-link.buyer").addClass('active');
        $(".tab-pane.buyer").addClass('active');
    });

    $(".nav-link.user").click(function() {
        $("body").removeClass('buyer');
        $("body").addClass('user');
    });

    $(".nav-link.buyer").click(function() {
        $("body").removeClass('user');
        $("body").addClass('buyer');
    });

    $(".removebc").click(function() {
        $("body").removeClass('user');
        $("body").removeClass('buyer');
    });

    $(".email-exist .close").click(function(e) {
        e.preventDefault();
        window.location = "index.php";
    });
    
});

