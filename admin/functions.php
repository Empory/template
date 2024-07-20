<?php
include_once __DIR__ . '/../inc/db.php'; // Ensure the database connection is included

// Ensure the response is JSON

// Function to delete a contact
function deleteContact($id) {
    global $baglanti; // Use the global $baglanti variable
    $con = $baglanti->prepare("DELETE FROM contact WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    if ($con->execute()) {
        return 'success'; // Return a success message
    } else {
        return 'error'; // Return an error message if something went wrong
    }
}
function deleteWorker($id) {
    global $baglanti; // Use the global $baglanti variable
    $con = $baglanti->prepare("DELETE FROM calisanlar WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    if ($con->execute()) {
        return json_encode(['status' => 'success']); // Return success response
    } else {
        return json_encode(['status' => 'error', 'message' => 'Could not delete worker']); // Return error response
    }
}

// Function to toggle worker status
function toggleWorkerStatus($id) {
    global $baglanti; // Use the global $baglanti variable
    // Fetch current status
    $con = $baglanti->prepare("SELECT aktif FROM calisanlar WHERE id = :id");
    $con->bindParam(':id', $id, PDO::PARAM_INT);
    $con->execute();
    $result = $con->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $newStatus = $result['aktif'] == 1 ? 0 : 1; // Toggle status
        $update = $baglanti->prepare("UPDATE calisanlar SET aktif = :aktif WHERE id = :id");
        $update->bindParam(':aktif', $newStatus, PDO::PARAM_INT);
        $update->bindParam(':id', $id, PDO::PARAM_INT);
        if ($update->execute()) {
            return $newStatus; // Return the new status
        } else {
            return 'error'; // Return an error message if update fails
        }
    } else {
        return 'error'; // Return an error message if worker not found
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add_worker') {
        $img = $_POST['img'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $sira = $_POST['sira'];
        $aktif = $_POST['aktif'];

        $stmt = $baglanti->prepare("INSERT INTO calisanlar (img, name, position, sira, aktif) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$img, $name, $position, $sira, $aktif])) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not add worker']);
        }
    }

    if ($action === 'update_worker') {
        $id = $_POST['id'];
        $img = $_POST['img'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $sira = $_POST['sira'];
        $aktif = $_POST['aktif'];

        $stmt = $baglanti->prepare("UPDATE calisanlar SET img = ?, name = ?, position = ?, sira = ?, aktif = ? WHERE id = ?");
        if ($stmt->execute([$img, $name, $position, $sira, $aktif, $id])) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not update worker']);
        }
    }

    if ($action === 'get_worker') {
        $id = $_POST['id'];
        $stmt = $baglanti->prepare("SELECT * FROM calisanlar WHERE id = ?");
        $stmt->execute([$id]);
        $worker = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($worker) {
            echo json_encode(['status' => 'success', 'data' => $worker]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Worker not found']);
        }
    }
    if ($action === 'delete_worker') {
        $id = $_POST['id'];
        echo deleteWorker($id); // Call the delete function
    }
}
?>
