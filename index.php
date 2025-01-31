<?php
    require_once('./db/dbh.php');
    session_start();
    if (!isset($_SESSION['job_seeker_id'])){
        //header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> 
    <!-- link css -->
    <link rel="stylesheet" href="dist/style1.css">
    <title>Job Manual</title>
</head>
<body>
    <header class="header">
        <div class="overlay has-fade"></div>
        <nav class="nav-container nav-container--pall flex flex-jc-sb flex-ai-c">
            <a href="./index.html" class="header__logo">
                <img src="./images/logo.png" alt="Easy Bank" />
            </a>
            <a href="#" id="btnHamburger" class="header__toggle hide-for-desktop">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="header__links hide-for-mobile">
                <a href="#">Home</a>
                <a href="./job-seeker/job_seeker_login/index.html">Job seeker</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>
                <a href="./Recruiter/Recruiter_login/index.html">Be a Recruiter</a>
                <button class="button">POST A JOB</button>
                <a href="./site/index.html" class="about_us">About Us</a>
            </div>
        </nav>
        <div class="header__menu has-fade">
            <a href="#">Pages</a>
            <a href="#">Candidates</a>
            <a href="#">Employers</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
            <a href="#">Sign In</a>
            <button class="button">POST A JOB</button>
        </div>
    </header>
    <section class="hero container">
        <div class="hero__text">
            <h2 class="hero__text-heading">Find the career you deserve</h2>
            <p class="hero__text-info">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
            <div class="hero__text-button">
                <a href="#jobs"><button class="button btn-1">SEE OUR JOBS</button></a>
                <button class="button btn-2">SEARCH JOBS</button>
            </div>        
        </div>
        <div class="hero__image">
            <img src="./images/img-1.png" alt="hero image"/>
        </div>
    </section>
    <section class="categories container">
        <div class="categories__heading">
            <h2>Browse Categories</h2>
            <p>Most popular categories of portal, sorted by popularity</p>
        </div>
        <div class="categories__content">
            <div class="item">
                <i class="fas fa-house-damage icon icon-1"></i>
                <div class="item__text">
                    <h4>Administrator</h4>
                    <p>(4286 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-globe icon icon-2"></i>
                <div class="item__text">
                    <h4>Data Science</h4>
                    <p>(2000 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-book icon icon-3"></i>
                <div class="item__text">
                    <h4>Design</h4>
                    <p>(1450 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-desktop icon icon-4"></i>
                <div class="item__text">
                    <h4>Development</h4>
                    <p>(5100 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-brush icon icon-5"></i>
                <div class="item__text">
                    <h4>Engineering</h4>
                    <p>(5079 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="far fa-heart icon icon-6"></i>
                <div class="item__text">
                    <h4>Programmer</h4>
                    <p>(3235 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-filter icon icon-7"></i>
                <div class="item__text">
                    <h4>Security</h4>
                    <p>(1800 jobs)</p>
                </div>
            </div>
            <div class="item">
                <i class="fas fa-trophy icon icon-8"></i>
                <div class="item__text">
                    <h4>System Analyst</h4>
                    <p>(4286 jobs)</p>
                </div>
            </div>
        </div>
    </section>
    <section class="feature container">
            <div class="feature__heading">
                <h3>Featured Jobs</h3>
                <p>As the world's #1 job 
                    site, with over 200 million unique visitors every month 
                    from over 60 different countries
                </p>
            </div>
            <div class="feature__content">
                <div class="card ">
                    <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-1.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading"> 
                            <h4>Software Engineer</h4>
                            <p>MizTech</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn g">FULL TIME</p>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-2.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading">
                            <h4>Graphic Designer</h4>
                            <p>Hunter Inc.</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn r">PART TIME</p>
                    </div>
                    </div>
                </div>


                <div class="card">
                <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-3.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading">
                            <h4>Managing Director</h4>
                            <p>MagNews</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn g">FULL TIME</p>
                    </div>
                </div>

                </div>

                <div class="card">
                <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-4.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading">
                            <h4>Software Engineer</h4>
                            <p>AmazeSoft</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn g">FULL TIME</p>
                    </div>
                </div>
                </div>

                <div class="card">
                    <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-5.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading">
                            <h4>Graphic Designer</h4>
                            <p>Bingo</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn r">PART TIME</p>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                    <div class="card__image">
                        <img src="./images/feature-1.png" alt="card" />
                    </div>
                    <div class="card__text">
                        <div class="card__text-heading">
                            <h4>Managing Director</h4>
                            <p>MagNews</p>
                        </div>
                        <div class="card__text-info1">
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                            <p><i class="far fa-user"></i>  Jhon Smith</p>
                        </div>
                        <p class="card__text-btn g">FULL TIME</p>
                    </div>
                </div>
                    </div>
            </div>
            <button class="feature__btn button">BROWSE ALL JOBS</button>
    </section>
    <section class="companies container">
        <div class="companies__heading">
            <h3>Top Hiring Companies</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                metus effici turac fringilla lorem facilisis.
            </p>
        </div>
        <div class="companies__content">
            <div class="company__details">

                <div class="comapny">
                    <div class="company__image">
                        <img src="./images/company-1.png" alt="image" />
                    </div>
                    <div class="company__content">
                        <h4>Amaze Tech</h4>
                        <div class="company__content-info">
                            <p><i class="fas fa-briefcase"></i> Software Company</p>
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                        </div>
                        <button class="button">
                            5 OPEN JOB
                        </button>
                    </div>
                </div>
                <div class="comapny">
                    <div class="company__image">
                        <img src="./images/company-2.png" alt="image" />
                    </div>
                    <div class="company__content">
                        <h4>FaceBook</h4>
                        <div class="company__content-info">
                            <p><i class="fas fa-briefcase"></i> Software Company</p>
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                        </div>
                        <button class="button">
                            5 OPEN JOB
                        </button>
                    </div>
                </div>
                <div class="comapny">
                    <div class="company__image">
                        <img src="./images/company-3.png" alt="image" />
                    </div>
                    <div class="company__content">
                        <h4>MagNews</h4>
                        <div class="company__content-info">
                            <p><i class="fas fa-briefcase"></i> Software Company</p>
                            <p><i class="fas fa-map-marker-alt"></i> New York</p>
                        </div>
                        <button class="button">
                            5 OPEN JOB
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="jobs container" id="jobs">
        <div class="jobs__heading">
            <h3>Recent Job Post</h3>
            <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries
            </p>
        </div>
        <div class="jobs__content">
            <div class="singlejob"> 
                <img src="./images/feature-1.png" alt="job"/>
                <div class="singlejob__heading">
                    <h4>App Developer</h4>
                    <p>AmazeSoft</p>
                </div>
                    <p class="singlejob-text">7 Open Jobs</p>
                    <p><i class="fas fa-map-marker-alt"></i> New York, US</p>
                    <p>FULL TIME</p>
                    <button><a href='apply_job_process.php'>APPLY NOW</a></button>
            </div>
            <div class="singlejob"> 
                <img src="./images/feature-2.png" alt="job"/>
                <div class="singlejob__heading">
                    <h4>App Developer</h4>
                    <p>AmazeSoft</p>
                </div>
                    <p class="singlejob-text">7 Open Jobs</p>
                    <p><i class="fas fa-map-marker-alt"></i> New York, US</p>
                    <p>FULL TIME</p>
                    <button><a href='apply_job_process.php'>APPLY NOW</a></button>
            </div>
            <div class="singlejob"> 
                <img src="./images/feature-3.png" alt="job"/>
                <div class="singlejob__heading">
                    <h4>App Developer</h4>
                    <p>AmazeSoft</p>
                </div>
                    <p class="singlejob-text">7 Open Jobs</p>
                    <p><i class="fas fa-map-marker-alt"></i> New York, US</p>
                    <p>FULL TIME</p>
                    <button><a href='apply_job_process.php'>APPLY NOW</a></button>
            </div>
            <div class="singlejob"> 
                <img src="./images/feature-4.png" alt="job"/>
                <div class="singlejob__heading">
                    <h4>App Developer</h4>
                    <p>AmazeSoft</p>
                </div>
                    <p class="singlejob-text">7 Open Jobs</p>
                    <p><i class="fas fa-map-marker-alt"></i> New York, US</p>
                    <p>FULL TIME</p>
                    <button><a href='apply_job_process.php'>APPLY NOW</a></button>
            </div>
            <button class="button job-btn"> LOAD MORE LISTING</button>
        </div>
    </section>
    
    <section class="info">
        <div class="info__heading">
            <h3>How It Works?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                metus effici turac fringilla lorem facilisis.</p>
        </div>
        <div class="info__content">
            <div class="single-info">
                <i class="fas fa-user info-icon"></i>
                <h4>Create an Account</h4>
                <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
            </div>
            <div class="single-info">
                <i class="fas fa-search info-icon"></i>
                <h4>Search Jobs</h4>
                <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
            </div>
            <div class="single-info">
                <i class="fas fa-trophy info-icon"></i>
                <h4>Apply</h4>
                <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
            </div>
        </div>
    </section>

    <section class="main">
        <div class="recruiter">
            <h3>I'm Recruiter</h3>
            <p>Post a job to tell us about your project. We'll quickly match you with
                the right freelancers find place best</p>
            <button class="recruiter-btn">Post A Job</button>
        </div>
        <div class="jobseeker">
            <h3>I'm Jobseeker</h3>
            <p>Post a job to tell us about your project. We'll quickly match you with
                the right freelancers find place best</p>
            <button class="jobseeker-btn">Post A Job</button>
        </div>
    </section>

    <section class="price container">
        <div class="price__heading">
            <h3>Pricing Plan</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                metus effici turac fringilla lorem facilisis.</p>
        </div> 
        <div class="price__content">
            <div class="single__price">
                <div class="professional"></div>
                <i class="fas fa-rocket"></i>
                <div class="price__info">
                    <h3>Professional</h3>
                    <p>Post 1 Job</p>
                    <P>No Featured Job</P>
                    <p>Edit Your Job Listing</p>
                    <p>Manage Application</p>
                    <p>30-day Expired</p>
                    <h4>$<span>0</span>/Month</h4>
                </div>
                <button class="price-btn">GET STARTED</button>
            </div>
            <div class="single__price">
                <div class="advance"></div>
                <i class="fas fa-tint"></i>
                <div class="price__info">
                    <h3>Advance</h3>
                    <p>Post 1 Job</p>
                    <P>No Featured Job</P>
                    <p>Edit Your Job Listing</p>
                    <p>Manage Application</p>
                    <p>30-day Expired</p>
                    <h4>$<span>20</span>/Month</h4>
                </div>
                <button class="adv-btn button">GET STARTED</button>
            </div>
            <div class="single__price">
                <div class="premium"></div>
                <i class="fas fa-briefcase"></i>
                <div class="price__info">
                    <h3>Premium</h3>
                    <p>Post 1 Job</p>
                    <P>No Featured Job</P>
                    <p>Edit Your Job Listing</p>
                    <p>Manage Application</p>
                    <p>30-day Expired</p>
                    <h4>$<span>40</span>/Month</h4>
                </div>
                <button class="price-btn">GET STARTED</button>
            </div>
        </div> 
    </section>

    <section class="about">
        <div class="box">
            <i class="fas fa-house-damage box-icon"></i>
            <div class="box-text">
                <h4>800</h4>
                <p>Jobs Posted</p>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-briefcase box-icon"></i>
            <div class="box-text">
                <h4>80</h4>
                <p>All Companies</p>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-file box-icon"></i>
            <div class="box-text">
                <h4>900</h4>
                <p>Resumes</p>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-save box-icon"></i>
            <div class="box-text">
                <h4>1200</h4>
                <p>Application</p>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="blog__heading">
            <h3>Blog Post</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                metus effici turac fringilla lorem facilisis.
            </p>
        </div>
        <div class="blog__content">
            <div class="blog__card">
                <div class="blog__card-img">
                    <img src="/images/img1.jpg" alt="" />
                </div>
                <div class="blog__card-info">
                    <h4>Tips to write an impressive resume online for beginner</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores ad vitae.</p>
                    <a href="#" class="read__more">Read More</a>
                </div>
            </div>
            <div class="blog__card">
                <div class="blog__card-img">
                    <img src="/images/img2.jpg" alt="" />
                </div>
                <div class="blog__card-info">
                    <h4>Let's explore 5 cool new features in JobBoard theme</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores ad vitae.</p>
                    <a href="#" class="read__more">Read More</a>
                </div>
            </div>
            <div class="blog__card">
                <div class="blog__card-img">
                    <img src="/images/img3.jpg" alt="" />
                </div>
                <div class="blog__card-info">
                    <h4>How to convince recruiters and get your dream job</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium asperiores ad vitae.</p>
                    <a href="#" class="read__more">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter container">
        <div class="newsletter__image">
            <img src="./images/img-2.png" alt="image" />
        </div>
        <div class="newsletter__info">
            <h2>Subscribe Our Newsletter</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                ellentesque dignissim quam et metus dolor sit amet,.</p>
            <div class="input">
                <input type="email" placeholder="Enter Your Email" />
                <button class="button input-btn">SUBMIT</button>
            </div>
        </div>
    </section>
    <section class="footer">
    <div class="footer__logo">
        <img src="./images/logo.png" alt="logo"/>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, nihil sit possimus velit harum ea blanditiis repellat veniam, facere temporibus recusandae atque? Excepturi eveniet.</p>
        <ul class="social__media">
            <li><a href="#"><span class="iconify" data-icon="logos:facebook"></span></a></li>
            <li><a href="#"><span class="iconify" data-icon="logos:twitter"></span></a></li>
            <li><a href="#"><span class="iconify" data-icon="logos:linkedin-icon"></span></a></li>
            <li><a href="#"><span class="iconify" data-icon="logos:google-gmail"></span></a></li>
            
        </ul>
    </div>
    <div class="footer__nav">
        <h4>Quick Links</h4>
        <ul class="nav__links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">License</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="footer__links">
        <h4>All Navigation</h4>
        <ul class="links">
            <li><a href="#">Front-end Design</a></li>
            <li><a href="#">Android Developer</a></li>
            <li><a href="#">CMS Development</a></li>
            <li><a href="#">IOS Developer</a></li>
            <li><a href="#">Iphone Developer</a></li>
        </ul>
    </div>
    <div class="footer__address">
        <h4>
            Address
        </h4>
        <div class="phone">
            <span class="iconify" data-icon="clarity:phone-handset-line"></span>
            <p>+880-123-456-789 <br>
            +880-123-456-789</p>
        </div>
        <div class="email">
            <span class="iconify" data-icon="eva:email-outline"></span>
            <p> contact@shopr.com info@shopr.com</p>
        </div>
        <div class="location">
            <span class="iconify" data-icon="akar-icons:location"></span>
            <p>9923 South Avenue Street, New York City</p>
        </div>
    </div>
</section>
    <script src="script.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>
</html>