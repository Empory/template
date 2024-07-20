<?php
$sayfa = "Çalışanlar";
include('inc/head.php');
include('functions.php'); // Include the functions file

$con = $baglanti->prepare("SELECT * FROM calisanlar");
$con->execute();
$sonuc = $con->fetchAll();
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $sayfa ?></h1>
        
        <!-- Button to open the add new worker form -->
        <button class="btn btn-primary mb-3" id="addWorkerBtn">Yeni Çalışan Ekle</button>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Sıra</th>
                                <th>Aktif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($sonuc as $row){ ?>
                                <tr id="row-<?php echo $row['id']; ?>">
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['img'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['position'];?></td>
                                    <td><?php echo $row['sira'];?></td>
                                    <td class="status-<?php echo $row['id']; ?>">
                                        <?php echo $row['aktif'] ? 'Aktif' : 'Pasif'; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning edit-button" data-id="<?php echo $row['id']; ?>" data-action="edit_worker">Düzenle</button>
                                        <button class="btn btn-danger toggle-button" data-id="<?php echo $row['id']; ?>" data-action="toggle_worker_status">
                                            <?php echo $row['aktif'] ? 'Pasif yap' : 'Aktif et'; ?>
                                        </button>
                                        <button class="btn btn-danger delete-button" data-id="<?php echo $row['id']; ?>" data-action="delete_worker">Sil</button>
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

<!-- Add New Worker Modal -->
<div id="addWorkerModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Çalışan Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addWorkerForm">
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="text" class="form-control" id="img" name="img" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="sira" class="form-label">Sıra</label>
                        <input type="number" class="form-control" id="sira" name="sira" required>
                    </div>
                    <div class="mb-3">
                        <label for="aktif" class="form-label">Aktif</label>
                        <select class="form-select" id="aktif" name="aktif" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Worker Modal -->
<div id="editWorkerModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Düzenle Çalışan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editWorkerForm">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editImg" class="form-label">Image</label>
                        <input type="text" class="form-control" id="editImg" name="img" required>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPosition" class="form-label">Position</label>
                        <input type="text" class="form-control" id="editPosition" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSira" class="form-label">Sıra</label>
                        <input type="number" class="form-control" id="editSira" name="sira" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAktif" class="form-label">Aktif</label>
                        <select class="form-select" id="editAktif" name="aktif" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- For modal functionality -->

<script>
$(document).ready(function(){
    // Toggle Worker Status
    $('.toggle-button').on('click', function(){
        var id = $(this).data('id');
        var action = $(this).data('action');
        var button = $(this);

        $.ajax({
            url: 'functions.php',
            type: 'POST',
            data: { 
                action: action,
                id: id
            },
            success: function(response){
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        var statusText = jsonResponse.data.aktif ? 'Aktif' : 'Pasif';
                        var buttonText = jsonResponse.data.aktif ? 'Pasif yap' : 'Aktif et';
                        $('.status-' + id).text(statusText);
                        button.text(buttonText);
                    } else {
                        console.error('Server response error:', jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Parsing error:', e);
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Show Add Worker Modal
    $('#addWorkerBtn').on('click', function(){
        $('#addWorkerModal').modal('show');
    });

    // Handle Add Worker Form Submission
    $('#addWorkerForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'functions.php',
            type: 'POST',
            data: $(this).serialize() + '&action=add_worker',
            success: function(response){
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        location.reload(); // Reload page to see the new worker
                    } else {
                        console.error('Add worker error:', jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Parsing error:', e);
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Show Edit Worker Modal
    $('.edit-button').on('click', function(){
        var id = $(this).data('id');
        $.ajax({
            url: 'functions.php',
            type: 'POST',
            data: { action: 'get_worker', id: id },
            success: function(response){
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        var worker = jsonResponse.data;
                        $('#editId').val(worker.id);
                        $('#editImg').val(worker.img);
                        $('#editName').val(worker.name);
                        $('#editPosition').val(worker.position);
                        $('#editSira').val(worker.sira);
                        $('#editAktif').val(worker.aktif);
                        $('#editWorkerModal').modal('show');
                    } else {
                        console.error('Get worker error:', jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Parsing error:', e);
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle Edit Worker Form Submission
    $('#editWorkerForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'functions.php',
            type: 'POST',
            data: $(this).serialize() + '&action=update_worker',
            success: function(response){
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        location.reload(); // Reload page to see the updated worker
                    } else {
                        console.error('Update worker error:', jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Parsing error:', e);
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', status, error);
            }
        });
    });
        // Handle Delete Worker
        $(document).on('click', '.delete-button', function(){
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this worker?')) {
            $.ajax({
                url: 'functions.php',
                type: 'POST',
                data: { action: 'delete_worker', id: id },
                success: function(response){
                    try {
                        var jsonResponse = JSON.parse(response);
                        if (jsonResponse.status === 'success') {
                            $('#row-' + id).remove(); // Remove the row from the table
                        } else {
                            console.error('Delete worker error:', jsonResponse.message);
                        }
                    } catch (e) {
                        console.error('Parsing error:', e);
                    }
                },
                error: function(xhr, status, error){
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    });

});

</script>

<?php include('inc/footer.php') ?>
