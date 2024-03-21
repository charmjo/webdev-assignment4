<?php

// this is my fake router... 
require 'config/config.php';
require 'classes/classes.php';

if($_POST) {
    $action = $_POST["action"];

    // FIXME: add a general response variable:
    // TODO: Add the validation
    switch ($action) {
        case 'login':
            $login = new Login();
            $response = $login->loginUser($_POST['login-email'], $_POST['login-password']);
            if ($response) {
                $error = false;
                header('Location: order-list.php');
                exit();
            } else {
                $error = true;
            }
            break;
            
        case 'manager-add':
            $formData = [];
            parse_str($_REQUEST['formData'], $formData);
            $manager = new StoreManager();
            $result = $manager->addManager($formData['fname'], $formData['lname'], $formData['email'], $formData['password']);
            if ($result) {
                $response = ["response" => "success"]; 
            } else {
                $response = ["response" => "failed"];
            }
            echo json_encode($response);
            break;
            
        case 'manager-retrieve':
            $manager = new StoreManager();
            echo json_encode($manager->getUserList());
            break;
            
        case 'order-add':
            $formData = [];
            parse_str($_REQUEST['formData'], $formData);
            $order = new Orders();
            $result = $order->processOrder($formData);
            if ($result) {
                $response = ["response" => "success", "data" => $result]; 
            } else {
                $response = ["response" => "failed"];
            }
            echo json_encode($response);
            break;
            
        case 'order-retrieve':
            $order = new Orders();
            echo json_encode($order->getOrdersList());
            break;
            
        default:
            // Handle default case if needed
            break;
    }
    
}




