<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Hollow Knight</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Just link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Just link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Just link</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item logged-out" <?php echo isset($_SESSION['user_id']) ? 'style="display:none"' : ''; ?>>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                            </li>
                            <li class="nav-item logged-out" <?php echo isset($_SESSION['user_id']) ? 'style="display:none"' : ''; ?>>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                            </li>
                            <li class="nav-item logged-in" <?php echo isset($_SESSION['user_id']) ? '' : 'style="display:none"'; ?>>
                                <a class="nav-link" href="edit_profile.php">Edit Profile</a>
                            </li>
                            <li class="nav-item logged-in" <?php echo isset($_SESSION['user_id']) ? '' : 'style="display:none"'; ?>>
                                <form class="d-flex" action="logout.php" method="POST">
                                    <button type="submit" class="btn btn-secondary">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="loginEmail" name="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password">
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Registration Modal -->
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">Register</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="register.php">
                            <div class="mb-3">
                                    <label for="firstNameInput" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstNameInput" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastNameInput" class="form-label">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="lastNameInput" required>
                                </div>
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="phoneInput" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" id="phoneInput" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="passwordInput" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPasswordInput" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPasswordInput" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mainContant text-center">
        <div class="container">
            <div class="row">
                <div class="container mt-5 text-light">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="container">
                            <div class="">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="main.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="hollowknight-1280-1529623462572_160w.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row text-center" style="margin-top: 4%;">
                                    <div class="col-md-12">
                                        <h1>Descend into the Dark</h1>
                                        <div class="row" style="margin-top: 3%;">
                                            <div class="col-md-6" data-aos="fade-right">
                                                <img src="mines.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 text-start" data-aos="fade-left">
                                                <h2>Brave the Depths of a Forgotten Kingdom</h2></br>
                                                <p>
                                                    Beneath the fading town of Dirtmouth sleeps a vast, ancient kingdom. Many are drawn beneath the surface, searching for riches, or glory, or answers to old secrets.</br>
                                                    </br>
                                                    As the enigmatic Knight, you’ll traverse the depths, unravel its mysteries and conquer its evils.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 4%;">
                                            <div class="col-md-6 text-start" data-aos="fade-right">
                                                <h2>Use Your Skills and Reflexes to Survive</h2></br>
                                                <p>
                                                    Hollow Knight is a challenging 2D action-adventure. You’ll explore twisting caverns,</br> battle tainted creatures and escape intricate traps, all to solve an ancient long-hidden mystery.
                                                </p>
                                                <ul>
                                                    <li>Explore vast, interconnected worlds</li>
                                                    <li>Encounter a bizarre collection of friends and foes</li>
                                                    <li>Evolve with powerful new skills and abilities</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6" data-aos="fade-left">
                                                <img src="false_knight-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 4%;">
                                            <div class="col-md-6" data-aos="fade-right">
                                                <img src="lake_of_unn.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 text-start" data-aos="fade-left">
                                                <h2>Evocative Hand-Drawn Art</h2></br>
                                                <p>
                                                    The world of Hollow Knight is brought to life in vivid, moody detail, its caverns alive with bizarre and terrifying creatures, each animated by hand in a traditional 2D style.</br>
                                                    </br>
                                                    Every new area you’ll discover is beautifully unique and strange, teeming with new creatures and characters to discover. The world of Hollow Knight is one worth exploring just to take in the sights and discover new wonders hidden off of the beaten path.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=JuP47fRBsWg" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-12 ">
                                <h1>Please log in to view the content</h1>
                                <p>This content is only visible to logged-in users. Please use the Login button above to access the content.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Footer -->
        <footer class="bg-light text-center text-lg-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                            voluptatem veniam, est atque cumque eum delectus sint!
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#" class="text-dark">Link 1</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 2</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 3</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 4</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="text-dark">Link 1</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 2</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 3</a>
                            </li>
                            <li>
                                <a href="#" class="text-dark">Link 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <p>Made by Ivan Goriakin</p>
            </div>
        </footer>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>

