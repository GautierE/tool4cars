function toggleViews(showCars) {
  $("#carDetail").remove();
  $("#garageDetail").remove();
  if (showCars) {
    $("#switchButton").text("Show Garage List");
    $(".car-list").show();
    $("#garageList").hide();
  } else {
    $("#switchButton").text("Show Car List");
    $(".car-list").hide();
    $("#garageList").show();
  }
}

$(document).ready(function () {
  let showCars = true;
  toggleViews(showCars);

  $("#switchButton").click(function () {
    showCars = !showCars;
    toggleViews(showCars);
  });

  $("#garageList > div.garage-card").click(function () {
    const garageId = $(this).data("garage-id");
    loadGarageDetails(garageId);
  });

  function loadGarageDetails(garageId) {
    $.ajax({
      url: `customs/clientb/modules/garages/garageDetail.php?id=${garageId}`,
      type: "GET",
      dataType: "html",
      success: function (data) {
        if ($("#garageDetail").length) {
          $("#garageDetail").remove();
        }

        $("#garageDetails").append(data);
      },
      error: function () {
        $("#garageDetails").append(
          "<p>Failed to load garage details, try again.</p>"
        );
      },
    });
  }
});
