<?php

namespace App\Services;

use GuzzleHttp\Client;

class FCMService
{
    protected $client;
    protected $projectId;
    protected $authKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->projectId = 'lawyer-2dc44';
        $this->authKey = 'AIzaSyAerAMfZ0yyHAngnYFx-UivOv1hJtVjECU';
    }

    public function sendMulticastMessage(array $registrationTokens, string $title, string $body)
    {
        $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

        $headers = [
            'Authorization' => 'Bearer ' . $this->authKey,
            'Content-Type' => 'application/json'
        ];

        $message = [
            'message' => [
                'notification' => [
                    'title' => $title,
                    'body' => $body
                ],
                'tokens' => $registrationTokens
            ]
        ];

        try {
            $response = $this->client->post($url, [
                'headers' => $headers,
                'json' => $message
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
