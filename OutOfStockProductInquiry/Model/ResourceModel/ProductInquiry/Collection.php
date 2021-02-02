<?php
namespace PaulSmith\OutOfStockProductInquiry\Model\ResourceModel\ProductInquiry;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use PaulSmith\OutOfStockProductInquiry\Model\ProductInquiry;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'paulsmith_outofstockproductinquiry_post_collection';
    protected $_eventObject = 'product_inquiry_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductInquiry::class, \PaulSmith\OutOfStockProductInquiry\Model\ResourceModel\ProductInquiry::class);
    }
}
