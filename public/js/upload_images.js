var ref = new Firebase("https://sizzling-inferno-4813.firebaseio.com");

function funct1() {
    showFileModified();
}

function showFileModified() {
    var input = document.getElementById('image_select');
    for (var i = 0; i < input.files.length; ++i) {
    }
    ref.set({
      anthony: {
        image: "Trolllllololol"
      }
    });
}

document.getElementById("submit_images").onclick = funct1;

function previewFiles() {

    var preview = document.querySelector('#image_display');
    var files = document.querySelector('input[type=file]').files;

    while (preview.hasChildNodes()) {
        preview.removeChild(preview.firstChild);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 100;
                image.title = file.name;
                image.src = this.result;
                preview.appendChild(image);
            }, false);

            reader.readAsDataURL(file);
        }

    }

    if (files) {
        [].forEach.call(files, readAndPreview);
    }

}