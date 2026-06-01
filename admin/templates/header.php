<html>

<head>
    <title>Panel Admin</title>
</head>

<link rel="website icon" type="png" href="../asset/icon/logo.png">
<link rel="stylesheet" href="../css/edit.css">
<link rel="stylesheet" href="../css/kelolapeta.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>


:root {
    --primary: #31326F;
    --secondary: #4244DB;
    --accent: #4F48EC;
    --light: #F1F1FF;
    --gray: #F8F9FF;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,
html {
    flex: 1;
    font-family: 'Poppins', sans-serif;
    background: var(--light);
    color: #333;
}



@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}



.layout {
    display: flex;
    min-height: 100vh;
}

.page {
    animation: fadeIn 0.4s ease forwards;
}

.main-content {
    margin-left: 240px;
    flex: 1;
    padding: 30px 40px;
    background: var(--light);
}



.aside {
    width: 230px;
    background: linear-gradient(135deg, #31326F, #4244DB);
    padding: 25px 15px;
    height: 100%;
    position: fixed;
    box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
    overflow-y: auto;
    z-index: 100;
    display: flex;
    flex-direction: column;
}

.asidelogo {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 15px;
    margin-bottom: 20px;
}

.asidelogo img {
    width: 35px;
    height: 45px;
    object-fit: contain;
}

.asidelogo h1 {
    font-size: 20px;
    font-weight: 700;
    color: var(--light);
}

.asidelogo p {
    font-size: 12px;
    color: var(--gray);
    margin-top: -4px;
}


.nav {
    position: relative;
    display: flex;
    
    align-items: center;
    gap: 18px;
    padding: 14px 18px;
    margin: 8px 10px;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav a {
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    transition: 0.3s;
}

.nav img {
    width: 20px;
    height: 20px;
    opacity: 0.75;
    transition: 0.3s;
    filter: invert(80%) sepia(0%) saturate(0%) hue-rotate(180deg) brightness(100%) contrast(90%);
}

.nav:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateX(6px);
}

.nav:hover a,
.nav:hover img {
    opacity: 1;
    color: white;
}

.nav.active {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.nav.active::before {
    content: "";
    position: absolute;
    left: -10px;
    top: 8px;
    width: 4px;
    height: 70%;
    border-radius: 20px;
    background: white;
}

.nav.active a {
    color: white;
    font-weight: 600;
}

.nav.active img {
    opacity: 1;
    filter: brightness(0) invert(1);
}

.logout {
    color: var(--light);
    background-color: #B3264A;
    position: relative;
    padding: 14px 18px;
    margin: 8px 10px;
    border-radius: 14px;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    margin-top: auto;
}

.logout:hover {
    background-color: #dc1449;
}

.logout a {
    color: var(--light);
    text-decoration: none;
}


.page-header {
    margin-bottom: 35px;
}

.page-header h1 {
    font-size: 32px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 6px;
}

.page-header p {
    color: #666;
    font-size: 16px;
}

.page-headerp h1 {
    font-size: 20px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 14px;
    margin-top: 6px;
}



.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.stat-card {
    width: 100%;
    height: 70px;
    background: white;
    padding: 15px 25px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

.stat-card p {
    font-size: 14.5px;
    color: #666;
    margin-bottom: 8px;
}

.stat-card h2 {
    font-size: 20px;
    font-weight: 700;
    color: #222;
}

.chart-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 40px;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    width: 600px;
}

.cardpop {
    background: white;
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    overflow: hidden;
}



.container-search {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.search input[type='text'] {
    width: 290px;
    height: 35px;
    padding: 16px 20px 16px 13px;
    border: 1px solid #ddd;
    border-radius: 15px;
    outline: none;
    font-size: 15px;
    margin-bottom: 15px;
    transition: all 0.3s;
}

.search input:focus {
    border-color: #4244DB;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(66, 68, 219, 0.1);
}

.search select {
    border-color: 1px #4244DB;
    background: #fff;
    outline: none;
    border-radius: 12px;
    width: 180px;
    height: 35px;
    padding: 0px 0px 0px 13px;
    box-shadow: 0 0 0 4px rgba(66, 68, 219, 0.1);
}

.search button {
    background: #31326F;
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    width: 80px;
    height: 35px;
}

.search img {
    width: 24px;
    height: auto;
    position: relative;
    top: 6px;
    opacity: 1;
    filter: invert(17%) sepia(91%) saturate(7481%) hue-rotate(1deg) brightness(98%) contrast(119%);
}



.populer table {
    font-size: 15px;
    font-weight: 500;
    table-layout: fixed;
    border-collapse: collapse;
    border-radius: 18px;
    overflow: hidden;
}


.populer2 {
    background: #fff;
    padding: 22px;
    border-radius: 28px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
}

/* TABLE */
.populer2 table {
    width: 100%;
    table-layout: fixed;
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
}

/* CELL */
.populer2 th,
.populer2 td {
    padding: 18px 14px;
    text-align: center;
    overflow: hidden;
    word-wrap: break-word;
    font-size: 14px;
}

/* HEADER */
.populer2 th {
    background: #E7E8F3;
    color: #2F347D;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* HEADER RADIUS */
.populer2 tr:first-child th:first-child {
    border-top-left-radius: 18px;
}

.populer2 tr:first-child th:last-child {
    border-top-right-radius: 18px;
}

/* BODY */
.populer2 td {
    background: white;
    color: #444;
    border-bottom: 1px solid #f0f0f0;
    font-weight: 500;
}

/* HOVER */
.populer2 tbody tr:hover td {
    background-color: #f8f9ff;
    transition: 0.2s ease;
}

/* IMAGE */
.populer2 img {
    width: 90px;
    height: 65px;
    object-fit: cover;
    border-radius: 10px;
}

/* TITLE */
.populer2 p,
.populer p {
    font-size: 17px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 12px;
}

/* INPUT */
.populer2 input {
    width: 100%;
    height: 48px;

    border: 2px solid #dcdcdc;
    border-radius: 14px;

    padding: 0 16px;

    outline: none;

    font-size: 14px;
    font-weight: 500;

    transition: 0.2s;
}

.populer2 input:focus {
    border-color: var(--primary);
}

/* BUTTON */


.populer2 button:hover {
    transform: translateY(-1px);
    opacity: 0.95;
}

.col-no {
    width: 60px;
}

.col-email {
    width: 180px;
}
.col-email {
    width: 300px;
}

.col-judul {
    width: 120px;
}
.col-judulper {
    width: 180px;
}

.col-kategori {
    width: 200px;
}

.col-content {
    width: 300px;
}
.col-contentart {
    width: 200px;
}

.col-gambar {
    width: 80px;
}
.col-gambarper {
    width: 120px;
}

.col-gambarp {
    width: 100px;
}

.col-tanggal {
    width: 120px;
}
.col-tanggalart {
    width: 100px;
}

.col-action {
    width: 100px;
}
.col-actionper {
    width: 100px;
}


.col-view {
    width: 150px;
}

.col-viewp {
    width: 100px;
}

.col-actionp {
    width: 100px;
}

.col-actiondftr {
    width: 200px;
}


.populer th,
.populer2 th {
    color: #2F347D;
}

.populer tr {
    border-bottom: 1px solid #d5d5d5;
}

.populer td:hover,
.populer2 td:hover {
    background-color: #f8f9ff;
}
.catatan {
    background-color: white;
    border-radius: 18px;
    padding: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.catatan table {
    font-size: 14px;
    font-weight: 500;
    width: 100%;
    table-layout: fixed;

    border-collapse: separate;
    border-spacing: 0;

    border-radius: 14px;
    overflow: hidden;
}

.catatan a {
    font-size: 15px;
    font-weight: 500;
    width: 100%;
    text-decoration: none;
    color: #333;
    display: block;
}


.catatan th {
    background: #f3f4ff;
    color: #1f2a6b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;

    padding: 14px;
    border: none;
}


.catatan td {
    padding: 14px;
    text-align: center;
    color: #333;
    border: none;
}

.catatan tr {
    border: none;
}

.catatan tr:hover td {
    background-color: #f8f9ff;
    transition: 0.2s ease;
}

.catatan form {
    display: flex;
    flex-direction: row;
    gap: 10px;
    padding: 10px;
}


.catatan input[type="text"] {
    width: 100%;
    height: 38px;
    padding: 10px 14px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    outline: none;
    transition: 0.2s;
}

.catatan input[type="text"]:focus {
    border-color: #31326F;
    box-shadow: 0 0 0 3px rgba(49, 50, 111, 0.15);
}


.catatan input[type="submit"] {
    background-color: #31326F;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px;
    cursor: pointer;
    transition: 0.3s;
    height: 38px;
    width: fit-content;
}

.catatan input[type="submit"]:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.tambah-btn {
    background: #31326F;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 12px;
    cursor: pointer;
    margin-top: 15px;
    margin-bottom: 30px;
    width: 200px;
    height: 40px;
    transition: all 0.3s;
}

.tambah-btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}
.form-kelola {
    background: white;
    padding: 32px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    margin-bottom: 30px;
    display: none;
}

.form-kelola h3 {
    margin: 20px 0 10px;
    color: var(--primary);
    font-weight: 600;
}

.form-kelola input,
.form-kelola textarea {
    width: 100%;
    padding: 14px 18px;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    font-size: 15.5px;
    transition: all 0.3s;
}

.form-kelola input {
    height: 30px;
}

.form-kelola textarea,
.form-kelola input {
    font-family: 'Poppins', sans-serif;
}

.form-kelola input:focus,
.form-kelola textarea:focus {
    border-color: var(--secondary);
    box-shadow: 0 0 0 4px rgba(66, 68, 219, 0.1);
    outline: none;
}

.form-kelola button {
    background: #31326F;
    color: white;
    padding: 14px 32px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    margin-top: 15px;
    transition: all 0.3s;
}

.form-kelola input[type="file"] {
    width: auto;
    border: none;
    padding: 0;
    margin-top: 12px;
}

.form-kelola button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(66, 68, 219, 0.3);
}

.form-kelola label {
    background: var(--primary);
    color: white;
    padding: 14px 24px;
    border-radius: 12px;
    cursor: pointer;
    display: inline-block;
}

.kategori select {
    border-color: 1px #4244DB;
    background: #fff;
    outline: none;
    border-radius: 12px;
    width: 180px;
    height: 35px;
    padding: 0px 0px 0px 13px;
    box-shadow: 0 0 0 4px rgba(66, 68, 219, 0.1);
}




.pagination {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.pagination a {
    padding: 8px 14px;
    background: white;
    border-radius: 8px;
    text-decoration: none;
    color: #4244DB;
    font-weight: 600;
    border: 1px solid #ddd;
    transition: 0.3s;
}

.pagination a:hover {
    background-color: var(--primary);
    color: white;
}

.pagination a.active {
    background-color: var(--primary);
    color: white;
}




.success {
    position: fixed;
    top: 80px;
    left: 50%;
    transform: translateX(-50%);
    background: #d4edda;
    color: #155724;
    padding: 15px 25px;
    border-radius: 10px;
    font-weight: 500;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}


.status {
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13.5px;
    font-weight: 600;
    text-align: center;
    display: inline-block;
    min-width: 85px;
}

.status.pending {
    background: #fff3cd;
    color: #856404;
}

.status.proses {
    background: #cce5ff;
    color: #004085;
}

.status.selesai {
    background: #d4edda;
    color: #155724;
}




.action-btn {
    padding: 7px 15px;
    border: none;
    border-radius: 8px;
    font-size: 13.5px;
    font-weight: 600;
    cursor: pointer;
    margin-right: 6px;
}

.column-button {
    display: flex;
    flex-direction: column;
    gap: 5px;
    justify-content: center;
    align-items: center;
}

.btn-proses {
    background: #4479AF;
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: #deb22e;
    color: white;
    text-decoration: none;
    width: 67px;

}

.btn-selesai {
    background: #28a745;
    color: white;
}

.btn-hapus {
    background: #dc3545;
    color: white;
}




.detail-page {
    background: #F1F1FF;
    min-height: 100vh;
    padding: 120px 30px 50px;
}

.detail-card {
    max-width: 1000px;
    margin: auto;
    background: white;
    border-radius: 24px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.detail-header {
    display: flex;
    gap: 30px;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
}

.detail-image {
    width: 280px;
    height: 220px;
    object-fit: cover;
    border-radius: 20px;
}

.detail-info {
    flex: 1;
}

.detail-category {
    display: inline-block;
    background: #d7c4ff;
    color: #5a3ef7;
    padding: 8px 16px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 18px;
}

.detail-title {
    font-size: 38px;
    color: #31326F;
    line-height: 1.4;
}

.detail-content p {
    font-size: 17px;
    line-height: 2;
    color: #444;
    margin-bottom: 25px;
    text-align: justify;
}


.listbudaya {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    flex-wrap: wrap;
    width: 100%;
    align-items: flex-start;
    gap: 20.1px;
    margin-top: 30px;
    padding: 0px 0px;
}

.listcard {
    background-color: #FCF9FD;
    color: #383838;
    border-radius: 20px;
    width: 255px;
    height: 370px;
    font-weight: 600;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    padding: 10px 10px;
    justify-content: space-between;
}

.listcard img {
    width: 100%;
    height: 149.64px;
    margin-bottom: 10px;
    border-radius: 15px;
}

.listcard span {
    display: inline-block;
    background-color: #d7c4ff;
    color: #5a3ef7;
    font-size: 15px;
    font-weight: bold;
    padding: 4px 8px;
    border-radius: 8px;
    margin-bottom: 10px;
    width: fit-content;
    text-align: center;
}

.listcard h2 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 5px;
}

.listcard p {
    font-size: 16px;
    font-weight: 600;
}

.listcard button {
    background-color: #5a3ef7;
    font-size: 14px;
    font-weight: 600;
    width: 125px;
    height: 30px;
    border: 0px;
    border-radius: 10px;
    color: #FFFFFF;
    margin-top: 50px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: auto;
}

.laporan-table {
    background: #fff;
    padding: 22px;
    border-radius: 28px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.laporan-table table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    table-layout: fixed;
    font-size: 14px;
}

/* HEADER */
.laporan-table thead {
    background: transparent;
}

/* HEADER & TD */
.laporan-table th,
.laporan-table td {
    padding: 18px 14px;
    text-align: center;
    overflow: hidden;
    word-wrap: break-word;
}

/* HEADER STYLE */
.laporan-table th {
    background: #E7E8F3;
    color: #2F347D;

    font-size: 14px;
    font-weight: 700;

    letter-spacing: 1px;
    text-transform: uppercase;
}

/* HEADER RADIUS */
.laporan-table tr:first-child th:first-child {
    border-top-left-radius: 18px;
}

.laporan-table tr:first-child th:last-child {
    border-top-right-radius: 18px;
}

/* BODY */
.laporan-table td {
    background: white;
    color: #444;

    border-bottom: 1px solid #f0f0f0;

    vertical-align: top;
    font-weight: 500;
}

/* HOVER */
.laporan-table tbody tr:hover td {
    background: #f8f9ff;
    transition: 0.2s ease;
}

/* EMAIL */
.email-col {
    width: 200px;
    font-weight: 500;
    color: #333;
}

/* LAPORAN */
.laporan-col {
    width: 420px;
    text-align: left;
    line-height: 1.7;
}

/* STATUS */
.status {
    padding: 6px 14px;
    border-radius: 20px;

    font-size: 13px;
    font-weight: 600;

    display: inline-block;
}

/* BUTTON */
.action-btn {
    padding: 7px 14px;
    border: none;
    border-radius: 8px;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;
    margin: 3px;

    transition: 0.3s;
}

.action-btn:hover {
    transform: translateY(-2px);
}
@media (max-width: 992px) {

    .chart-container {
        grid-template-columns: 1fr;
    }

    .aside {
        width: 260px;
    }

    .main-content {
        margin-left: 260px;
        padding: 20px;
    }
}
</style>

<body>
    <div class="layout">