

function toggleProfileMenu() {

    document
        .getElementById("profileDropdown")
        .classList.toggle("show-profile");

}

window.addEventListener("click", function(e) {

    if (!e.target.closest(".user-menu")) {

        document
            .getElementById("profileDropdown")
            .classList.remove("show-profile");

    }

});

