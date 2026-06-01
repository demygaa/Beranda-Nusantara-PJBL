<div class="profile-sidebar">

    <h2>Profile</h2>

    <a href="index.php?page=profile&tab=editProfile" class="sidebar-menu <?php echo ($tab == 'editProfile') ? 'active' : ''?>">
        <img src="../asset/icon/user.png">
        <span>Edit Profile</span>
    </a>

    <a href="index.php?page=profile&tab=artikel" class="sidebar-menu <?php echo ($tab == 'artikel'  || $tab == 'detail') ? 'active' : ''?>">
        <img src="../asset/icon/news.png">
        <span>Artikel</span>
    </a>

    <a href="index.php?page=profile&tab=notifikasi"class="sidebar-menu <?php echo ($tab == 'notifikasi') ? 'active' : ''?>">
        <img src="../asset/icon/ringing.png">
        <span>Notifikasi</span>
    </a>

    <a href="index.php?page=profile&tab=keamanan" class="sidebar-menu <?php echo ($tab == 'keamanan' || $tab == 'kirimotp' || $tab == 'verifikasiotp' || $tab == 'resetpassword' || $tab == 'lupapassword') ? 'active' : ''?>">
        <img src="../asset/icon/lock.png">
        <span>Keamanan</span>
    </a>

</div>