<?php

class JsonResponse {
    public static function send($data) {
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}
