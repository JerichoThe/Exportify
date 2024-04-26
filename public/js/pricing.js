$(document).ready(function () {
    $(".open-popup").click(function () {
        $("#popup").fadeIn();
    });

    $(".close").click(function () {
        $("#popup").fadeOut();
    });
});
