<?php

namespace SocketConnector;

class Client {
  public static function publish($apiKey, $channel, $payload) {
    $client = new \GuzzleHttp\Client([
      'headers' => [ 'Content-Type' => 'application/json' ]
    ]);

    try {
      $response = $client->post('https://socket.aasatech.asia/publish',
        ['body' => json_encode(
          [
              'token' => $apiKey,
              'channel' => $channel,
              'payload' => $payload
          ]
        )]
      );
      return [$response->getStatusCode(), json_decode($response->getBody()->getContents())];
    } catch (GuzzleHttp\Exception\ClientException $e) {
      $response = $e->getResponse();
      return [$response->getStatusCode(), json_decode($response->getBody()->getContents())];
    }
  }
}
