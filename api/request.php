<?php   
    include "controllers/Controllers.php";

    $method = $_SERVER['REQUEST_METHOD'];
    header('Content-Type: application/json');
    
    if ($method == "POST") {
        $input  = json_decode(file_get_contents('php://input'), true);
        $action = (int) $input["action"];   
        $data   = (isset($input["data"])) ? $input["data"] : null;

        switch ($action) {

            //--------------------------
            // AUTH ACTIONS
            //--------------------------
            case 100: // login
                $response = AuthController::loginStudent($data);
                echo json_encode($response);
                break;

            //--------------------------
            // REGISTERATION ACTIONS
            //--------------------------
            case 101: //--Register User
                $response = StudentController::registerStudent($data);
                echo json_encode($response);
                break;

            default: // unknown action
                // ResponseRouter::sendResponse(1003);
                $response["status"] = 404;
                $response["message"] = "Invalid Action Token";
                $json_response = json_encode($response);
                http_response_code(404);
                echo $json_response;
                break;

        }
    }





 ?>
