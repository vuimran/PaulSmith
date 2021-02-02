<?php
namespace PaulSmith\OutOfStockProductInquiry\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class ProductInquiry extends AbstractDb
{
    
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }
    
    protected function _construct()
    {
        $this->_init('paulsmith_outofstockproduct_inquiry', 'entity_id');
    }
}
