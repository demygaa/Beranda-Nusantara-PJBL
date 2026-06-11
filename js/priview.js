function previewImage(input) {
    let file = input.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function (e) {

        const previews =
            document.querySelectorAll(".previewImg");

        previews.forEach(function (img) {
            if (img) {
                img.src = e.target.result;
            }
        });

    };

    reader.readAsDataURL(file);
}