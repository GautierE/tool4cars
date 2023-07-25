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
});
