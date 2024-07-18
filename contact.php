<?php
$sayfa = "İletişim";
 include('inc/head.php');

 if($_SERVER['REQUEST_METHOD'] === 'POST') {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $message = $_POST['message'];  

     $sql = "INSERT INTO contact (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
     $result = $baglanti->exec($sql);
 }
?>
    <main>
        <!--======= banner-part start =======-->
        <section id="banner-part">
            <div class="single-banner overlay">
                <div class="container">
                    <div class="banner-content">
                        <h2>contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--======= banner-part end =======-->
        <!--======= location-part start =======-->
        <section id="location-part" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>20, Khulna St. 165</p>
                            <p>Melbourne Australia</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <i class="fas fa-envelope"></i>
                            <p>anthony2141@gmail.com</p>
                            <p>24 X 7 online support</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <i class="fas fa-phone-alt"></i>
                            <p>111 222 3334</p>
                            <p>Mon-Set 9:00am-5:00pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= location-part end =======-->
        <!--======= contact-part start =======-->
        <section id="contact-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-left">
                            <div class="contact-title">
                                <h4>answer & questions</h4>
                            </div>
                            <div class="accordion-part">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Do I need a bussiness plan?
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
                                                <p>craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    How long should a business plan be?
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
                                                <p>craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    What goes into a business plan?
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
                                                <p>craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingfour">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                                    Where do I start?
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
                                                <p>craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-right">
                            <div class="contact-title">
                                <h4>let's talk about your idea</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor minima itaque cumque maiores.</p>
                            </div>
                            <div class="contact-form">
                                <form method="post " action="#">
                                    
                                    <input class="name" type="text" placeholder="name">
                                    <input type="email" placeholder="email">
                                    <input class="phone" type="text" placeholder="phone">

                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
                                    <button type="submit">send message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= contact-part end =======-->
        <!--======= map-part start =======-->
        <section id="map">
            <div class="container-fluid">
                <div class="row">
                    <div id="contact-map"></div>
                </div>
            </div>
        </section>
        <!--======= map-part end =======-->
    </main>
    <?php
 include('inc/footer.php')
?>