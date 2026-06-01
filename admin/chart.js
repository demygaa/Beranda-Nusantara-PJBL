document.querySelectorAll('.nav').forEach(nav => {
    nav.addEventListener('click', () => {
        document.querySelectorAll('.nav').forEach(n => n.classList.remove('active'));
        nav.classList.add('active');

        document.querySelectorAll('.page').forEach(page => page.classList.remove('active'));
        const pageId = nav.getAttribute('data-page');
        document.getElementById(pageId).classList.add('active');
    });
});

const ctxLine = document.getElementById('simpleChart').getContext('2d');
new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
        datasets: [{
            label: 'Pengguna Aktif',
            data: [12, 19, 35, 28, 42, 31, 45],
            borderColor: '#4244DB',
            backgroundColor: 'rgba(66, 68, 219, 0.15)',
            tension: 0.4,
            borderWidth: 3
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});

const ctxDoughnut = document.getElementById('chartBar').getContext('2d');
new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
        labels: ['Desktop', 'Mobile'],
        datasets: [{
            data: [68, 32],
            backgroundColor: ['#4F48EC', '#05C0D1']
        }]
    },
    options: {
        cutout: '72%',
        responsive: true
    }
});