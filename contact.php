<?php
// Start session to use session variables
session_start();

$sayfa = "İletişim";
include('inc/head.php');

// Initialize variables for messages and form data
$message = '';
$name = '';
$email = '';
$phone = '';
$message_text = '';

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming $baglanti is your database connection
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message_text = trim($_POST['message'] ?? '');

    // Validate input
    if (empty($name) || empty($email) || empty($phone) || empty($message_text)) {
        $message = '<div class="alert alert-danger">Please fill in all fields.</div>';
    } else {
        // Insert into database using prepared statement
        $stmt = $baglanti->prepare("INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message_text]);

        // Check if insertion was successful
        if ($stmt->rowCount() > 0) {
            // Set success message in session
            $_SESSION['success_message'] = 'Mesaj başarıyla gönderildi!';
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $message = '<div class="alert alert-danger">Failed to send message. Please try again later.</div>';
        }
    }
}

// Display success message if it exists in session
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear session message
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
                                                Do I need a business plan?
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
                            <form id="contactForm" method="post" action="contact.php" onsubmit="return validateForm()">
                                <?php echo $message; ?>
                                <input class="name form-control" type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>">
                                <input class="email form-control" type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                                <input class="phone form-control" type="text" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($phone); ?>">
                                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message"><?php echo htmlspecialchars($message_text); ?></textarea>
                                <button type="submit" class="btn btn-primary">Send Message</button>
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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (isset($success_message)) : ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Show modal after form submission if there's a message
    $(document).ready(function() {
        <?php if (isset($success_message)) : ?>
            $('#messageModal').modal('show');
        <?php endif; ?>
    });

    // Function to validate form before submission
    function validateForm() {
        var name = document.getElementById('contactForm').elements['name'].value.trim();
        var email = document.getElementById('contactForm').elements['email'].value.trim();
        var phone = document.getElementById('contactForm').elements['phone'].value.trim();
        var message = document.getElementById('contactForm').elements['message'].value.trim();

        if (name === '' || email === '' || phone === '' || message === '') {
            $('#messageModal .modal-body').html('<div class="alert alert-danger">Tüm alanları doldurmalısınız.</div>');
            $('#messageModal').modal('show');
            return false;
        }
        return true;
    }
</script>

<?php
include('inc/footer.php');
?>
