[
    "success",
    "terima",
    "edit",
    "hapus",
    "tambahpeta"
].forEach(id => {

    const notif = document.getElementById(id);

    if(notif){
        setTimeout(() => {
            notif.style.display = "none";
        }, 5000);
    }

});