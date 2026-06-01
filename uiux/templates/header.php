<?php ob_start(); ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Nusantara</title>

</head>
<link rel="website icon" type="png" href="../asset/icon/logo.png">
<link rel="stylesheet" href="../css/user.css">
<link rel="stylesheet" href="../css/search.css">
<link rel="stylesheet" href="../css/profile.css">
<link rel="stylesheet" href="../css/mobile.css">


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
        background-color: #F1F1FF;
    }

    body::-webkit-scrollbar {
        display: none;
    }

    header {
        position: fixed;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 60px;
        z-index: 10;
        transition: 0.3s;
        background: #31326F;

    }

    header.scrolled {
        background: #31326F;
        backdrop-filter: blur(5px);
        opacity: 1;
    }

    header.homepage {
        background: transparent;
    }

    header.homepage.scrolled {
        background: #31326F;
        backdrop-filter: blur(5px);
    }

    header .logo {
        display: flex;
        align-items: center;
        color: white;
        font-weight: bold;
        font-size: 18px;
        letter-spacing: 1px;
    }


    .logo-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }


    nav a {
        color: white;
        text-decoration: none;
        margin-left: 30px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
    }

    nav a:hover {
        text-decoration: underline;
    }

    .nav-dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        position: absolute;
        top: 45px;
        left: 0;
        background: #31326F;
        backdrop-filter: blur(5px);
        padding: 15px 20px;
        border-radius: 10px;
        min-width: 180px;
        display: none;
        flex-direction: column;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .dropdown-menu a {
        color: white;
        padding: 8px 0;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .dropdown-menu a:hover {
        text-decoration: underline;
    }

    .nav-dropdown.active .dropdown-menu {
        display: flex;
    }

    .search-icon {
        display: flex;
        flex-direction: row;
        gap: 15px;
        align-items: center;
    }

    .search-nav {
        position: relative;
        z-index: 1000;
    }

    .search-nav form {
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
    }

    .search-nav input[type="text"] {
        width: 230px;
        height: 30px;
        border-radius: 12px;
        border: 1px solid transparent;
        padding: 12px 10px;
        outline: none;
        transition: 0.3s;
    }

    .search-nav input[type="text"]:focus {
        border: 1px solid #171ae6;
        border-radius: 12px;
    }

    .search-nav input.has-value:focus {
        border-radius: 12px 12px 0 0;
        border-bottom: 0px;
    }

    .search-nav button {
        background-color: #5a3ef7;
        font-size: 14px;
        font-weight: 600;
        width: 70px;
        height: 30px;
        border: 0px;
        border-radius: 10px;
        color: #FFFFFF;
        cursor: pointer;
    }

    .suggestions {
        position: absolute;
        top: 30px;
        left: 0;
        border: 1px solid #171ae6;

        width: 230px;

        background: white;
        border-radius: 0 0 12px 12px;

        z-index: 9999;
        overflow: hidden;
        font-size: 12px;
    }


    .hero {
        height: 100%;
        background: url('../asset/icon/pjblsection.jpg') no-repeat center center/cover;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        color: white;
        position: relative;
        width: 100%;

    }

    .hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .h1 {
        font-size: 75px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .hero p {
        font-size: 14px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .hero button {
        background-color: #4244DB;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        width: 200px;
        height: 41.5px;
    }



    .section-peta {
        background-color: #F1F1FF;
        color: #222;
        padding: 80px 0px;
        text-align: center;
    }

    .section-peta h2 {
        font-size: 22px;
        margin-bottom: 50px;

    }


    .search-box {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 40px;
        gap: 8px;
    }

    .search-box input {
        width: 300px;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 10px 10px 10px 10px;
        outline: none;
        font-size: 14px;
        font-weight: 400;

    }

    .search-box button {
        background-color: #4244DB;
        border: none;
        color: rgb(242, 237, 237);
        padding: 11px 18px;
        border-radius: 10px 10px 10px 10px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
        width: 80px;
        height: 38px;
    }

    .search-box button:hover {
        background-color: #4244DB;
    }

    .search-box img {
        width: 24px;
        height: auto;
        position: relative;
        top: 6px;
        opacity: 1;
        filter: invert(17%) sepia(91%) saturate(7481%) hue-rotate(1deg) brightness(98%) contrast(119%);
    }

    /* gambar sectionkotak*/
    .sectionkotak {
        width: 450px;
        height: auto;
        object-fit: cover;
    }


    #searchsection {
        scroll-margin-top: 100px;
        scroll-behavior: smooth;
    }

    #ssectionkotak {
        scroll-margin-top: 160px;
        scroll-behavior: smooth;
    }

    #peta {
        scroll-margin-top: 100px;

    }

    .hasil-container {
        background-color: #b2b2ff;
        width: 100%;
        height: auto;
        padding: 20px 60px;
        display: none;
    }

    .hasil-wraper {
        display: flex;

        flex-wrap: wrap;
        flex-direction: row;
        /* grid-template-columns: repeat(auto-fit, minmax(250px, 2fr)); */

        gap: 37.55px;


    }

    .hasil-card {
        background-color: white;
        padding: 10px;
        height: 390px;
        width: 250px;
        border-radius: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .hasil-card img {
        width: 230px;
        height: 180px;
        border-radius: 12px;
    }

    .hasil-card .kategory {
        display: flex;
        background-color: #d7c4ff;
        color: #5a3ef7;
        font-size: 13px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 8px;
        width: fit-content;
        align-self: flex-start;
    }

    .hasil-card h3 {
        display: flex;
        align-self: flex-start;
    }

    .hasil-card h3,
    .hasil-card span {
        margin-top: 10px;
    }

    .hasil-card .wrapbutton {
        display: flex;
        justify-content: flex-end;
    }

    .hasil-card button {
        background-color: #4244DB;
        border: none;
        color: rgb(242, 237, 237);
        padding: 10px 18px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
        width: 80px;
        text-align: center;
    }

    /* Isi konten budaya */
    .content {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 50px;
        flex-wrap: wrap;

    }

    .content img {
        width: 500px;
        border-radius: 20px;
    }

    .list {
        text-align: left;
        max-width: 400px;
    }

    .list h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .list h3 span {
        color: #4cb3aa;
        font-weight: 600;
    }

    .list ul {
        list-style: none;
        padding: 0;
    }

    .list li {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 15px;
    }

    .bold {
        font-weight: 600;
    }

    .list li .icon {
        width: 50px;
        height: 50px;
        background-color: #4FB7B3;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 12px;
        font-size: 16px;
    }

    .iconblue {
        width: 50px;
        height: 50px;
        background-color: #4479B0;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 12px;
        font-size: 16px;
    }

    /*petabudaya*/
    .petabudaya {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 50px;
        margin-left: 42px;
        margin-right: 42px;
        
    }

    .petabudaya .peta {
        width: 100%;
        height: auto;
        border-radius: 12px;
    }

    .map-container {
        position: relative;
        display: inline-block;
    }

    .pin-wrapper {
        position: absolute;
        transform: translate(-50%, -100%);
        cursor: pointer;
        transition: 0.3s;
    }

    .pin {
        width: 35px;
    }

    .pin-wrapper:hover {
        transform: translate(-50%, -100%) scale(1.2);
        filter: drop-shadow(0 0 8px red);
    }

    .active-pin {
        transform: translate(-50%, -100%) scale(1.2);
        filter: drop-shadow(0 0 8px red);
    }

    .tooltip {
        position: absolute;
        bottom: 120%;
        left: 50%;
        transform: translateX(-50%);

        background: #31326F;
        color: white;

        padding: 5px 10px;
        border-radius: 8px;

        font-size: 10px;
        white-space: nowrap;

        opacity: 1;


        transition: 0.3s;
    }

    .popup {
        position: fixed;

        padding: 12px;

        inset: 0;

        padding: 20px;

        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);

        display: none;

        justify-content: center;
        align-items: center;

        z-index: 99999;
    }

    .popup-scroll {
        height: calc(100% - 80px);

        overflow-y: auto;

        padding: 20px 30px;
    }

    .popup-content {
        width: 600px;
        max-width: 100%;

        height: 60vh;

        background: white;

        border-radius: 20px;

        position: relative;

        overflow: hidden;

        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .popup-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 20px 30px;

        border-bottom: 1px solid #ddd;
    }

    #popup-title {
        margin: 0;
    }

    .close-btn {
        position: absolute;

        top: 15px;
        right: 20px;

        width: 35px;
        height: 35px;

        border: none;
        border-radius: 50%;

        background: #4244DB;
        color: white;

        cursor: pointer;

        font-size: 18px;
        font-weight: bold;

        transition: 0.3s;
    }

    .close-btn:hover {
        transform: scale(1.1);
    }

    @keyframes popupMuncul {

        from {
            transform: scale(0.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }

    }

    .card-popup {
        background-color: white;
        width: 100%;
        border-radius: 12px;
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        padding: 4px;
    }

    .card-popup img {
        width: 120px;
        height: auto;
        border-radius: 7px;
        margin-right: 12px;
    }



    .card-popup .button {
        background-color: #5a3ef7;

        font-size: 14px;
        font-weight: 600;

        width: 125px;
        height: 35px;

        border-radius: 10px;

        color: #FFFFFF;

        display: flex;
        justify-content: center;
        align-items: center;

        cursor: pointer;

        margin-left: auto;
        margin-top: auto;


        text-decoration: none;
    }

    .card-popup a {
        text-decoration: none;
        color: white;
    }

    .petabudaya a {
        width: 100%;
        height: 0px;
    }

    .petabudaya h2 {
        font-size: 25px;
        margin-bottom: 30px;
    }

    .caripeta {
        display: flex;
        justify-content: left;
        align-items: left;
        margin-bottom: 25px;
        gap: 8px;
    }

    .caripeta input {
        width: 427px;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 10px 10px 10px 10px;
        outline: none;
        font-size: 14px;
        font-weight: 400;
        margin-left: 27px;
    }

    .caripeta button {
        background-color: #4244DB;
        border: none;
        color: white;
        padding: 11px 18px;
        border-radius: 10px 10px 10px 10px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
    }

    .kunjungan {
        background-color: #DFDFFF;
        border-radius: 16px;
        padding: 40px 20px;
        margin: 90px auto;
        margin-left: 32px;
        margin-right: 32px;
        margin-bottom: 30px;
    }

    .kunjungan h2 {
        color: #404077;
        font-size: 22px;
        margin-bottom: 30px;
        margin-left: 25px;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        flex-direction: row;
    }

    .card {
        background-color: white;
        border-radius: 16px;
        width: 280px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(66, 68, 219, 0.1)
    }

    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        padding: 5px;
        border-radius: 20px;
    }

    .category {
        display: inline-block;
        background-color: #d7c4ff;
        color: #5a3ef7;
        font-size: 15px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 8px;
        margin: 10px;
        width: auto;
        text-align: center;
    }

    .card h3 {
        font-size: 20px;
        margin: 0 12px 8px;
        color: #333;
    }

    .card h5 {
        font-size: 14px;
        color: #555;
        max-width: 270px;
        overflow-wrap: break-word;
        margin: 0px 12px 16px;
        line-height: 1.5;
    }


    /*kunjungan hp*/
    .kunjunganhp {
        background-color: #DFDFFF;
        border-radius: 16px;
        height: auto;
        padding: 30px 20px;
        margin: 10px auto;
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 30px;
        display: none;
    }

    .kunjunganhp h2 {
        color: #404077;
        font-size: 22px;
        margin-bottom: 30px;
        text-align: center;

    }

    .card-containerhp {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        flex-direction: column;

    }

    .cardhp {
        background-color: white;
        border-radius: 16px;
        width: 350px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s ease;
        display: flex;
        flex-direction: row;
        margin: 0 auto 20px auto;
        /* tengah + jarak bawah */

    }

    .columncardhp {
        display: flex;
        flex-direction: column;
    }

    .cardhp img {
        width: 150px;
        height: auto;
        object-fit: cover;
        padding: 5px;
        border-radius: 20px;

    }

    .categoryhp {
        display: inline-block;
        background-color: #d7c4ff;
        color: #5a3ef7;
        font-size: 12px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 8px;
        margin: 10px;
        width: auto;
        text-align: center;

    }

    .cardhp h3 {
        font-size: 18px;
        margin: 0 12px 8px;
        color: #333;

    }

    .cardhp p {
        font-size: 12px;
        color: #555;
        margin: 0px 12px 16px;
        line-height: 1.5;
        text-align: justify;

    }

    .kontak {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 250px;
    }

    .contact-box {
        text-align: center;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 500px;
        height: auto;
        margin-top: -40px;
        margin-bottom: 270px;

    }

    .contact-box h2 {
        margin-bottom: 20px;
        color: #333;
        font-weight: 700;
    }

    .info {
        text-align: left;
        font-size: 14px;
        line-height: 1.8;
        color: #444;
        margin-bottom: 15px;
    }

    .info a {
        color: #007bff;
        text-decoration: none;
    }

    .info a:hover {
        text-decoration: underline;
    }

    .contact-box textarea,
    .contact-box input {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
    }

    .contact-box textarea {
        resize: none;
        height: 80px;
    }

    .contact-box button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 15px;
        width: 100%;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s;
    }

    .contact-box button:hover {
        background-color: #0056b3;
    }

    .image-top {
        width: 400px;
        height: auto;
        margin-bottom: -3px;
    }

    .spasiemail {
        margin-left: 23px;
    }

    .spasialamat {
        margin-left: 9px;
    }

    .detail-container {
        width: 100%;
        max-width: 900px;

        margin: auto;
        padding: 50px 20px;
    }

    .detail-link {
        text-decoration: none;
        color: inherit;

    }

    .detail-content {
        background: white;
        margin-top: 60px;

        padding: 35px;

        border-radius: 18px;
    }



    .detail-category {
        display: inline-block;
        background-color: #d7c4ff;
        color: #5a3ef7;
        font-size: 15px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 8px;
        margin: 10px;
        width: auto;
        text-align: center;
    }



    .detail-title {
        font-size: 46px;
        line-height: 1.3;

        margin-top: 20px;
    }



    .detail-info {
        display: flex;
        gap: 10px;

        color: gray;

        margin: 25px 0 35px;
    }



    .thumbnail {
        width: 100%;
        height: 400px;

        object-fit: cover;

        border-radius: 16px;

        margin-bottom: 35px;
    }



    .detail-content p {
        font-size: 14px;
        line-height: 2;
        margin-bottom: 30px;
    }



    .middle-image {
        margin: 45px 0;
    }


    .middle-image img {
        width: 100%;
        border-radius: 16px;
    }


    .middle-image small {
        display: block;

        margin-top: 10px;

        color: gray;
    }

    .recommend-container {
        width: 100%;
        max-width: 1200px;
        margin: auto;
        padding: 20px 20px 80px;

    }


    .recommend-container h2 {
        margin-bottom: 30px;
    }


    .recommend-wrapper {
        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

        gap: 25px;
    }



    .recommend-card {
        background: white;
        width: 250px;
        height: 340px;

        border-radius: 16px;

        overflow: hidden;

        transition: 0.3s;
        padding: 10px;


    }


    .recommend-card:hover {
        transform: translateY(-10px);

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }


    .recommend-card img {
        width: 100%;
        height: 160px;
        border-radius: 10px;
        object-fit: cover;
        margin-bottom: 10px;
    }


    .recommend-body {
        padding: 0px;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }


    .recommend-body span {
        display: inline-block;
        background-color: #d7c4ff;
        color: #5a3ef7;
        font-size: 12px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 8px;

        width: auto;
        text-align: center;
    }


    .recommend-body h3 {
        margin-top: 12px;
        line-height: 1.5;
    }

    .detail {
        background-color: #5a3ef7;
        font-size: 14px;
        font-weight: 600;
        width: 100px;
        height: 30px;
        border: 0px;
        border-radius: 10px;
        color: #FFFFFF;

        cursor: pointer;

        display: flex;
        justify-content: center;
        align-items: center;

        margin-left: auto;

    }

    .listcard-container {
        display: flex;
        flex-direction: column;
        margin-top: 60px;
        align-items: center;
        margin-bottom: 80px;
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
        padding: 0px 62px;
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

    .listsearch {
        display: flex;
        justify-content: left;
        align-items: left;
        margin-top: 30px;
        gap: 20px;
    }

    .listsearch input {
        width: 250px;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 10px 10px 10px 10px;
        outline: none;
        font-size: 14px;
        font-weight: 400;
        margin-left: 27px;
    }

    .listsearch button {
        background-color: #4244DB;
        border: none;
        color: white;
        padding: 11px 18px;
        border-radius: 10px 10px 10px 10px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
    }

    .hamburger {
        display: none;
        font-size: 28px;
        color: white;
        cursor: pointer;
    }

    footer {
        background: #31326F;
        color: white;
        padding: 60px 20px 30px;

        bottom: 0px;
        z-index: 200;


    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-top {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 40px;
    }

    .footer-col {
        flex: 1;
        min-width: 220px;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .footer-logo img {
        width: 45px;
        height: 55px;
    }

    .footer-logo h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
    }

    .footer-description {
        color: #c0c0ff;
        line-height: 1.7;
        max-width: 320px;
    }

    .footer-col h3 {
        margin-bottom: 20px;
        color: #a0a0ff;
        font-size: 18px;
    }

    .footer-col a {
        color: white;
        text-decoration: none;
        display: block;
        margin-bottom: 12px;
        transition: color 0.3s;
    }

    .footer-col a:hover {
        color: #a0a0ff;
    }

    .social-icons {
        display: flex;
        flex-direction: column;
        gap: 18px;
        margin-bottom: 25px;
    }

    .social-icons a {
        color: white;
        font-size: 17px;
        transition: transform 0.3s;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
    }


    .social-icons a:hover {
        transform: scale(1.1);
        color: #a0a0ff;
    }

    .social-icons img {
        width: 22px;
        height: 22px;
    }

    .navigasi-budaya {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        margin-top: 50px;
        padding-top: 25px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        font-size: 14px;
        color: #b0b0ff;
    }

    .footer-bottom a {
        color: #b0b0ff;
        text-decoration: none;
    }

    .footer-bottom a:hover {
        color: white;
    }

    @media screen and (max-width:600px) {
        .hamburger {
            display: flex !important;
            background: red;
        }
</style>

<body>