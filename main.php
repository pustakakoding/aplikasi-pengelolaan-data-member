<!-- Aplikasi Pengelolaan Data Member
******************************************
* Developer   : Indra Styawantoro
* Company     : Pustaka Koding
* Release     : Juli 2021
* Update      : -
* Website     : pustakakoding.com
* E-mail      : pustaka.koding@gmail.com
* WhatsApp    : +62-813-7778-3334
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Pengelolaan Data Member">
    <meta name="author" content="Indra Styawantoro">

    <!-- Title -->
    <title>Aplikasi Pengelolaan Data Member</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css" integrity="sha256-RXPAyxHVyMLxb0TYCM2OW5R4GWkcDe02jdYgyZp41OU=" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Sidebar Menu -->
    <section class="sidebar-menu d-none d-md-block shadow-sm">
        <!-- Brand -->
        <div class="brand text-center mb-5">
            <!-- Logo -->
            <img src="assets/img/pustaka-koding.svg" alt="Logo">
            <!-- Title -->
            <h3 class="mt-4 mb-3"> Pustaka Koding </h3>
        </div>
        <div class="menus">

            <!-- panggil file "sidebar_menu.php" untuk menampilkan menu sidebar -->
            <?php include "sidebar_menu.php"; ?>

        </div>
    </section>

    <!-- Main Content -->
    <main class="content-wrapper d-block">
        <div class="container">

            <!-- panggil file "content.php" untuk menampilkan halaman konten -->
            <?php include "content.php"; ?>

        </div>
    </main>

    <!-- Mobile Menu -->
    <section class="mobile-menu d-block d-md-none">
        <div class="row bottom-navigation">
            <div class="col-12 col-lg-12">
                <div class="card-menu shadow-lg">
                    <div class="row justify-content-center">

                        <!-- panggil file "mobile_menu.php" untuk menampilkan menu mobile -->
                        <?php include "mobile_menu.php"; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-AkQap91tDcS4YyQaZY2VV34UhSCxu2bDEIgXXXuf5Hg=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/id.js" integrity="sha256-cvHCpHmt9EqKfsBeDHOujIlR5wZ8Wy3s90da1L3sGkc=" crossorigin="anonymous"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>