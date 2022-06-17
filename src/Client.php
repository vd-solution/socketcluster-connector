<?php

namespace SocketclusterConnector;

class Client {
  public static function publish($apiKey, $channel, $payload) {
    $client = new \GuzzleHttp\Client([
      'headers' => [ 'Content-Type' => 'application/json' ]
    ]);
    $response = $client->post('https://socket.aasatech.asia/publish',
      ['body' => json_encode(
        [
            'token' => $apiKey,
            'channel' => $channel,
            'payload' => $payload
        ]
      )]
    );
    return $response;
  }
}
