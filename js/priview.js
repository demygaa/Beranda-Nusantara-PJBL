
function previewImage(input) {

    let file = input.files[0];

    if (file) {
        let reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById("previewImg").src = e.target.result;
        }

        reader.readAsDataURL(file);
    }
}
