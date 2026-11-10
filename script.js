$(document).ready(function () {
  // Character counter
  $("#reason").on("input", function () {
    $("#counter").text($(this).val().length + " / 400");
  });

  $("#applicationForm").on("submit", function (e) {
    let errors = [];

    const name = $("#name").val().trim();
    const email = $("#email").val().trim();
    const phone = $("#phone").val().trim();
    const college = $("#college").val().trim();
    const course = $("#course").val();
    const year = $("#year").val();
    const activity = $("#activity").val();
    const reason = $("#reason").val().trim();

    if (name.length < 3) errors.push("Please enter a valid full name.");

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
      errors.push("Please enter a valid email address.");

    if (!/^[6-9][0-9]{9}$/.test(phone))
      errors.push("Please enter a valid 10-digit Indian mobile number.");

    if (college.length < 3)
      errors.push("Please enter your college or university.");

    if (!course) errors.push("Please select your current course.");

    if (!year) errors.push("Please select your study year.");

    if (!activity) errors.push("Please select an initiative.");

    if (reason.length < 10)
      errors.push(
        "Please write at least 10 characters about why you want to join.",
      );

    if (!$("#consent").is(":checked"))
      errors.push("Please confirm your information is accurate.");

    if (errors.length > 0) {
      e.preventDefault();

      // Corrected error display
      $("#errorBox").empty();

      errors.forEach(function (error) {
        $("#errorBox").append($("<div>").text("• " + error));
      });

      $("#errorBox").show();

      $("html, body").animate(
        {
          scrollTop: $("#errorBox").offset().top - 100,
        },
        300,
      );

      return;
    }

    $("#errorBox").hide();
    $("#submitBtn").prop("disabled", true).text("Submitting application...");
  });
});
