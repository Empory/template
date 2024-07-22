<?php

include_once __DIR__ . '/../inc/db.php';

function deleteContact($id) {
    global $baglanti;
    $con = $baglanti->prepare("DELETE FROM contact WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    if ($con->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not delete contact']);
    }
}

function deleteWorker($id) {
    global $baglanti;
    $con = $baglanti->prepare("DELETE FROM calisanlar WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    if ($con->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not delete worker']);
    }
}

function getWorker($id) {
    global $baglanti;
    $con = $baglanti->prepare("SELECT * FROM calisanlar WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    $con->execute();
    return $con->fetch(PDO::FETCH_ASSOC);
}
function toggleWorkerStatus($id) {
    global $baglanti;
    
    // Fetch the current status
    $con = $baglanti->prepare("SELECT aktif FROM calisanlar WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    $con->execute();
    $worker = $con->fetch(PDO::FETCH_ASSOC);

    if ($worker) {
        $newStatus = $worker['aktif'] ? 0 : 1;
        $update = $baglanti->prepare("UPDATE calisanlar SET aktif = :aktif WHERE id = :id");
        $update->bindParam(':aktif', $newStatus, PDO::PARAM_INT);
        $update->bindParam(':id', $id, PDO::PARAM_INT);

        if ($update->execute()) {
            echo json_encode(['status' => 'success', 'data' => ['aktif' => $newStatus]]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not update worker status']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Worker not found']);
    }
    exit;
}

function uploadImage($file) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if ($file["size"] > 5000000) {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }
}

function addWorker($data, $file) {
    global $baglanti;
    $imgPath = uploadImage($file);
    if ($imgPath) {
        $con = $baglanti->prepare("INSERT INTO calisanlar (img, name, position, sira, aktif) VALUES (:img, :name, :position, :sira, :aktif)");
        $con->bindParam(':img', $imgPath, PDO::PARAM_STR);
        $con->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $con->bindParam(':position', $data['position'], PDO::PARAM_STR);
        $con->bindParam(':sira', $data['sira'], PDO::PARAM_INT);
        $con->bindParam(':aktif', $data['aktif'], PDO::PARAM_INT);
        if ($con->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not add worker']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
    }
    exit; // Make sure no additional output is sent
}


function updateWorker($data, $file) {
    global $baglanti;
    $imgPath = uploadImage($file);
    if ($imgPath) {
        $con = $baglanti->prepare("UPDATE calisanlar SET img = :img, name = :name, position = :position, sira = :sira, aktif = :aktif WHERE id = :id");
        $con->bindParam(':img', $imgPath, PDO::PARAM_STR);
        $con->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $con->bindParam(':position', $data['position'], PDO::PARAM_STR);
        $con->bindParam(':sira', $data['sira'], PDO::PARAM_INT);
        $con->bindParam(':aktif', $data['aktif'], PDO::PARAM_INT);
        $con->bindParam(':id', $data['id'], PDO::PARAM_INT);
        if ($con->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not update worker']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
    }
    exit; // Make sure no additional output is sent
}

// Your existing PHP code...

// Handle AJAX requests
if (isset($_POST['action'])) {
    $response = ['status' => 'error', 'message' => 'Invalid action'];

    switch ($_POST['action']) {
        case 'delete_contact':
            if (isset($_POST['id'])) {
                deleteContact($_POST['id']);
                $response = ['status' => 'success'];
            }
            break;
        case 'delete_worker':
            if (isset($_POST['id'])) {
                deleteWorker($_POST['id']);
                $response = ['status' => 'success'];
            }
            break;
        case 'toggle_worker_status':
            if (isset($_POST['id'])) {
                toggleWorkerStatus($_POST['id']);
                $response = ['status' => 'success'];
            }
            break;
        case 'add_worker':
            if (isset($_FILES['img'])) {
                addWorker($_POST, $_FILES['img']);
                $response = ['status' => 'success'];
            }
            break;
        case 'update_worker':
            if (isset($_FILES['img'])) {
                updateWorker($_POST, $_FILES['img']);
                $response = ['status' => 'success'];
            }
            break;
        case 'get_worker':
            if (isset($_POST['id'])) {
                $worker = getWorker($_POST['id']);
                if ($worker) {
                    $response = ['status' => 'success', 'data' => $worker];
                } else {
                    $response = ['status' => 'error', 'message' => 'Worker not found'];
                }
            }
            break;
    }

    echo json_encode($response);
    exit; // Ensure no further output is sent
}

?>
