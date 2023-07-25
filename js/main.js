$(document).ready(function () {
  $("#clientSelect > div").on("click", function () {
    $("#clientSelect > div").removeClass("selected-client");
    $(this).addClass("selected-client");

    let selectedClient = $(this).data("value");
    updateClientView(selectedClient);
  });

  const clientCookie = getCookie("clientId");

  $("#clientSelect > div").each(function () {
    if ($(this).data("value") === clientCookie) {
      $(this).trigger("click");
      return false;
    }
  });

  function updateClientView(selectedClient) {
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

  function setupCarDetailsClick() {
    $(".dynamic-div > div.car-list > div.car-card").on("click", function () {
      let carId = $(this).data("car-id");
      loadCarDetails(carId);
    });
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
