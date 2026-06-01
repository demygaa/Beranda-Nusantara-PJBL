document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("search");
    const box = document.getElementById("suggestions");

    if (!input || !box) return;

    input.addEventListener("input", function () {

        const value = this.value;

        if (value.trim() === "") {
            box.style.display = "none";
            return;
        }

        fetch("search.php?q=" + encodeURIComponent(value))
            .then(res => res.json())
            .then(res => {

                box.innerHTML = "";

                if (res.status === "empty") {
                    const div = document.createElement("div");
                    div.classList.add("suggestion");
                    div.style.cursor = "default";
                    div.innerHTML = res.message;

                    box.appendChild(div);
                    box.style.display = "block";
                    return;
                }

                const data = res.data;

                if (!data || data.length === 0) {
                    box.style.display = "none";
                    return;
                }

                data.forEach(item => {
                    const div = document.createElement("div");
                    div.classList.add("suggestion");

                    div.innerHTML = `
            <img src="../asset/konten/${item.gambar}">
            <span>${item.judul}</span>
          `;

                    div.onclick = () => {
                        input.value = item.judul;
                        box.style.display = "none";
                    };

                    box.appendChild(div);
                });

                box.style.display = "block";
            })
            .catch(err => console.error(err));
    });

});

const input = document.querySelector(".search-nav input[type='text']");

input.addEventListener("input", function () {
    if (this.value.trim() !== "") {
        this.classList.add("has-value");
    } else {
        this.classList.remove("has-value");
    }
});