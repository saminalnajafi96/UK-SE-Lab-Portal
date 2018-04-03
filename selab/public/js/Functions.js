$(document).ready(function () {
    $('.input-password').hide();

    // Toggle views of system by clicking on button
    $("#frontButton").click(function() {
        $(".back").hide();
        $(".front").show("slow");
    });
    $("#backButton").click(function() {
        $(".front").hide();
        $(".back").show("slow");
    });

    $(".connect").click(function() {
        $('.input-password').show();
    });

    // Zooming into rear view of system
    $(".zoom").zoom();
});