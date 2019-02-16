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
            // TASK MASTER ACTIONS
            //--------------------------
            case 102: //--Add Task
                $response = TaskController::addTask($data);
                echo json_encode($response);
                // ResponseRouter::sendResponse(2006, $response);
                break;
            
            case 103: //--Edit AdminProfile
                $response = TaskController::updateTask($data);
                echo json_encode($response);
                break;
            
            case 104: //--Save Permissions
                $response = TaskController::savePermissions($data);
                echo json_encode($response);
                break;

            case 105: //--Update Permissions
                $response = TaskController::updatePermissions($data);
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
