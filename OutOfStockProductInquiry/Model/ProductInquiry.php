<?php
namespace PaulSmith\OutOfStockProductInquiry\Model;

use Magento\Framework\Model\AbstractModel;

class ProductInquiry extends AbstractModel
{
    const CACHE_TAG = 'paulsmith_outofstockproductinquiry_post';
    protected $_cacheTag = 'paulsmith_outofstockproductinquiry_post';
    protected $_eventPrefix = 'paulsmith_outofstockproductinquiry_post';
    protected function _construct()
    {
        $this->_init(ResourceModel\ProductInquiry::class);
    }
}
