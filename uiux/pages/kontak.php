<?php
session_start();
$id =  $_SESSION['user']['id'];
$stmt = $conn->prepare("SELECT * FROM tb_akun WHERE id = ?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

?>
    <section class="kontak" id="kontak">
        <div class="contact-box">
            <h2>Hubungi Kami</h2>
            <div class="info">
                <p><b>TELEPON:</b> +62 882-3576-541</p>
                <p><b>EMAIL</b><b class="spasiemail">:</b> <a href="mailto:dimasprayoga19345@gmail.com">dimasprayoga19345@gmail.com</a></p>
                <p><b>ALAMAT</b><b class="spasialamat">:</b> Jl. Tirtagangga No.7...</p>
            </div>
            <form action="../admin/upload.php" method="post">
                <textarea placeholder="Tulis pesan Anda..." name="pesan"></textarea>
                <input type="email" placeholder="Email Anda"  name="email" value="<?php echo $data['email']?>" readonly>
                <button type="submit" name="kirimpesan">KIRIM</button>
            </form>
        </div>
    </section>
  
     
