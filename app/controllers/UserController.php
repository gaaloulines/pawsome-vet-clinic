<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function register() {
        $data = json_decode(file_get_contents("php://input"), true);
    
        if (!isset($data['username'], $data['email'], $data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "All fields are required."]);
            return;
        }
    
        $result = User::add(
            htmlspecialchars($data['username']),
            htmlspecialchars($data['email']),
            htmlspecialchars($data['password']), // No hashing
            'client'
        );
    
        if ($result) {
            http_response_code(201);
            echo json_encode(["message" => "User registered successfully."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to register user."]);
        }
    }
    
    

    public function login() {
        $data = json_decode(file_get_contents("php://input"), true);
    
        if (!isset($data['username'], $data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Username and password are required."]);
            return;
        }
    
        $user = User::findByUsername(htmlspecialchars($data['username']));
    
        if ($user) {
            error_log("Stored Password: " . $user['password']);
            error_log("Provided Password: " . $data['password']);
        }
    
        if ($user && $data['password'] === $user['password']) { // Plain-text comparison
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
    
            http_response_code(200);
            echo json_encode(["message" => "Login successful.", "role" => $user['role']]);
        } else {
            http_response_code(401);
            echo json_encode(["message" => "Invalid username or password."]);
        }
    }
    
    

    public function logout() {
        session_start();
        session_destroy();
        http_response_code(200);
        echo json_encode(["message" => "Logged out successfully."]);
    }
}
