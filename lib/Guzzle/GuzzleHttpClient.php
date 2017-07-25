<?php
/*
 * iDimensionz/{http-client}
 * GuzzleHttpClient.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2017 iDimensionz
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

use GuzzleHttp\Client;
use iDimensionz\HttpClient\HttpClientInterface;
use iDimensionz\HttpClient\HttpResponse;
use Psr\Http\Message\ResponseInterface;

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
     * @param array  $options Options to apply to the request.
     * @return HttpResponse
     */
    public function get($uri = null, $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->get($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a HEAD request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function head($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->head($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a DELETE request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function delete($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->delete($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a PUT request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function put($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->put($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a PATCH request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function patch($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->patch($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * Create a POST request for the client
     *
     * @param string $uri     Resource URI
     * @param array  $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function post($uri = null, array $options = array())
    {
        $guzzleRequestInterface = $this->getGuzzleClient()->post($uri, $options);

        return $this->createResponse($guzzleRequestInterface);
    }

    /**
     * @param ResponseInterface $responseInterface
     * @return HttpResponse
     */
    private function createResponse($responseInterface)
    {
        $statusCode = $responseInterface->getStatusCode();
        $body = $responseInterface->getBody();
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
