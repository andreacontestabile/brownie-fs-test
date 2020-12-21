require("./bootstrap");
var $ = require("jquery");

$("#choose-base li.list-item").on("click", function() {
    var thisImage = $(this)
        .children(".item-preview")
        .css("background-image");

    $("#preview").fadeOut(200, function() {
        $(this).css("background-image", thisImage);
        $(this).fadeIn(200);
    });
});

$("#choose-graphics li.list-item").on("click", function() {
    var thisImage = $(this)
        .children(".item-preview")
        .css("background-image");

    $("#preview .graphics-preview").fadeOut(200, function() {
        $(this).css("background-image", thisImage);
        $(this).fadeIn(200);
    });
});

$("#submit-btn").on("click", function(e) {
    e.preventDefault();
    var baseImage = $("#preview")
        .css("background-image")
        .replace(/^url\(['"](.+)['"]\)/, "$1");
    var graphicImage = $("#preview .graphics-preview")
        .css("background-image")
        .replace(/^url\(['"](.+)['"]\)/, "$1");

    mergeImages(
        [
            { src: baseImage, x: -240, y: -120 },
            { src: graphicImage, x: 235, y: 200 }
        ],
        {
            width: 800,
            height: 800
        }
    ).then(function(b64) {
        $("#image_base64").val(b64);
        $("#form").submit();
    });
});
