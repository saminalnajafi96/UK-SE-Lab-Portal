$(document).ready(function () {
    // Click on the systems to show IP addresses + other details
    $("#FAS2552_Front").click(function() {
        $("#FAS2552_hover").toggle("slow");
    });
    $("#SF4805_Front").click(function() {
        $("#SF4805_hover").toggle("slow");
    });

    // Toggle views of system by clicking on button
    $("#frontButton").click(function() {
        $(".back").hide();
        $(".front").show("slow");
    });
    $("#backButton").click(function() {
        $(".front").hide();
        $(".back").show("slow");
    });

    // Zooming into rear view of system
    $(".zoom").zoom();
});