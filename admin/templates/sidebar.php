<div class="aside">
    <div class="asidelogo">
        <img src="../asset/icon/logo.png" alt="logo">
        <div>
            <h1>Beranda Nusantara</h1>
            <p>Peta Budaya</p>
        </div>
    </div>
    <hr style="margin: 15px 15px 25px;">
    <div class="gap">
        <div class="nav <?= ($page == 'dashboard' || $page == 'detail') ? 'active' : '' ?>">
            <img src="../asset/icon/iconhome.png" alt="dashboard">

            <a href="admin.php?page=dashboard">
                Dashboard
            </a>
        </div>
        <div class="nav <?= ($page == 'kelolaartikel' || $page == 'edit' || $page == 'detailpermintaan') ? 'active' : '' ?>">
            <img src="../asset/icon/iconedit.png" alt="kelolaartikel">

            <a href="admin.php?page=kelolaartikel">
                Kelola Artikel
            </a>
        </div>
        <div class="nav <?= ($page == 'kelolapeta' || $page == 'detailpeta' || $page == 'detailisi') ? 'active' : '' ?>">
            <img src="../asset/icon/map.png" alt="kelolapeta">

            <a href="admin.php?page=kelolapeta">
                Kelola Peta
            </a>
        </div>
        <div class="nav <?= ($page == 'laporan') ? 'active' : '' ?>">
            <img src="../asset/icon/iconchat.png" alt="laporan">

            <a href="admin.php?page=laporan">
                Laporan User
            </a>
        </div>
        
    </div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
    
</div>
<div class="main-content">