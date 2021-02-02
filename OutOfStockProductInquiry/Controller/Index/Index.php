<?php
namespace PaulSmith\OutOfStockProductInquiry\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    private $processInquiry;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \PaulSmith\OutOfStockProductInquiry\Model\ProcessInquiry $processInquiry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \PaulSmith\OutOfStockProductInquiry\Model\ProcessInquiry $processInquiry


    ) {
        $this->processInquiry = $processInquiry;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $response_code = $this->processInquiry->saveInquiry($post);
        return $this->getResponse()->setBody($response_code);
    }
}
