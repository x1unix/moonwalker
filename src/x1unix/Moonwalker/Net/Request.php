<?php
namespace x1unix\Moonwalker\Net;

class Request
{
    private $url;
    private $headers = array();
    private $client = null;
    private $status = 0;

    /**
     * MoonwalkRequest constructor.
     * @param string $url URL
     * @param string $cookies Cookies
     * @param array $headers Additional Headers
     */
    public function __construct($url, $headers=array(), \GuzzleHttp\Client $client=null)
    {
        $this->headers = array_merge(Headers::getDefaultHeaders(), $headers);

        $this->url = $url;

        if ($client === null) {
            $this->client = Request::getDefaultGuzzleClient();
        } else {
            $this->client = $client;
        }
    }

    /**
     * Send GET Request
     * @return Response
     */
    public function get() {
        return new Response($this->client->request('GET', $this->url));
    }

    /**
     * Get original Guzzle Client
     * @return \GuzzleHttp\Client|null
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Set Guzzle Client
     * @param \GuzzleHttp\Client $client
     * @return $this
     */
    public function setClient(\GuzzleHttp\Client $client) {
        $this->client = $client;
        return $this;
    }

    /**
     * Get HTTP Response Status Code
     * @return int
     */
    public function getCode() {
        return $this->status;
    }

    /**
     * Get Request URL
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set Request URL
     * @param $url
     * @return $this
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * Is Request Was Successful
     * @return bool
     */
    public function isSuccessful() {
        return ($this->status >=200) && ($this->status < 400);
    }

    private static $defaultClient = null;
    public static function getDefaultGuzzleClient() {
        if (self::$defaultClient === null) {
            self::$defaultClient = new \GuzzleHttp\Client(array(
                'headers' => Headers::getDefaultHeaders(),
                'cookies' => true
            ));
        }

        return self::$defaultClient;
    }

}