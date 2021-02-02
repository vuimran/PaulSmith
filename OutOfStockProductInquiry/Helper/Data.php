<?php
namespace PaulSmith\OutOfStockProductInquiry\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    private $productFactory;

    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    public function getConfig($configPath)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE
        );
    }


    public function getIsProductInquiryEnabledForThisStore()
    {
        return $this->getConfig('out_of_stock_product_inquiry/configuration/enable');
    }

    public function getOutOfStockProductInquiryTitle()
    {
        return $this->getConfig('out_of_stock_product_inquiry/frontend_settings/link_title');
    }

    public function showInquiryLink($productId)
    {
        if($this->getIsProductOutOfStock($productId) AND $this->getIsProductInquiryEnabled($productId)){
            return true;
        }

     return false;
    }


    public function getIsProductInquiryEnabledForThisProduct($productId)
    {
        $product = $this->productFactory->create()->load($productId);
        if($product->getIsOutOfStockInquiryEnabled()){
            return true;
        }
        return false;
    }

    public function getIsProductOutOfStock($productId)
    {

        //IB out of stock product check needs to be added
        return true;

    }


    public function getIsProductInquiryEnabled($productId)
    {

        if($this->getIsProductInquiryEnabledForThisStore() AND $this->getIsProductInquiryEnabledForThisProduct($productId)){
            return true;
        }
        return false;

    }


}
