<?php
/*
 * iDimensionz/{linode-api-v4}
 * GuzzleHttpClient.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 iDimensionz
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
*/

namespace iDimensionz\HttpClient\Guzzle;

use Guzzle\Http\Client;
use Guzzle\Http\Message\RequestInterface;
use iDimensionz\HttpClient\HttpClientInterface;
use iDimensionz\HttpClient\HttpResponse;

/**
 * Class GuzzleHttpClient wrapper for Guzzle 6.3.
 * @package iDimensionz\HttpClient\Guzzle
 */
class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $guzzleClient;

    /**
     * Create a GET request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param array  $options Options to apply to the request.
     * @return HttpResponse
     */
    public function get($uri = null, $headers = null, $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->get($uri, $headers, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a HEAD request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function head($uri = null, $headers = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->head($uri, $headers, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a DELETE request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param string $body    Body to send in the request
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function delete($uri = null, $headers = null, $body = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->delete($uri, $headers, $body, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a PUT request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param string $body    Body to send in the request
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function put($uri = null, $headers = null, $body = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->put($uri, $headers, $body, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a PATCH request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param string $body    Body to send in the request
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function patch($uri = null, $headers = null, $body = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->patch($uri, $headers, $body, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a POST request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $headers HTTP headers
     * @param string $body    Body to send in the request
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function post($uri = null, $headers = null, $body = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->post($uri, $headers, $body, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create an OPTIONS request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function options($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->options($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * @param RequestInterface $guzzleRequestInterface
     * @return HttpResponse
     */
    private function createResponse($guzzleRequestInterface)
    {
        $statusCode = $guzzleRequestInterface->getResponse()->getStatusCode();
        $body = $guzzleRequestInterface->getResponse()->getBody();
        $response = new HttpResponse($statusCode, $body);

        return $response;
    }

    /** Getters and Setters */


    /**
     * @return Client
     */
    public function getGuzzleClient()
    {
        if (is_null($this->guzzleClient)) {
            $this->guzzleClient = new Client();
        }

        return $this->guzzleClient;
    }

    /**
     * @param Client $guzzleClient
     */
    public function setGuzzleClient($guzzleClient = null)
    {
        if (!is_null($guzzleClient) && !$guzzleClient instanceof Client) {
            throw new \InvalidArgumentException(
                __METHOD__ . '/guzzleClient parameter must be null or an instance of Guzzle/Http/Client'
            );
        }
        $this->guzzleClient = $guzzleClient;
    }
}
