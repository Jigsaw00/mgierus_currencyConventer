<?php

namespace MGierus\CurrencyConventer\Controller\Ajax;

/**
 * Class Index
 *
 * @package MGierus\CurrencyConventer\Controller\Ajax
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory  */
    protected $_resultPageFactory;

    /** @var \Magento\Framework\Json\Helper\Data  */
    protected $_jsonHelper;

    /** @var \MGierus\CurrencyConventer\Helper\Api  */
    protected $_api;

    /** @var \Magento\Framework\Controller\Result\JsonFactory  */
    protected $_jsonFactory;

    /**
     * Index constructor.
     *
     * @param \Magento\Framework\App\Action\Context            $context
     * @param \Magento\Framework\View\Result\PageFactory       $resultPageFactory
     * @param \Magento\Framework\Json\Helper\Data              $jsonHelper
     * @param \MGierus\CurrencyConventer\Helper\Api            $api
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \MGierus\CurrencyConventer\Helper\Api $api,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        $this->_jsonFactory = $jsonFactory;
        $this->_api = $api;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_jsonHelper = $jsonHelper;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->_jsonFactory->create()->setData($this->_api->convert($this->_request->getParam('from')));
    }
}
