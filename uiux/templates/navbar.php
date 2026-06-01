<header class="<?php echo ($_GET['page'] ?? 'homepage') == 'homepage' ? 'homepage' : ''; ?>">
    <div class="logo-container">
        <a href="index.php?page=homepage" class="detail-link logo-container">
            <img src="../asset/icon/logo.png" width="35" height="45">
            <span class="logo">BERANDA NUSANTARA</span>
        </a>

    </div>

    <div class="hamburger" onclick="toggleMenu()">
        ☰
    </div>


    <nav>
        <a href="index.php?page=homepage">BERANDA</a>
        <div class="nav-dropdown">
            <a class="dropdown-btn">KEBUDAYAAN</a>
            <div class="dropdown-menu">
                <a href="index.php?page=listcard&kategori=lagu">Lagu</a>
                <a href="index.php?page=listcard&kategori=alat musik">Alat Musik</a>
                <a href="index.php?page=listcard&kategori=batik">Motif Kain</a>
                <a href="index.php?page=listcard&kategori=senjata alat perang">Alat Perang</a>
                <a href="index.php?page=listcard&kategori=pakaian tradisional">Pakaian Tradisional</a>
                <a href="index.php?page=listcard&kategori=seni pertunjukan drama">Seni Pertunjukan</a>
                <a href="index.php?page=listcard&kategori=tarian">Tarian</a>
            </div>
        </div>


        <a href="index.php?page=kontak">KONTAK</a>
        <a href="index.php?page=dashboard#peta">PETA BUDAYA</a>
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="../loginuser.php">LOGIN</a>
        <?php endif; ?>


    </nav>

    <div class="search-icon">
        <div class="search-nav">
            <form action="upload.php" method="GET">
                <div>
                    <input type="text" name="search" id="search" placeholder="Cari budaya atau daerah"
                        autocomplete="off">
                    <div id="suggestions" class="suggestions"></div>
                </div>

                <button type="submit">Search</button>
            </form>
        </div>

        <?php if (isset($_SESSION['user'])): ?>

            <div class="user-menu">

                <div class="profile-btn" onclick="toggleProfileMenu()">
                    <img src="../asset/profile/<?= $_SESSION['user']['profile']; ?>">
                </div>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="index.php?page=profile">
                        <img src="../asset/profile/<?= $_SESSION['user']['profile']; ?>">
                        Profile
                    </a>
                    <a href="logout.php" class="logout">
                        <img src="../asset/icon/logout.png">Logout
                    </a>
                </div>

            </div>

        <?php endif; ?>
    </div>


</header>