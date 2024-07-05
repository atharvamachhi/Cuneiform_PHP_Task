<?php
$servername = "localhost:3307"; //my port no is 3307 u can set by yourself
$username = "root";
$password = "";
$dbname = "cuneiform_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $slug = $_POST['slug'];

    if ($id == '') {
        $stmt = $conn->prepare("INSERT INTO articles (title, description, category, slug) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $category, $slug);
    } else {
        $stmt = $conn->prepare("UPDATE articles SET title = ?, description = ?, category = ?, slug = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $title, $description, $category, $slug, $id);
    }
    $stmt->execute();
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        echo json_encode($item);
        $stmt->close();
    } else {
        $search = $_GET['search'] ?? '';
        $query = "SELECT * FROM articles WHERE title LIKE ? OR description LIKE ? OR category LIKE ? OR slug LIKE ?";
        $stmt = $conn->prepare($query);
        $likeSearch = "%$search%";
        $stmt->bind_param("ssss", $likeSearch, $likeSearch, $likeSearch, $likeSearch);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        echo json_encode($items);
        $stmt->close();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $deleteVars);
    $id = $deleteVars['id'];
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
