<?php

namespace zerolfc\eventbrite;

/**
 * Http client used to perform requests on Eventbrite API.
 * @doc https://www.eventbrite.co.uk/developer/v3/
 */
class HttpClient
{

    protected $token;

    const EVENTBRITE_APIv3_BASE = "https://www.eventbriteapi.com/v3";

    /**
     * Constructor.
     *
     * @param string $token the user's auth token.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function get($path, $data = [])
    {
        return $this->request($path, $data, [], $httpMethod = 'GET');
    }

    public function post($path, $data = [])
    {
        return $this->request($path, $data, [], $httpMethod = 'POST');
    }

    public function delete($path, $data = [])
    {
        return $this->request($path, $data, [], $httpMethod = 'DELETE');
    }

    public function request($path, $body, $httpMethod = 'GET')
    {

        $httpOptions = [
            'method' => $httpMethod,
            'header' => "content-type: application/json\r\n",
            'ignore_errors' => true,
        ];

        if ($body) {
            $httpOptions['content'] = json_encode($body);
        }

        // I think this is the only header we need.  If there is a need
        // to pass more headers to the request, we could add a parameter
        // called headers to this function and combine whatever headers are passed
        // in with this header.
        $options = [
            'http' => $httpOptions,
        ];

        $url = self::EVENTBRITE_APIv3_BASE . $path . '?token=' . $this->token;


        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);
        /* this is where we will handle connection errors. Eventbrite errors are a part of the response payload. We return errors as an associative array. */
        $response = json_decode($result, true);

        if ($response == null) {
            $response = [];
        }

        $response['response_headers'] = $http_response_header;

        return $response;

    }
}
