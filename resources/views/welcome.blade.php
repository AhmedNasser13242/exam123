<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    - primary meta tags
  -->
    <title>نظام اختبار المعلمين</title>
    <meta name="title" content="Wren - Perosonal Blog Website">
    <meta name="description" content="This is a blog html template made by codewithsadee">

    <!--
    - favicon
  -->
    <link rel="icon" href="{{ asset('adminbackend/assets/images/favicon-32x32.png') }}" type="image/png" />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--
    - preload images
  -->
    <link rel="preload" as="image" href="./assets/images/hero-banner.png">
    <link rel="preload" as="image" href="./assets/images/pattern-2.svg">
    <link rel="preload" as="image" href="./assets/images/pattern-3.svg">

</head>

<body id="top">

    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="#" class="logo">
                {{-- <img src="./assets/images/logo.svg" width="119" height="37" alt="Wren logo"> --}}
            </a>

            <nav class="navbar" data-navbar>

                <div class="navbar-top">
                    <a href="#" class="logo">
                        {{-- <img src="./assets/images/logo.svg" width="119" height="37" alt="Wren logo"> --}}
                    </a>

                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">

                    <li>
                        <a href="#home" class="navbar-link hover-1" data-nav-toggler>رئيسية</a>
                    </li>

                    <li>
                        <a href="#topics" class="navbar-link hover-1" data-nav-toggler>ماذا نقدم</a>
                    </li>

                    <li>
                        <a href="#featured" class="navbar-link hover-1" data-nav-toggler>الاشتراكات</a>
                    </li>

                    <li>
                        <a href="/become/vendor" class="navbar-link hover-1" data-nav-toggler>الستجيل كمعلم</a>
                    </li>


                </ul>

                <div class="navbar-bottom">


                </div>

                <p class="copyright-text">
                    Copyright 2023 © Ahmed Nasser
                </p>

            </nav>


            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>

        </div>
    </header>





    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="hero" id="home" aria-label="home">
                <div class="container">

                    <div class="hero-content">


                        <h1 class="headline headline-1 section-title">
                            مرحبا بك<span class="span">في نظام اختبار المعلمين</span>
                        </h1>

                        <p class="hero-text">
                            نظام متكامل لانشاء اختبارك للطلاب بكامل الامكانيات الحديثة.
                        </p>



                    </div>

                    <div class="hero-banner">
                        {{--
                        <img src="./assets/images/hero-banner.png" width="327" height="490" alt="Wren Clark"
                            class="w-100"> --}}

                        <img src="./assets/images/pattern-2.svg" width="27" height="26" alt="shape"
                            class="shape shape-1">

                        <img src="./assets/images/pattern-3.svg" width="27" height="26" alt="shape"
                            class="shape shape-2">

                    </div>

                    <img src="./assets/images/shadow-1.svg" width="500" height="800" alt="" class="hero-bg hero-bg-1">

                    <img src="./assets/images/shadow-2.svg" width="500" height="500" alt="" class="hero-bg hero-bg-2">

                </div>
            </section>





            <!--
        - #TOPICS
      -->

            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">

                    <div class="card topic-card">

                        <div class="card-content">

                            <h2 class="headline headline-2 section-title card-title" id="topic-label">
                                لماذا نحن ؟
                            </h2>

                            <p class="card-text">
                                لاننا لدينا جميع المميزات كما اننا نقدم الكثير من الخدمات مثل
                            </p>

                            <div class="btn-group">
                                <button class="btn-icon" aria-label="previous" data-slider-prev>
                                    <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="btn-icon" aria-label="next" data-slider-next>
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </button>
                            </div>

                        </div>

                        <div class="slider" data-slider>
                            <ul class="slider-list" data-slider-container>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">

                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/Stairs_University_High_School_Los_Angeles,_California_02.jpg"
                                                width="507" height="618" loading="lazy" alt="Sport" class="img-cover">
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">اضافة الاسالة</span>

                                            <p class="slider-subtitle">يمكنك اضافة جميع انواع الااسلة التي تريد اختيارية
                                                واكمل وصح وخط...أ</p>
                                        </div>

                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">

                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/20221110_085746.jpg" width="507" height="618"
                                                loading="lazy" alt="Travel" class="img-cover">
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">متابعة جميع اختباراتك</span>

                                            <p class="slider-subtitle">يمكنك رؤية اختبارات في اي وقت ومسح الاسالة التي
                                                تريد وانشاء ما لا نهاية من الاختبارات المميزة</p>
                                        </div>

                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">

                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/school_309241295.jpg" width="507" height="618"
                                                loading="lazy" alt="Design" class="img-cover">
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">الرد خلال 24/7</span>

                                            <p class="slider-subtitle">خدمة عملاء اربعة وعشرين ساعة </p>
                                        </div>

                                    </a>
                                </li>



                            </ul>
                        </div>

                    </div>

                </div>
            </section>





            <!--
        - #FEATURED POST
      -->

            <section class="section feature" aria-label="feature" id="featured">
                <div class="container">

                    <h2 class="headline headline-2 section-title">
                        <span class="span">رسوم الاختبارات</span>
                    </h2>

                    <p class="section-text">
                        سعر الاختبار
                    </p>

                    <ul class="feature-list">

                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/download (1).jpg" width="1602" height="903" loading="lazy"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">

                                        </div>

                                        <div class="wrapper">

                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            اقرأجميع مميزاتنا عن انشاء الاختبارات قبل الدفع والتاكد منها جيدا.
                                        </a>
                                    </h3>



                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/download.jpg" width="1602" height="903" loading="lazy"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">

                                        </div>

                                        <div class="wrapper">

                                        </div>
                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            يمكنك انشاء الاختبار الذي تريد قبل الدفع وبعد اكماله التكلفة ستكون 10 ريال
                                        </a>
                                    </h3>


                                </div>
                        </li>
                        {{--
                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-3.png" width="1602" height="903" loading="lazy"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">6 mins read</span>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>

                                    <div class="card-wrapper">

                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>

                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>

                                        <a href="#" class="card-btn">Read more</a>

                                    </div>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-4.png" width="1602" height="903" loading="lazy"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">6 mins read</span>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>

                                    <div class="card-wrapper">

                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>

                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>

                                        <a href="#" class="card-btn">Read more</a>

                                    </div>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-5.png" width="1602" height="903" loading="lazy"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">6 mins read</span>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>

                                    <div class="card-wrapper">

                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>

                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>

                                        <a href="#" class="card-btn">Read more</a>

                                    </div>

                                </div>

                            </div>
                        </li> --}}

                    </ul>

                    <a href="#" class="btn btn-secondary">
                        <span class="span">الانتقال الي التسجيل</span>

                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>

                </div>

                <img src="./assets/images/shadow-3.svg" width="500" height="1500" loading="lazy" alt=""
                    class="feature-bg">

            </section>







            <!--
    - #FOOTER
  -->

            <footer>
                <div class="container">

                    <div class="card footer">

                        <div class="section footer-top">

                            <div class="footer-brand">

                                <a href="#" class="logo">
                                    <img src="./assets/images/logo.svg" width="119" height="37" loading="lazy"
                                        alt="Wren logo">
                                </a>

                                <p class="footer-text">
                                    When an unknown prnoto sans took a galley and scrambled it to make specimen book not
                                    only
                                    five When an
                                    unknown prnoto sans took a galley and scrambled it to five centurie.
                                </p>

                                <p class="footer-list-title">Address</p>

                                <address class="footer-text address">
                                    123 Main Street <br>
                                    New York, NY 10001
                                </address>

                            </div>

                            <div class="footer-list">

                                <p class="footer-list-title">Categories</p>

                                <ul>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Action</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Business</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Adventure</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Canada</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">America</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Curiosity</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Animal</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Dental</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Biology</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Design</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Breakfast</a>
                                    </li>

                                    <li>
                                        <a href="#" class="footer-link hover-2">Dessert</a>
                                    </li>

                                </ul>

                            </div>

                            <div class="footer-list">

                                <p class="footer-list-title">Newsletter</p>

                                <p class="footer-text">
                                    Sign up to be first to receive the latest stories inspiring us, case studies, and
                                    industry
                                    news.
                                </p>

                                <div class="input-wrapper">
                                    <input type="text" name="name" placeholder="Your name" required class="input-field"
                                        autocomplete="off">

                                    <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <div class="input-wrapper">
                                    <input type="email" name="email_address" placeholder="Emaill address" required
                                        class="input-field" autocomplete="off">

                                    <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                                </div>

                                <a href="#" class="btn btn-primary">
                                    <span class="span">Subscribe</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                            </div>

                        </div>

                        <div class="footer-bottom">

                            <p class="copyright">
                                &copy; Developed by <a href="#" class="copyright-link">codewithsadee.</a>
                            </p>

                            <ul class="social-list">

                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-twitter"></ion-icon>

                                        <span class="span">Twitter</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-linkedin"></ion-icon>

                                        <span class="span">LinkedIn</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-instagram"></ion-icon>

                                        <span class="span">Instagram</span>
                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>
            </footer>





            <!--
    - #BACK TO TOP
  -->

            <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
                <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
            </a>





            <!--
    - custom js link
  -->
            <script src="./assets/js/script.js"></script>

            <!--
    - ionicon link
  -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>