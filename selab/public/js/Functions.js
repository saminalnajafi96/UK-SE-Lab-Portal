$(document).ready(function () {
    // click on the systems shows IP addresses + other details
    $("#EF540_N1_Front").click(function() {
        $("#hover1").toggle("slow");
    });
    $("#EF540_N2_Front").click(function() {
        $("#hover2").toggle("slow");
    });
    $("#SF4805_N1_Front").click(function() {
        $("#hover3").toggle("slow");
    });
    $("#3250_N1_Front").click(function() {
        $("#hover1").toggle("slow");
    });
    $("#3250_N2_Front").click(function() {
        $("#hover2").toggle("slow");
    });
    $("#2552_Front").click(function() {
        $("#hover1").toggle("slow");
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