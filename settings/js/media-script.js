jQuery(document).ready(function ($) {
  // IMMAGINI DI TESTATA
  jQuery("input[data-contratto-image]").each(function () {
    jQuery(this).click(function (e) {
      e.preventDefault();

      var contrattoImgButton = jQuery(this).data("contratto-image");

      var image = wp
        .media({
          title: "Carica immagine",
          multiple: false,
        })
        .open()
        .on("select", function (e) {
          var uploaded_image = image.state().get("selection").first();
          var image_url = uploaded_image.toJSON().url;
          $("#contratto_" + contrattoImgButton + "_image").val(image_url);
          $("#contratto_" + contrattoImgButton + "_preview").attr(
            "src",
            image_url
          );
        });
    });
  });

  // FILES DEI CONTRATTI
  jQuery("input[data-contratto-file]").each(function () {
    jQuery(this).click(function (e) {
      e.preventDefault();

      var contrattoFileButton = jQuery(this).data("contratto-file");

      var filePdf = wp
        .media({
          title: "Carica file pdf",
          multiple: false,
        })
        .open()
        .on("select", function (e) {
          var uploaded_file = filePdf.state().get("selection").first();
          var file_url = uploaded_file.toJSON().url;
          var file_title = uploaded_file.toJSON().title;

          $("#contratto_" + contrattoFileButton + "_file").val(file_url);
          $("#contratto_" + contrattoFileButton + "_preview").attr(
            "href",
            file_url
          );
          $("#contratto_" + contrattoFileButton + "_preview").text(file_title);
        });
    });
  });
});
