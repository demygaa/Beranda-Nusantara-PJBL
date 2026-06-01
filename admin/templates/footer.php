</div>
</div>


<script>

    const tombol = document.getElementById("drop");
    const form = document.querySelector(".form-kelola");

    if (tombol && form) {

        tombol.onclick = function () {


            if (form.style.display === "block") {
                form.style.display = "none";
            } else {
                form.style.display = "block";
            }

        }

    }

    const button = document.getElementById("droplokasi");
    const porm = document.querySelector(".form-peta");

    if (button && porm) {

        button.onclick = function () {


            if (porm.style.display === "block") {
                porm.style.display = "none";
            } else {
                porm.style.display = "block";
            }

        }

    }



    const ctxLine = document.getElementById('simpleChart').getContext('2d');

    const labels = [];
    const usersData = [];

    const chart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pengguna Aktif',
                data: usersData,
                borderColor: '#4244DB',
                backgroundColor: 'rgba(66, 68, 219, 0.15)',
                tension: 0.4,
                borderWidth: 3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    function updateData() {

        fetch("jumlah_aktif.php")
            .then(res => res.json())
            .then(data => {

                document.getElementById("aktif").innerHTML =
                    data.total ;

                const now = new Date().toLocaleTimeString();

                labels.push(now);
                usersData.push(data.total);

                if (labels.length > 5) {
                    labels.shift();
                    usersData.shift();
                }

                chart.update();

            });

    }

    updateData();

    setInterval(updateData, 3000);






</script>

<script>
    function loadAktif() {

        fetch("jumlah_aktif.php")
            .then(res => res.json())
            .then(data => {

                document.getElementById("aktif").innerHTML =
                    data.total;

            });

    }

    loadAktif();

    setInterval(loadAktif, 3000);
</script>
<script src="../js/notif.js"></script>
<script src="../js/peta.js"></script>

</body>


</html>