<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        #pdfContainer {
            width: 100%;
            max-width: 900px;
            margin: auto;
            border: 1px solid #ddd;
            overflow-y: auto;
            height: 80vh;
            /* Set height to make it scrollable */
        }

        canvas {
            display: block;
            margin: 10px auto;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">PDF Viewer (All Pages)</h2>

    <div id="pdfContainer"></div> <!-- This will hold multiple canvases -->

    <script>
        var url = "{{ asset('files/Bab 1 Materi Pengenalan MySQL.pdf') }}"; // Your PDF file path

        pdfjsLib.getDocument(url).promise.then(pdf => {
            var container = document.getElementById('pdfContainer');

            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(page => {
                    var scale = 1.5;
                    var viewport = page.getViewport({
                        scale
                    });

                    var canvas = document.createElement("canvas");
                    var context = canvas.getContext('2d');
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext);
                    container.appendChild(canvas); // Append canvas for each page
                });
            }
        });
    </script>

</body>

</html>
