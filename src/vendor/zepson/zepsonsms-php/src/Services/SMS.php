<?php

namespace ZepsonSms\SDK\Services;

/**
 * SMS Service
 */
trait SMS
{
    /**
     * Send SMS
     * @param array $data
     * @return mixed
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ZepsonSms\Exception\InvalidRequestException
     * @throws \ZepsonSms\Exception\InvalidResponseException
     * @throws \ZepsonSms\Exception\ServiceUnavailableException
     * @throws \ZepsonSms\Exception\UnauthorizedException
     * @throws \ZepsonSms\Exception\UnknownException
     * @throws \ZepsonSms\Exception\InvalidCredentialsException
     * @throws \ZepsonSms\Exception\InvalidSenderException
     * @throws \ZepsonSms\Exception\InvalidRecipientException
     * @throws \ZepsonSms\Exception\InvalidMessageException
     * @throws \ZepsonSms\Exception\InvalidPhoneNumberException
     * @throws \ZepsonSms\Exception\InvalidCountryCodeException
     * @throws \ZepsonSms\Exception\InvalidNumberOfDigitsException
     * @throws \ZepsonSms\Exception\InvalidMessageLengthException
     * @throws \ZepsonSms\Exception\InvalidMessageTypeException
     * @throws \ZepsonSms\Exception\InvalidMessageEncodingException
     * @throws \ZepsonSms\Exception\InvalidMessageValidityPeriodException
     * @throws \ZepsonSms\Exception\InvalidMessagePriorityException
     * @throws \ZepsonSms\Exception\InvalidMessageClassException
     * @throws \ZepsonSms\Exception\InvalidMessageSenderNameException
     * @throws \ZepsonSms\Exception\InvalidMessageSenderAddressException
     * @throws \ZepsonSms\Exception\InvalidMessageSenderCityException
     * @throws \ZepsonSms\Exception\InvalidMessageSenderStateException
     * @throws \ZepsonSms\Exception\InvalidMessageSenderPostalCodeException
     *
     * @link https://www.zepzon.com/docs/sms-api/send-sms-api-endpoint/
     */
    public function sendSMS(array $data)
    {
        print_r($data);
        $data['sender_id'] = $this->getSender();
        $data['recipient'] = $this->getRecipient();
        $data['message'] = $this->getMessage();
        $data['countryCode'] = $this->getCountryCode();
        $data['numberOfDigits'] = $this->getNumberOfDigits();

        $response = $this->request('POST', 'sms', $data);

        return $response;
    }
}
