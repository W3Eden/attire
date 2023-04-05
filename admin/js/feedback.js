(function ($) {
  $(document).ready(function () {
    // Listen for changes in the theme selection
    $("body").on("click", ".theme-actions .button.activate", function (e) {
      e.preventDefault();
      _this = this;
      let url = $(_this).prop("href");

      // Display a modal with a form asking for the reason for the switch
      var modalHtml =
        "<style>#theme-switch-modal {\n" +
        "  background-color: rgba(0, 0, 0, 0.4);\n" +
        "  display: none;\n" +
        "  height: 100%;\n" +
        "  left: 0;\n" +
        "  position: fixed;\n" +
        "  top: 0;\n" +
        "  width: 100%;\n" +
        "  z-index: 9999;\n" +
        "}\n" +
        "\n" +
        ".theme-switch-modal-content {\n" +
        "  background-color: #fff;\n" +
        "  border-radius: 6px;\n" +
        "  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);\n" +
        "  margin: 100px auto;\n" +
        "  max-width: 400px;\n" +
        "  padding: 40px;\n" +
        "  position: relative;\n" +
        "  text-align: left;\n" +
        "}\n" +
        "\n" +
        ".theme-switch-modal-content label {\n" +
        "  display: block;\n" +
        "  padding: 1rem;\n" +
        "  background: #C9F0E5;\n" +
        "  border-radius: 4px;\n" +
        "}\n" +
        "\n" +
        "input[type=radio]:focus {\n" +
        "  border-color: #229c7d;\n" +
        "  box-shadow: #229c7d;\n" +
        "}\n" +
        "\n" +
        "input[type=radio]:checked::before {\n" +
        "  background-color: #229c7d;\n" +
        "}\n" +
        "\n" +
        ".theme-switch-modal-content textarea {\n" +
        "  height: 100px;\n" +
        "  margin-bottom: 10px;\n" +
        "  width: 100%;\n" +
        "  border-color: #ccc;\n" +
        "}\n" +
        "\n" +
        '.theme-switch-modal-content button[type="button"] {\n' +
        "  background-color: transparent;\n" +
        "  border: none;\n" +
        "  float: right;\n" +
        "  color: #999;\n" +
        "  cursor: pointer;\n" +
        "  margin-top: -27px;\n" +
        "  font-size: 16px;\n" +
        "}\n" +
        "\n" +
        '.theme-switch-modal-content button[type="submit"] {\n' +
        "  background-color: #229c7d;\n" +
        "  border: none;\n" +
        "  border-radius: 3px;\n" +
        "  color: #fff;\n" +
        "  cursor: pointer;\n" +
        "  display: block;\n" +
        "  font-size: 16px;\n" +
        '  padding: 7px 20px\n</style><div id="theme-switch-modal">';
      modalHtml += '<div class="theme-switch-modal-content">';
      modalHtml += '<form id="theme-switch-form">';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="better"> I found a better theme.</label><br>';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="fse"> I prefer Full Site Editing(FSE) themes.</label><br>';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="design"> Design Issue.</label><br>';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="performance"> Performance Issue.</label><br>';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="compatibility"> Compatibility Issue.</label><br>';
      modalHtml +=
        '<label><input type="radio" name="switch-reason" value="other"> Other reason.</label><br></br/> ';
      modalHtml +=
        '<span for="switch-description">Please describe the issue in few sentences:</span> </br><br/>';
      modalHtml += '<textarea name="switch-description"></textarea>';
      modalHtml += '<button type="submit">Submit</button>';
      modalHtml += '<button type="button">Skip</button>';
      modalHtml += "</form>";
      modalHtml += "</div>";
      modalHtml += "</div>";
      $("body").append(modalHtml);
      $("#theme-switch-modal").fadeIn();

      // Close the modal if the user clicks outside of it
      $(document).on("click", function (e) {
        if ($(e.target).is("#theme-switch-modal")) {
          $("#theme-switch-modal").fadeOut(function () {
            $(this).remove();
          });
        }
      });

      // Submit the form via AJAX
      $("#theme-switch-form").on("submit", function (e) {
        e.preventDefault();
        window.location.href = url;
        var data = {
          action: "theme_switch_reason",
          reason: $('input[name="switch-reason"]:checked').val(),
          description: $('textarea[name="switch-description"]').val(),
        };

        $.post(ajaxurl, data, function (data, status) {
          $("#theme-switch-modal").fadeOut(function () {
            $(this).remove();
          });
        });
      });
    });
  });
})(jQuery);
