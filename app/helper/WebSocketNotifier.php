<?php

class WebSocketNotifier {

    public static function notify($channel) {
        // trigger ke websocket server
        file_get_contents("http://localhost:8080/notify?channel=$channel");
    }
}
