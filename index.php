<?php

$sayfa = "Anasayfa";
include('inc/db.php');
include('inc/head.php');

$con = $baglanti->prepare("SELECT * FROM anasayfa");
$experts = $baglanti->prepare("SELECT * FROM calisanlar");
$con->execute();
$sonuc = $con->fetch();
?>

<main>
    <!--======= slider-part start =======-->
    <section id="slider-part" class="slider-active">
        <?php
       echo "<div class='single-slider overlay'>";
           echo '<div class="container">';
                echo '<div class="slider-content">';

                    
                        echo '<h5>'. $sonuc['ust_baslik'] .'</h5>';
                        echo '<h2>'. $sonuc['alt_baslik'] .'</h2>';
                        echo '<a class="defult-btn" href="'. $sonuc['link'].'">'. $sonuc['link_text'] .'</a>';
                    
                   echo' </div>';
                   echo '</div></div>';  
       echo "<div class='single-slider overlay'>";
           echo '<div class="container">';
                echo '<div class="slider-content">';

                    
                        echo '<h5>'. $sonuc['ust_baslik'] .'</h5>';
                        echo '<h2>'. $sonuc['alt_baslik'] .'</h2>';
                        echo '<a class="defult-btn" href="'. $sonuc['link'].'">'. $sonuc['link_text'] .'</a>';
                    
                   echo' </div>';
                   echo '</div></div>';  
                    ?>
    


            
        </section>
        <!--======= slider-part end =======-->
        <!--======= about-part start =======-->
        <section id="about-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <div class="about-men">
                                <img src="images/about/about1.jpg" alt="about1">
                            </div>
                            <div class="about-laptop">
                                <img src="images/about/about2.jpg" alt="about2">
                                <div class="video-paly">
                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=weZOk9m-2eA"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right">
                            <div class="section-title">
                                <h2>about us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                            </div>
                            <div class="about-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit.</p>
                                <p class="duis">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis</p>
                                <a href="#" class="defult-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= about-part end =======-->
        <!--======= service-part start =======-->
        <section id="service-part" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>our services</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service-item">
                            <div class="service-icon">
                                <span class="flaticon-computer-graphic"></span>
                            </div>
                            <h3>graphic design</h3>
                            <p> Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford.</p>
                            <a href="#" class="service-btn">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-item">
                            <div class="service-icon">
                                <span class="flaticon-code"></span>
                            </div>
                            <h3>web design</h3>
                            <p> Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford.</p>
                            <a href="#" class="service-btn">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-item">
                            <div class="service-icon">
                                <span class="flaticon-work-1"></span>
                            </div>
                            <h3>networking</h3>
                            <p> Numerous ladyship so raillery humoured goodness received an. So narrow formal length my highly longer afford.</p>
                            <a href="#" class="service-btn">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= service-part end =======-->
        <!--======= team-part start =======-->
        <section id="team-part">
            <?php 

                $experts = $baglanti->prepare("SELECT * FROM calisanlar where aktif = 1 order by sira");
                $experts->execute();
                $sonuc = $experts->fetchAll();


                ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>our experts</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php 
                                foreach($sonuc as $row){
                    echo '<div class="col-lg-3 col-sm-6">
                        <div class="single-team">
                            <div class="team-img">
                               
                                    
                                        <img src="images/team/'. $row['img'].'" alt="team1">
                                    
                                
                                <div class="team-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>ali banath</h4>
                                <p>founder</p>
                            </div>
                        </div>
                    </div>';
                }
                    ?>

                   
                    
                </div>
            </div>
        </section>
        <!--======= team-part end =======-->
        <!--======= project-part start =======-->
        <section id="project-part" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>projects gallery</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="project-button">
                            <ul>
                                <li data-filter="all">all</li>
                                <li data-filter=".web">web design</li>
                                <li data-filter=".grap">graphic design</li>
                                <li data-filter=".dev">development</li>
                                <li data-filter=".net">networking</li>
                            </ul>
                        </div>
                        <div class="con row">
                            <div class=" col-lg-4 col-sm-6 project-item mix grap web dev">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project1.jpg" alt="project1">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project1.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-sm-6 project-item mix dev">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project2.jpg" alt="project2">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project2.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-sm-6 project-item mix web grap net">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project3.jpg" alt="project3">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project3.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-sm-6 project-item mix web dev">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project5.jpg" alt="project5">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project5.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-sm-6 project-item mix web grap dev">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project6.jpg" alt="project6">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project6.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-sm-6 project-item mix web net">
                                <div class="project-inner">
                                    <img class="project-img" src="images/project/project7.jpg" alt="project7">
                                    <div class="project-link">
                                        <a class="venobox" data-gall="gallery01" href="images/project/project7.jpg"><span class="flaticon-add"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= project-part end =======-->
        <!--======= counter-part start =======-->
        <section id="counter-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>our some success</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="single-counter">
                            <span class="flaticon-trophy counter-icon"></span>
                            <h2 class="counter">250</h2>
                            <p>awards win</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="single-counter">
                            <span class="flaticon-happiness counter-icon"></span>
                            <h2><span class="counter">2000</span>+</h2>
                            <p>happy clients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="single-counter">
                            <span class="flaticon-work counter-icon"></span>
                            <h2 class="counter">410</h2>
                            <p>our worker</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="single-counter">
                            <span class="flaticon-project counter-icon"></span>
                            <h2><span class="counter">3000</span>+</h2>
                            <p>project done</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= counter-part end =======-->
        <!--======= testimonial-part start =======-->
        <section id="testimonial-part" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>Client Feedback</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pr-0 pr">
                        <div class="active-testimonial">
                            <div class="testimonial-item d-flex align-items-center">
                                <div class="testimonial-img">
                                    <img src="images/testimonial/testimonial4.jpg" alt="testimonial4">
                                </div>
                                <div class="testimonial-info">
                                    <h4>Audrey Anne</h4>
                                    <span>Marketing Executive</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur facere explicabo totam molestias repudiandae in, nulla. Eos laboriosam, ut provident, quisquam voluptatibus perspiciatis ab ipsum soluta suscipit numquam!
                                    </p>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="quote">
                                    <span class="flaticon-left-quotes-sign"></span>
                                </div>
                            </div>
                            <div class="testimonial-item d-flex align-items-center">
                                <div class="testimonial-img">
                                    <img src="images/testimonial/testimonial5.jpg" alt="testimonial5">
                                </div>
                                <div class="testimonial-info">
                                    <h4>Edward Ian</h4>
                                    <span>founder</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur facere explicabo totam molestias repudiandae in, nulla. Eos laboriosam, ut provident, quisquam voluptatibus perspiciatis ab ipsum soluta suscipit numquam!
                                    </p>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                    </div>
                                </div>
                                <div class="quote">
                                    <span class="flaticon-left-quotes-sign"></span>
                                </div>
                            </div>
                            <div class="testimonial-item d-flex align-items-center">
                                <div class="testimonial-img">
                                    <img src="images/testimonial/testimonial6.jpg" alt="testimonial6">
                                </div>
                                <div class="testimonial-info">
                                    <h4>Yvonne Joe</h4>
                                    <span>maneger</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur facere explicabo totam molestias repudiandae in, nulla. Eos laboriosam, ut provident, quisquam voluptatibus perspiciatis ab ipsum soluta suscipit numquam!
                                    </p>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="quote">
                                    <span class="flaticon-left-quotes-sign"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-0 pl">
                        <div class="testimonial-right">
                            <img class="test" src="images/testimonial/testimonial1.jpg" alt="testimonial1">
                            <img class="test-2" src="images/testimonial/testimonial2.jpg" alt="testimonial2">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= testimonial-part end =======-->
        <!--======= cta-part start =======-->
        <section id="cta-part" class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cta-title text-center">
                            <h2>Come To Get World Class Business Service.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                We are the first and trusted car repair company in your city.</p>
                            <a href="contact.html" class="defult-btn">contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= cta-part end =======-->
        <!--======= blog-part start =======-->
        <section id="blog-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>latest news</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img active-blog">
                                <a href="#"><img src="images/blog/bolg-1.jpg" alt="bolg-1"></a>
                                <a href="#"><img src="images/blog/bolg-2.jpg" alt="bolg-2"></a>
                                <a href="#"><img src="images/blog/bolg-3.jpg" alt="bolg-3"></a>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <ul>
                                        <li>25 jun 2020</li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-title">
                                    <h2><a href="#">How to become a best sale marketer in a year</a></h2>
                                </div>
                                <p>Admiration has sir decisively excellence say everything inhabiting acceptance. Sooner settle add put you sudden him.</p>
                                <a class="defult-btn sm-btn" href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img blog-animation">
                                <a href="#"><img src="images/blog/bolg-4.jpg" alt="bolg-4"></a>
                                <div class="blog-video">
                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=LFCcTNWMIEQ"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <ul>
                                        <li>25 nov 2020</li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-title">
                                    <h2><a href="#">How to become a best sale marketer in a year</a></h2>
                                </div>
                                <p>Admiration has sir decisively excellence say everything inhabiting acceptance. Sooner settle add put you sudden him.</p>
                                <a class="defult-btn sm-btn" href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#"><img class="blog-thumb" src="images/blog/bolg-7.jpg" alt="bolg-7"></a>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <ul>
                                        <li>10 aug 2020</li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-title">
                                    <h2><a href="#">How to become a best sale marketer in a year</a></h2>
                                </div>
                                <p>Admiration has sir decisively excellence say everything inhabiting acceptance. Sooner settle add put you sudden him.</p>
                                <a class="defult-btn sm-btn" href="#">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= blog-part end =======-->
        <!--======= brand-part start =======-->
        <section id="brand-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>Our Trusted Partners</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elity sed do eiusmod tempor inc ididunt labore east dolore magna you</p>
                        </div>
                    </div>
                </div>
                <div class="row active-brand">
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand1.png" alt="brand1"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand2.png" alt="brand2"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand3.png" alt="brand3"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand4.png" alt="brand4"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand5.png" alt="brand5"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand1.png" alt="brand1"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand2.png" alt="brand2"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand3.png" alt="brand3"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand4.png" alt="brand4"></a>
                    </div>
                    <div class="brand-item">
                        <a href="#"><img src="images/brand/brand5.png" alt="brand5"></a>
                    </div>
                </div>
            </div>
        </section>
        <!--======= brand-part end =======-->
    </main>
    <!--======= footer start =======-->
    
<?php

include('inc/footer.php')

?>