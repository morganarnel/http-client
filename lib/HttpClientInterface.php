<?php
/*
 * iDimensionz/{http-client}
 * HttpClientInterface.php
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

namespace iDimensionz\HttpClient;

interface HttpClientInterface
{
    /**
     * Create a GET request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request.
     * @return HttpResponse
     */
    public function get($uri = null, $options = array());

    /**
     * Create a HEAD request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function head($uri = null, array $options = array());

    /**
     * Create a DELETE request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function delete($uri = null, array $options = array());

    /**
     * Create a PUT request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function put($uri = null, array $options = array());

    /**
     * Create a PATCH request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function patch($uri = null, array $options = array());

    /**
     * Create a POST request for the client
     *
     * @param string    $uri     Resource URI
     * @param array     $options Options to apply to the request
     *
     * @return HttpResponse
     */
    public function post($uri = null, array $options = array());
}
