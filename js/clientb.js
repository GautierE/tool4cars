function toggleViews(showCars) {
  $("#carDetail").remove();
  $("#garageDetail").remove();
  if (showCars) {
    $(".car-list").show();
    $("#garageList").hide();
  } else {
    $(".car-list").hide();
    $("#garageList").show();
  }
}

$(document).ready(function () {
  toggleViews(true);

  $("#carListButton").click(function () {
    toggleViews(true);
  });

  $("#garageListButton").click(function () {
    toggleViews(false);
  });

  $("#garageList > table > tbody > tr").click(function () {
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
