$(document).ready(function () {
    $(".open-popup").click(function () {
        var targetPopup = $(this).data('target-popup');
        $("#" + targetPopup).fadeIn(); 
    });

    $(".close").click(function () {
        $(this).closest(".popup").fadeOut(); 
    });
});
