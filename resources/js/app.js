require('./bootstrap');

$(document).ready(function () {
    $("#comment-form").submit(function (e) {
        $("#comment-submit").attr("disabled", true);
        return true;
    });
});
