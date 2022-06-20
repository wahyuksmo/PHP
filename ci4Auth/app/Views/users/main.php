<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style.css" />

    <title>Portfolio</title>
</head>

<body>
    <section class="kepala">
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#" style="color: #333; font-size: 20px; font-weight: 650">Your Profile</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout" onclick="return confirm('Yakin ?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Your Profile</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout" onclick="return confirm('Yakin ?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="vh-100" style="background-color: #ebeef2;">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="/img/<?= session()->get('gambar'); ?>" class="img-thumbnail" style="width: 200px; border-radius:50px;" />
                            </div>
                            <h4 class="mb-2"><?= session()->get('nama') ?></h4>
                            <p class="mb-2"><?= session()->get('email') ?></p>
                            <p class="text-muted mb-4">Reguler Pedestrian</p>
                            <div class="mb-4 pb-2">
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="bi bi-instagram"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="bi bi-twitter"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                            </div>
                            <a href="/user/logout" class="btn btn-primary btn-rounded btn-lg mb-5">
                                Logout Sekarang
                            </a>
                            <p class="text-muted">Ini adalah data data profile anda yang anda registerkan ada email, nama, profile anda</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 2000,
            once: true,
        });
    </script>
</body>

</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    * {
        font-family: "Poppins", sans-serif;
    }

    .navbar {
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(131, 142, 152, 0.15);
    }

    .navbar li a {
        margin-left: 40px;
        color: #333;
        font-size: 18px;
        font-weight: 550;
    }

    .navbar li a:hover {
        display: block;
        color: #f2634d;
        border-bottom: 3px solid #f2634d;
        margin-bottom: -8px;
    }


    .offcanvas-body ul {
        text-align: center;
        margin-top: 40px;
    }

    .offcanvas-body ul li a {
        margin-top: 30px;
        color: #333;
    }

    .banner {
        margin-top: 100px;
    }

    .banner h2 {
        font-weight: bolder;
        color: #f2634d;
    }


    .banner h2::after {
        content: "";
        display: block;
        border-bottom: 3px solid #f68472;
        margin: auto;
        width: 100px;
        padding-top: 5px;
    }



    @media (min-width: 768px) {
        .banner {
            margin-top: 250px;
        }
    }
</style>