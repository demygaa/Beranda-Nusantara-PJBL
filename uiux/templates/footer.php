<footer>
    <div class="footer-container">

        <!-- Bagian Atas -->
        <div class="footer-top">

            <!-- Kolom Logo -->
            <div class="footer-col" id="top">
                <div class="footer-logo">
                    <img src="../asset/icon/logo.png" alt="Logo Beranda Nusantara">
                    <h2>BERANDA NUSANTARA</h2>
                </div>
                <p class="footer-description">
                    Menjelajahi kekayaan budaya Indonesia melalui peta interaktif,
                    cerita, dan pengalaman digital yang memukau.
                </p>
            </div>

            <!-- Kolom Navigasi -->
            <div class="footer-col" id="navfo">
                <h3>Navigasi</h3>
                <a href="index.php?page=homepage">Beranda</a>
                <a href="index.php?page=homepage#peta">Peta Budaya</a>
                <a href="#sectionkotak">Cari Budaya</a>

                <a href="index.php?page=kontak">Kontak</a>
            </div>

            <!-- Kolom Kebudayaan -->
            <div class="footer-col" id="navbu">
                <h3>Kebudayaan</h3>
                <div class="navigasi-budaya">
                    <div>
                        <a href="index.php?page=listcard&kategori=tarian">Tarian Tradisional</a>
                        <a href="index.php?page=listcard&kategori=pakaian tradisional">Pakaian Tradisional</a>
                        <a href="index.php?page=listcard&kategori=alat musik">Alat Musik</a>
                        <a href="index.php?page=listcard&kategori=batik">Batik</a>
                        <a href="index.php?page=listcard&kategori=seni pertunjukan drama">Seni Pertunjukan Drama</a>
                    </div>
                    <div>
                        <a href="index.php?page=listcard&kategori=senjata alat perang">Alat Perang</a>
                        <a href="index.php?page=listcard&kategori=lagu">Lagu</a>
                    </div>
                </div>
            </div>


            <div class="footer-col">
                <h3>Ikuti Kami</h3>
                <div class="social-icons">
                    <a href="https://www.instagram.com/demygaaa"><img src="../asset/icon/instagram.png"
                            alt="">berandanusantarid</a>
                    <a href=""><img src="../asset/icon/youtube.png" alt="">BerandaNusantara_ID</a>
                    <a href=""><img src="../asset/icon/twitter.png" alt="">BerandaNusantaraX</a>
                    <!-- <a href="#">LOGIN</a> -->
                </div>
                <p style="color: #c0c0ff; font-size: 14px;" id="pfot">
                    Bergabunglah dengan komunitas pecinta budaya Nusantara.
                </p>
            </div>
        </div>

        <!-- Garis Pemisah + Bagian Bawah -->
        <div class="footer-bottom">
            <div>
                &copy; 2026 <strong>Beranda Nusantara</strong>. All Rights Reserved.
            </div>
            <div>
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat & Ketentuan</a>
            </div>
            <div>
                Dibuat untuk Indonesia
            </div>
        </div>
    </div>
</footer>

<script>
    const tabId = sessionStorage.getItem("tab_id") || crypto.randomUUID();

    sessionStorage.setItem("tab_id", tabId);

    function sendHeartbeat() {

        fetch("heartbeat.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "tab_id=" + tabId
        });

    }

    sendHeartbeat();

    setInterval(sendHeartbeat, 5000);
</script>


</body>
<script>
    const tombol = document.getElementById("carilokasi");
    const pin = document.querySelector(".pin");

    if (tombol && pin) {

        tombol.onclick = function () {


            if (pin.style.display === "block") {
                pin.style.display = "none";
            } else {
                pin.style.display = "block";
            }

        }

    }
</script>
<script>
    // Navbar transparan berubah saat di-scroll
    window.addEventListener("scroll", function () {
        const header = document.querySelector("header");
        if (window.scrollY > 10) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
    // Dropdown kebudayaan agar muncul saat diklik
    const dropdown = document.querySelector('.nav-dropdown');

    dropdown.addEventListener('click', function (event) {
        event.stopPropagation(); // mencegah klik menutup langsung
        dropdown.classList.toggle('active');
    });

    // Klik di luar dropdown → tutup menu
    document.addEventListener('click', function () {
        dropdown.classList.remove('active');
    });
</script>
<script>
    // Fitur masuk admin lewat URL
    const params = new URLSearchParams(window.location.search);
    const adminKey = params.get("admin");

    if (adminKey === "passkey:admin123321nusantara") {
        window.location.href = "../loginadmin.php";
    }
</script>
<script>
    function toggleMenu() {

        /* 
        Mengambil elemen NAV MENU berdasarkan ID nya (nav-menu).
        Lalu menambah atau menghapus class "show".
        Jika class "show" ditambahkan → menu muncul.
        Jika class "show" dihapus → menu hilang.
        */
        document.getElementById("nav-menu").classList.toggle("show");
    }
</script>
<script>
    function toggleMenu() {
        const nav = document.querySelector("nav");
        nav.classList.toggle("show");
    }
</script>

<script>

    const search = <?= json_encode($search ?? '') ?>;

    const hasilSearch = document.querySelector(".hasil-container");
    const sectionKotak = document.querySelector("#sectioncontent");

    if (search.trim() !== "") {

        hasilSearch.style.display = "block";
        sectionKotak.style.display = "none";

    } else {

        hasilSearch.style.display = "none";
        sectionKotak.style.display = "flex";

    }

</script>
<script>

    function showPopup(daerah) {

        document.getElementById("popup").style.display = "flex";

        document.getElementById("popup-title").innerHTML = daerah;

        fetch("pages/popupbudaya.php?daerah=" + daerah)

            .then(response => response.text())

            .then(data => {

                document.getElementById("popup-body").innerHTML = data;

            });

    }

    function closePopup() {

        document.getElementById("popup").style.display = "none";

    }


</script>
<script>
    const button = document.getElementById("tambah");
    const inputan = document.querySelector(".artikel-form");

    if (button && inputan) {

        button.onclick = function () {

            const display = getComputedStyle(inputan).display;

            if (display === "none") {
                inputan.style.display = "flex";
            } else {
                inputan.style.display = "none";
            }

        }

    }
</script>
 <script>
    const buttonMobile = document.getElementById("searchMobile");
    const entryResult = document.getElementById(".entry-search");

    if (buttonMobile && entryResult) {

        buttonMobile.onclick = function () {
            const display = getComputedStyle(entryResult).display;

            if (display === "none") {
                entryResult.style.display = "flex";
            } else {
                entryResult.style.display = "none";
            }
        }
    }
</script> 
<script src="../js/search.js"></script>
<script src="../js/user.js"></script>
<script src="../js/priview.js"></script>
<script src="../js/notif.js"></script>

</html>