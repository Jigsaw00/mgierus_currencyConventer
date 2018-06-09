<?php

namespace MGierus\CurrencyConventer\Helper;


/**
 * Class Data
 *
 * @package MGierus\CurrencyConventer\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper{

    /**
     * @param $number
     * @return float
     */
    public function formatToFloatNumber($number){
        return str_replace( ',','.', $number)*1.0;
    }
}