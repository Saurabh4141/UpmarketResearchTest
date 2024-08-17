document.addEventListener("DOMContentLoaded", function () {

    let pathname = window.location.pathname;
    if (pathname) {
        let pathSegments = pathname.split("/");
        if (pathSegments.length === 2 && pathSegments[1] === "") {
            var activeRoute = ".home";
        } else {
            var activeRoute = pathSegments[pathSegments.length - 2] + "_" + pathSegments[pathSegments.length - 1];
            activeRoute = "." + activeRoute;
        }
        $(activeRoute).addClass("active");
    } 

    $('[data-bs-toggle="tooltip"]').tooltip();

});
