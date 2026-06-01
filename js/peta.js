
const peta = document.getElementById("peta");
const marker = document.getElementById("marker");

console.log("PETA =", peta);
console.log("MARKER =", marker);

peta.addEventListener("click", function(e){

    const rect = peta.getBoundingClientRect();

    const clickX = e.clientX - rect.left;
    const clickY = e.clientY - rect.top;

    const x = (clickX / rect.width) * 100;
    const y = (clickY / rect.height) * 100;

    marker.style.left = x + "%";
    marker.style.top = y + "%";
    marker.style.display = "block";

    document.getElementById("x").value = x.toFixed(2);
    document.getElementById("y").value = y.toFixed(2);
});

const editContainer = document.querySelector(".map-pickeredit");

if (editContainer) {

    const img = editContainer.querySelector(".peta-edit");
    const marker = editContainer.querySelector(".marker-edit");

    const inputX = editContainer.parentElement.querySelector(".x-edit");
    const inputY = editContainer.parentElement.querySelector(".y-edit");

    let x = parseFloat(inputX.value);
    let y = parseFloat(inputY.value);

    function setMarker() {
        if (!isNaN(x) && !isNaN(y)) {
            marker.style.left = x + "%";
            marker.style.top = y + "%";
            marker.style.display = "block";
        } else {
            marker.style.display = "none";
        }
    }

    window.addEventListener("load", setMarker);

    img.addEventListener("click", function (e) {
        const rect = editContainer.getBoundingClientRect();

        const clickX = e.clientX - rect.left;
        const clickY = e.clientY - rect.top;

        x = (clickX / rect.width) * 100;
        y = (clickY / rect.height) * 100;

        marker.style.left = x + "%";
        marker.style.top = y + "%";
        marker.style.display = "block";

        inputX.value = x.toFixed(2);
        inputY.value = y.toFixed(2);
    });
}