$(function() {

    $(".field-wrapper .field-placeholder").on("click", function() {
        $(this).closest(".field-wrapper").find("input").focus();
    });
    $(".field-wrapper input").on("keyup", function() {
        var value = $.trim($(this).val());
        if (value) {
            $(this).closest(".field-wrapper").addClass("hasValue");
        } else {
            $(this).closest(".field-wrapper").removeClass("hasValue");
        }
    });
    $(".field-wrapperTextArea textarea").on("keyup", function() {
        var value = $.trim($(this).val());
        if (value) {
            $(this).closest(".field-wrapperTextArea").addClass("hasValue");
        } else {
            $(this).closest(".field-wrapperTextArea").removeClass("hasValue");
        }
    });
});