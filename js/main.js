$(document).ready(function () {
  $("#clientSelect").val(getCookie("clientId")).change();
  updateClientView();

  function updateClientView() {
    let selectedClient = $("#clientSelect").val();

    let module = $(".dynamic-div").data("module");
    let script = $(".dynamic-div").data("script");
    let filePath = `customs/${selectedClient}/modules/${module}/${script}.php`;

    $.ajax({
      url: filePath,
      type: "GET",
      dataType: "html",
      success: function (data) {
        $(".dynamic-div").html(data);
        setCookie("clientId", selectedClient, 30);
        setupCarDetailsClick();
      },
      error: function (error) {
        if (error.status === 404) {
          $(".dynamic-div").html(
            "<p>Failed to load content, the resource doesn't exist (An unknown clientId cookie value has probably been entered).</p>"
          );
        } else {
          $(".dynamic-div").html("<p>Failed to load content, try again.</p>");
        }
      },
    });
  }

  $("#clientSelect").on("change", function () {
    updateClientView();
  });

  function setupCarDetailsClick() {
    $(".dynamic-div > div.car-list > table tbody > tr").on(
      "click",
      function () {
        let carId = $(this).data("car-id");
        loadCarDetails(carId);
      }
    );
  }

  function loadCarDetails(carId) {
    $.ajax({
      url: `edit.php?id=${carId}`,
      type: "GET",
      dataType: "html",
      success: function (data) {
        if ($("#carDetail").length) {
          $("#carDetail").remove();
        }

        $(".dynamic-div").append(data);
      },
      error: function () {
        $(".dynamic-div").append(
          "<p>Failed to load car details, try again.</p>"
        );
      },
    });
  }
});
