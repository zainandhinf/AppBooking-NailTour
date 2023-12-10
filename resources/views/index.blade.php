<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NailTour | {{ $title }}</title>
    {{-- <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/user/css/style.css">
    <link rel="stylesheet" href="../assets/user/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/">
    <link rel="stylesheet" href="../assets/bootstrap/css/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{-- JQuery --}}
    <script src="assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="../assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/jquery/jquery-3.7.0.js"></script>
    <script src="../assets/jquery/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script> --}}
    {{-- end JQuery --}}

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    {{-- end Bootstrap --}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.min.css">
    {{-- end Font Awesome --}}

    {{-- DataTables --}}
    <link rel="stylesheet" href="assets/DataTables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" href="../assets/DataTables/dataTables.bootstrap5.min.css">
    <script src="assets/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/DataTables/dataTables.bootstrap5.min.js"></script>
    {{-- <link href="assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link href="../assets/DataTables/DataTables-1.13.6/css/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> --}}
    {{-- end DataTables --}}

    {{-- Select2 --}}
    <link href="assets/select2/select2.min.css" rel="stylesheet" />
    <link href="../assets/select2/select2.min.css" rel="stylesheet" />
    <script src="assets/select2/select2.min.js"></script>
    <script src="../assets/select2/select2.min.js"></script>
    {{-- <link rel="stylesheet" href="assets/dselect-main/source/css/dselect.scss"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- end Select2 --}}

    {{-- Dropzone --}}
    <script src="assets/dropzone/min/dropzone.min.js"></script>
    <script src="../assets/dropzone/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="assets/dropzone/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/dropzone/min/dropzone.min.css" type="text/css" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"
    integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    {{-- end Dropzone --}}

    {{-- Style --}}
    <link rel="stylesheet" href="assets/user/css/style.css">
    <link rel="stylesheet" href="../assets/user/css/style.css">
    {{-- end Style --}}
</head>

<body>

    <!-- navbar sectio  ns starts  -->
    <header class="header z-1">
        <div class="logo">
            {{-- <img src="assets/user/images/logo-bookmark.svg" alt="logo-bookmark"> --}}
            <h1>NailTour</h1>
        </div>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            {{-- <a href="/catalogs">Catalogs</a> --}}
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="/login" class="btn">Login</a>
            {{-- <a href="/bookings" style="font-size: 20px;" class="booking"><i class="fa-solid fa-calendar-days"></i></a> --}}

        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>



        {{-- <div style="font-size: 20px;"></i></div> --}}
    </header>
    <!-- navbar sections starts  -->



    <!-- home section stars  -->

    {{-- <section class="home" id="home"> --}}
    {{-- <h1>Ini Home</h1> --}}
    {{-- <div class="content">
            <h1>Simple Bookmark Manager</h1>
            <p>A clean and simple interface to organize your favorite websites. open a browser tab and see your sites
                load instantly. try it for free!!</p>

            <a href="#" class="home-btn">get it on chrome</a>
        </div>


        <div class="image">
            <img src="assets/user/images/illustration-hero.svg" alt="illustration-hero">
        </div> --}}
    {{-- </section> --}}

    <!-- home section ends -->

    <!-- home section stars  -->

    <section class="home" id="home">
        <div class="content">
            <h1>Make Your Tour Schedule</h1>
            <p>An easy and simple website to create your tour schedule. Open the catalog list and create your schedule.
                Try
                it for free!!</p>

            <a href="/catalogs" class="home-btn text-decoration-none">Make A Schedule</a>
        </div>


        <div class="image">
            <img src="assets/user/images/illustration-hero.svg" alt="illustration-hero">
        </div>
    </section>

    <!-- home section ends -->

    <!-- features sectin starts  -->

    <section class="features" id="features">
        <div class="heading">
            <h1>Features</h1>
            <p>Our goal is to make it quick and easy for you to make vacation plans for you. Nailtour provides
                information
                about tourist destinations both domestically and internationally.</p>
        </div>


        <div class="row">
            <!-- 1 Tab  -->
            <div class="image">
                <img src="assets/user/images/illustration-features-tab-1.svg" alt="illustration-features-tab-1">
            </div>


            <div class="content">
                <h1>Make Booking Easier</h1>
                <p>Make your vacation schedule easier with the help of NailTour. With various kinds of existing
                    catalogues.
                </p>
                <a href="/catalogs" class="all-btn text-decoration-none">more info</a>
            </div>

            <!-- 1 Tab  -->

            <!-- 2 Tab  -->
            <div class="content">
                <h1>Intelligent search</h1>
                <p>With the many catalogs available, we will help you find a holiday that suits you in no time. Choose
                    the
                    budget you want.</p>
                <a href="/catalogs" class="all-btn text-decoration-none">more info</a>
            </div>

            <div class="image">
                <img src="assets/user/images/illustration-features-tab-2.svg" alt="illustration-features-tab-2">
            </div>

            <!-- 2 Tab  -->

            {{-- <div class="image">
                <img src="assets/user/images/illustration-features-tab-3.svg" alt="illustration-features-tab-3">
            </div>

            <div class="content">
                <h1>Share your bookmarks</h1>
                <p>Easily share your bookmarks and collections with others. Create a shareable link that you can send at
                    the click of a button.</p>
                <a href="#" class="all-btn">more info</a>
            </div> --}}


            <!-- 3 Tab  -->

        </div>
    </section>


    <!-- features sectin ends -->


    {{-- <!-- downloads section starts  -->

    <section class="download" id="download">
        <div class="heading">
            <h1>Download Extension</h1>
            <p>We've got more browsers in the pipeline. Please do le us know if you got've got a favorite you'd like us
                to prioritize</p>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="assets/user/images/logo-chrome.svg" alt="logo-chrome">

                <h3>Add to Chrome</h3>
                <p>Minimum Version 63</p>
                <a href="#" class="all-btn">install</a>
            </div>

            <div class="box">
                <img src="assets/user/images/logo-firefox.svg" alt="logo-firefox">

                <h3>Add to Firefox</h3>
                <p>Minimum Version 55</p>
                <a href="#" class="all-btn">install</a>
            </div>

            <div class="box">
                <img src="assets/user/images/logo-opera.svg" alt="logo-opera">

                <h3>Add to Opera</h3>
                <p>Minimum Version 46</p>
                <a href="#" class="all-btn">install</a>
            </div>
        </div>
    </section>


    <!-- downloads section ends --> --}}
    {{-- <!-- home section stars  -->

        <section class="home" id="home">
            <div class="content">
                <h1>Simple Bookmark Manager</h1>
                <p>A clean and simple interface to organize your favorite websites. open a browser tab and see your sites
                    load instantly. try it for free!!</p>

                <a href="#" class="home-btn">get it on chrome</a>
            </div>


            <div class="image">
                <img src="assets/user/images/illustration-hero.svg" alt="illustration-hero">
            </div>
        </section>

        <!-- home section ends -->

        <!-- features sectin starts  -->

        <section class="features" id="features">
            <div class="heading">
                <h1>Features</h1>
                <p>Our aim is to make it quick and easy for you to access your favorite websites. your bookmarks sync
                    between your devices so you can access them on the go</p>
            </div>


            <div class="row">
                <!-- 1 Tab  -->
                <div class="image">
                    <img src="assets/user/images/illustration-features-tab-1.svg" alt="illustration-features-tab-1">
                </div>


                <div class="content">
                    <h1>Bookmark in one click</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi sint odit tempora, maiores quos qui
                        quisquam accusamus ad officiis sapiente.</p>
                    <a href="#" class="all-btn">more info</a>
                </div>

                <!-- 1 Tab  -->

                <!-- 2 Tab  -->
                <div class="content">
                    <h1>Intelligent search</h1>
                    <p>Our powerful search feature will help you find saved sites in no time at all. No need to trawl
                        through all of your bookmarks.</p>
                    <a href="#" class="all-btn">more info</a>
                </div>

                <div class="image">
                    <img src="assets/user/images/illustration-features-tab-2.svg" alt="illustration-features-tab-2">
                </div>

                <!-- 2 Tab  -->

                <div class="image">
                    <img src="assets/user/images/illustration-features-tab-3.svg" alt="illustration-features-tab-3">
                </div>

                <div class="content">
                    <h1>Share your bookmarks</h1>
                    <p>Easily share your bookmarks and collections with others. Create a shareable link that you can send at
                        the click of a button.</p>
                    <a href="#" class="all-btn">more info</a>
                </div>


                <!-- 3 Tab  -->

            </div>
        </section>


        <!-- features sectin ends -->


        <!-- downloads section starts  -->

        <section class="download" id="download">
            <div class="heading">
                <h1>Download Extension</h1>
                <p>We've got more browsers in the pipeline. Please do le us know if you got've got a favorite you'd like us
                    to prioritize</p>
            </div>

            <div class="box-container">
                <div class="box">
                    <img src="assets/user/images/logo-chrome.svg" alt="logo-chrome">

                    <h3>Add to Chrome</h3>
                    <p>Minimum Version 63</p>
                    <a href="#" class="all-btn">install</a>
                </div>

                <div class="box">
                    <img src="assets/user/images/logo-firefox.svg" alt="logo-firefox">

                    <h3>Add to Firefox</h3>
                    <p>Minimum Version 55</p>
                    <a href="#" class="all-btn">install</a>
                </div>

                <div class="box">
                    <img src="assets/user/images/logo-opera.svg" alt="logo-opera">

                    <h3>Add to Opera</h3>
                    <p>Minimum Version 46</p>
                    <a href="#" class="all-btn">install</a>
                </div>
            </div>
        </section>


        <!-- downloads section ends --> --}}
    <section class="preview" id="about">
        <h1 class="text-center">Let's Make Memorable Experiece</h1>
        {{-- <p class="text-center fs-3"><i class="fa-brands fa-instagram"></i> : @nailtour.travel</p>
            <p class="text-center fs-3"><i class="fa-brands fa-youtube"></i> : Nai'il Tour</p>
            <p class="text-center fs-3"><i class="fa-brands fa-tiktok"></i> : Nai'il Tour&Travel</p>
            <p class="text-center fs-3"><i class="fa-solid fa-phone"></i> : 0272.29522671</p>
            <p class="text-center fs-3"><i class="fa-brands fa-whatsapp"></i> : 085779955999</p> --}}
    </section>

    <section class="preview" id="contact">
        <h1 class="text-center">Nai'lTour Contact</h1>
        <p class="text-center fs-3"><i class="fa-brands fa-instagram"></i> : @nailtour.travel</p>
        <p class="text-center fs-3"><i class="fa-brands fa-youtube"></i> : Nai'il Tour</p>
        <p class="text-center fs-3"><i class="fa-brands fa-tiktok"></i> : Nai'il Tour&Travel</p>
        <p class="text-center fs-3"><i class="fa-solid fa-phone"></i> : 0272.29522671</p>
        <p class="text-center fs-3"><i class="fa-brands fa-whatsapp"></i> : 085779955999</p>
    </section>


    <!-- footer section starts  -->

    <section class="footer" id="footer">
        <div class="box-container">
            {{-- <div class="box">
            <h3>quick links</h3>
            <a href="#"><i class="fas fa-chevron-right"></i>home</a>
            <a href="#"><i class="fas fa-chevron-right"></i>features</a>
            <a href="#"><i class="fas fa-chevron-right"></i>download</a>
            <a href="#"><i class="fas fa-chevron-right"></i>contact</a>
        </div>


        <div class="box">
            <h3>our services</h3>
            <a href="#"><i class="fas fa-chevron-right"></i>bookmark extension</a>
            <a href="#"><i class="fas fa-chevron-right"></i>chrome themes</a>
            <a href="#"><i class="fas fa-chevron-right"></i>firefox themes</a>
            <a href="#"><i class="fas fa-chevron-right"></i>screen recorder extension</a>
            <a href="#"><i class="fas fa-chevron-right"></i>screen shot extension</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i>+123-456-789</a>
            <a href="#"><i class="fas fa-phone"></i>+111-222-3333</a>
            <a href="#"><i class="fas fa-envelope"></i>company@example.com</a>
            <a href="#"><i class="fas fa-envelope"></i>company@example.com</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Mumbai, india - 12345</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
            <a href="#"><i class="fab fa-twitter"></i>facebook</a>
            <a href="#"><i class="fab fa-instagram"></i>instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
            <a href="#"><i class="fab fa-pinterest"></i>pinterest</a>
        </div>
    </div> --}}


            <div class="credit">created by
                {{-- <a href="https://www.youtube.com/channel/UCK5YMqyy_fjAtwgu9hjxXJg" target="_blank"
                class="text-decoration-none"><span>Zainandhi Nur
                    Fathurrohman</span>
                | all rights reserved</a> --}}
                <a href="" target="_blank" class="text-decoration-none"><span>Zainandhi Nur
                        Fathurrohman</span>
                    | all rights reserved</a>
            </div>
    </section>

    <!-- footer section ends -->



    <script src="assets/user/js/main.js"></script>
    <script src="../assets/user/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.masknumber.js"></script>
    <script src="../assets/js/jquery.masknumber.js"></script>
    <script src="assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="../assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</body>

</html>
