<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'connection.php';

try {
    $db = new PDODatabase();
} catch (Exception $e) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

$route = isset($_GET['route']) ? $_GET['route'] : '';
$method = $_SERVER['REQUEST_METHOD'];
$body = json_decode(file_get_contents("php://input"), true);

try {
    switch ($route) {
        case 'admin-login':
            $username = $body['username'] ?? '';
            $password = $body['password'] ?? '';
            $stmt = $db->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($admin && $password === $admin['password']) {
                echo json_encode(["success" => true, "admin_id" => $admin['admin_id']]);
            } else {
                echo json_encode(["success" => false]);
            }
            break;

        case 'login':
            $username = $body['username'] ?? '';
            $password = $body['password'] ?? '';
            $stmt = $db->prepare("SELECT * FROM customers WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                echo json_encode(["success" => true, "customer_id" => $user['customer_id']]);
            } else {
                echo json_encode(["success" => false]);
            }
            break;

        case 'signup':
            $hash = password_hash($body['password'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO customers (customer_name, contact_number, email, username, password) VALUES (?, ?, ?, ?, ?)";
            $db->prepare($sql)->execute([$body['customer_name'], $body['contact_number'], $body['email'], $body['username'], $hash]);
            echo json_encode(["message" => "Account Created"]);
            break;

        case 'services':
            echo json_encode($db->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'barbers':
            echo json_encode($db->query("SELECT * FROM barbers")->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'hairstyles':
            echo json_encode($db->query("SELECT * FROM hairstyles")->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'queue':
            $sql = "SELECT q.queue_id, q.queue_number, q.customer_id, c.customer_name, s.service_name, h.hairstyle_name, q.barber_id, b.barber_name, q.status, r.rating_id as is_rated 
                    FROM queue q 
                    JOIN customers c ON q.customer_id=c.customer_id 
                    JOIN services s ON q.service_id=s.service_id 
                    JOIN barbers b ON q.barber_id=b.barber_id 
                    LEFT JOIN hairstyles h ON q.hairstyle_id=h.hairstyle_id 
                    LEFT JOIN ratings r ON q.queue_id = r.queue_id 
                    ORDER BY q.queue_number ASC";
            echo json_encode($db->query($sql)->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'add-queue':
            $row = $db->query("SELECT MAX(queue_number) as max FROM queue")->fetch(PDO::FETCH_ASSOC);
            $queueNumber = ($row['max'] ? $row['max'] : 0) + 1;
            $sql = "INSERT INTO queue (customer_id, service_id, barber_id, hairstyle_id, queue_number) VALUES (?, ?, ?, ?, ?)";
            $hairId = !empty($body['hairstyle_id']) ? $body['hairstyle_id'] : null;
            $db->prepare($sql)->execute([$body['customer_id'], $body['service_id'], $body['barber_id'], $hairId, $queueNumber]);
            echo json_encode(["message" => "Added to Queue"]);
            break;

        case 'add-rating':
            $sql = "INSERT INTO ratings (queue_id, rating, comment) VALUES (?, ?, ?)";
            $db->prepare($sql)->execute([$body['queue_id'], $body['rating'], $body['comment']]);
            echo json_encode(["message" => "Rating submitted"]);
            break;

        case 'admin-data':
            if ($method === 'GET') {
                if (isset($_GET['action']) && $_GET['action'] === 'get_all') {
                    echo json_encode([
                        "barbers" => $db->query('SELECT * FROM barbers')->fetchAll(PDO::FETCH_ASSOC),
                        "services" => $db->query('SELECT * FROM services')->fetchAll(PDO::FETCH_ASSOC),
                        "hairstyles" => $db->query('SELECT * FROM hairstyles')->fetchAll(PDO::FETCH_ASSOC),
                        "customers" => $db->query('SELECT * FROM customers')->fetchAll(PDO::FETCH_ASSOC),
                        "queue" => $db->query('SELECT * FROM queue')->fetchAll(PDO::FETCH_ASSOC),
                        "ratings" => $db->query('SELECT r.*, c.customer_name, b.barber_name FROM ratings r JOIN queue q ON r.queue_id = q.queue_id JOIN customers c ON q.customer_id = c.customer_id JOIN barbers b ON q.barber_id = b.barber_id ORDER BY r.created_at DESC')->fetchAll(PDO::FETCH_ASSOC)
                    ]);
                } else {
                    echo json_encode(["message" => "API is running"]);
                }
            } elseif ($method === 'POST') {
                $action = $body['action'] ?? '';
                if ($action === 'add_barber') {
                    $db->prepare('INSERT INTO barbers (barber_name, status, image) VALUES (?, ?, ?)')->execute([$body['name'], $body['status'], $body['image']]);
                } elseif ($action === 'add_hairstyle') {
                    $db->prepare('INSERT INTO hairstyles (hairstyle_name, description, image) VALUES (?, ?, ?)')->execute([$body['name'], $body['desc'], $body['image']]);
                } elseif ($action === 'add_customer') {
                    $hash = password_hash($body['password'], PASSWORD_BCRYPT);
                    $db->prepare('INSERT INTO customers (customer_name, contact_number, email, username, password) VALUES (?, ?, ?, ?, ?)')->execute([$body['name'], $body['contact'], $body['email'], $body['username'], $hash]);
                } elseif ($action === 'add_queue') {
                    $nextNum = $db->query('SELECT COALESCE(MAX(queue_number), 0) + 1 AS nextNum FROM queue')->fetch(PDO::FETCH_ASSOC)['nextNum'];
                    $hairId = !empty($body['hairId']) ? $body['hairId'] : null;
                    $db->prepare('INSERT INTO queue (customer_id, service_id, barber_id, hairstyle_id, queue_number) VALUES (?, ?, ?, ?, ?)')->execute([$body['custId'], $body['svcId'], $body['barberId'], $hairId, $nextNum]);
                } elseif ($action === 'update_queue_status') {
                    $db->prepare('UPDATE queue SET status = ? WHERE queue_id = ?')->execute([$body['status'], $body['id']]);
                } elseif ($action === 'delete_queue') {
                    $db->prepare('DELETE FROM queue WHERE queue_id = ?')->execute([$body['id']]);
                } elseif ($action === 'toggle_barber') {
                    $db->prepare('UPDATE barbers SET status = ? WHERE barber_id = ?')->execute([$body['status'], $body['id']]);
                } elseif ($action === 'delete_barber') {
					$barberId = $body['id'];
					
				
					$db->prepare("DELETE FROM ratings WHERE queue_id IN (SELECT queue_id FROM queue WHERE barber_id = ?)")
					   ->execute([$barberId]);
					
					
					$db->prepare("DELETE FROM queue WHERE barber_id = ?")
					   ->execute([$barberId]);
					
					
					$db->prepare('DELETE FROM barbers WHERE barber_id = ?')->execute([$barberId]);
					
					echo json_encode(["success" => true]);
                } elseif ($action === 'add_service') {
                    $db->prepare('INSERT INTO services (service_name, price, duration_minutes) VALUES (?, ?, ?)')->execute([$body['name'], $body['price'], $body['duration']]);
                } elseif ($action === 'edit_service') {
                    $db->prepare('UPDATE services SET service_name = ?, price = ?, duration_minutes = ? WHERE service_id = ?')->execute([$body['name'], $body['price'], $body['duration'], $body['id']]);
                } elseif ($action === 'delete_service') {
                    $db->prepare('DELETE FROM services WHERE service_id = ?')->execute([$body['id']]);
                } elseif ($action === 'delete_hairstyle') {
                    $db->prepare('DELETE FROM hairstyles WHERE hairstyle_id = ?')->execute([$body['id']]);
                } elseif ($action === 'delete_customer') {
                    $db->prepare('DELETE FROM customers WHERE customer_id = ?')->execute([$body['id']]);
                } elseif ($action === 'delete_rating') {
                    $db->prepare('DELETE FROM ratings WHERE rating_id = ?')->execute([$body['id']]);
                }
                echo json_encode(["success" => true]);
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(["error" => "Endpoint not found"]);
            break;
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>