<?php

namespace MGierus\CurrencyConventer\Helper;

use Magento\Framework\App\Helper\Context;

/**
 * Class Api
 *
 * @package MGierus\CurrencyConventer\Helper
 */
class Api extends \Magento\Framework\App\Helper\AbstractHelper
{

    CONST API_ENDPOINT = 'https://forex.1forge.com/1.0.3/convert';
    CONST API_KEY = 'nmQLSuofYWYQ6JHS91Me9ipFsQUMlAXZ';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $_client;

    /**
     * @var \MGierus\CurrencyConventer\Helper\Data
     */
    protected $_helper;

    /**
     * Api constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \GuzzleHttp\Client                    $client
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \GuzzleHttp\Client $client,
        \MGierus\CurrencyConventer\Helper\Data $helper
    )
    {
        $this->_helper = $helper;
        $this->_client = $client;
        parent::__construct($context);
    }

    /**
     * Api call function
     *
     * @param $url
     * @return string
     */
    protected function call($url)
    {
        return $this->_client->get($url)->getBody()->getContents();
    }

    /**
     * Prepare Url to be called
     *
     *
     * @param $params
     * @return string
     */
    protected function prepareUrl($params){
        $query = [
            'from'=>'RUB',
            'to'=>'PLN',
            'quantity'=>$this->_helper->formatToFloatNumber($params),
            'api_key'=>self::API_KEY
        ];

        return  http_build_query($query);
    }

    /**
     * Call Api to convert given currencies
     * 
     * @param $data
     * @return string
     */
    public function convert($data){
        $url = self::API_ENDPOINT.'?'.$this->prepareUrl($data);
        return json_decode($this->call($url),true);
    }
}