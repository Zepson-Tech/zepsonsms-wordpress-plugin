<?php

namespace ZepsonSms\SDK;

use GuzzleHttp\Client;
use InvalidArgumentException;

/**
 * Class ZepsonSms
 * @package ZepsonSms\SDK
 * @author  Alpha Olomi <hello@alphaolomi.com>
 *
 */
class ZepsonSms
{
    protected array $options;

    protected Client $httpClient;

    /**
     * ZepsonSms constructor.
     *
     * @param array $options
     * @param Client|null $httpClient
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $options = [], ?Client $httpClient = null)
    {
        if (! array_key_exists('apiKey', $options)) {
            throw new InvalidArgumentException("apiKey is required.");
        }

        if (! array_key_exists('environment', $options)) {
            $options['environment'] = 'testing';
        }
        $this->options = $options;
        $this->httpClient = $this->makeClient($options, $httpClient);
    }

    protected function makeClient(array $options, ?Client $client = null): Client
    {
        return ($client instanceof Client) ? $client : new Client([
            'base_uri' => 'https://portal.zepsonsms.co.tz/api/v3/',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer " . $options['apiKey'],
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Set HTTP Client
     * @param Client $client
     * @return $this
     * @throws InvalidCredentialsException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setHttpClient(Client $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * @var string
     * @access public
     * @return mixed
     *  @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendSms(array $data)
    {
         
        if (! isset($data['message']) && ! isset($data['recipient'])) {
            throw new \InvalidArgumentException('Missing parameter: message or recipient');
        }
        $response = $this->httpClient->post('sms/send', ['json' => $data]);

        print_r($response->getBody()->getContents());
        
        return json_decode((string)$response->getBody(), true);
    }
}
