<?php
$sayfa = "İletişim";
include('inc/head.php');

$con = $baglanti->prepare("SELECT * FROM contact");
$con->execute();
$sonuc = $con->fetchAll();
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $sayfa ?></h1>
        
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($sonuc as $row){ ?>
                                <tr id="row-<?php echo $row['id']; ?>">
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['message'];?></td>
                                    <td>
                                        <button class="btn btn-danger delete-button" data-id="<?php echo $row['id']; ?>">Sil</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('.delete-button').on('click', function(){
        if(confirm('Silmek istediğinizden emin misiniz?')){
            var id = $(this).data('id');
            $.ajax({
                url: 'delete_contact.php',
                type: 'POST',
                data: { id: id },
                success: function(response){
                    if(response.trim() === 'success'){
                        $('#row-' + id).remove();
                    } else {
                        alert('Silme işlemi başarısız oldu.');
                    }
                },
                error: function(xhr, status, error){
                    console.error('AJAX Error:', status, error);
                    alert('Bir hata oluştu.');
                }
            });
        }
    });
});
</script>

<?php include('inc/footer.php') ?>
