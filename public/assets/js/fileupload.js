(function () {
    "use strict";

    /* dropzone */
    Dropzone.autoDiscover = false;

    const thumbnailDropzone = new Dropzone("#formFile", {
        url: "/admin/bab/store", // same route
        paramName: "thumbnail_upload",
        maxFiles: 1,
        acceptedFiles: "image/jpeg,image/png",
        addRemoveLinks: true,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        autoProcessQueue: true,
        uploadMultiple: false,
        parallelUploads: 1,
        init: function () {
            this.on("success", function (file, response) {
                document.getElementById("uploadedThumbnail").value =
                    response.thumbnail_path;
            });

            this.on("removedfile", function () {
                document.getElementById("uploadedThumbnail").value = "";
            });

            this.on("maxfilesexceeded", function (file) {
                this.removeAllFiles();
                this.addFile(file);
            });
        },
    });

    /* filepond */
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginFileEncode,
        FilePondPluginImageEdit,
        FilePondPluginFileValidateType,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    /* multiple upload */
    const MultipleElement = document.querySelector(".multiple-filepond");
    FilePond.create(MultipleElement);

    /* single upload */
    FilePond.create(document.querySelector(".single-fileupload"), {
        labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
        imagePreviewHeight: 170,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleButtonRemoveItemPosition: "center bottom",
    });
})();
