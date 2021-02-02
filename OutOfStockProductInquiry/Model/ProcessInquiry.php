<?php


namespace PaulSmith\OutOfStockProductInquiry\Model;


use Magento\Framework\App\Request\DataPersistorInterface;

class ProcessInquiry
{
    /**
     * @var ProductInquiryFactory
     */

    private $process_code = 0;
    /**
     * @var ProductInquiryFactory
     */
    private $inquiryFactory;
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;


    /**
     * ProcessInquiry constructor.
     * @param ProductInquiryFactory $inquiryFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(ProductInquiryFactory $inquiryFactory, DataPersistorInterface $dataPersistor)
    {
        $this->inquiryFactory = $inquiryFactory;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * @param $inquiryData
     * @return int|ProductInquiryFactory
     */
    public function saveInquiry($inquiryData){


        try {

            $inquiry = $this->inquiryFactory->create();
            $inquiry->setCustomerName($inquiryData["customer_name"]);
            $inquiry->setCustomerEmail($inquiryData["customer_email"]);
            $inquiry->setQuery($inquiryData["query"]);
            $inquiry->setProductSku($inquiryData["product_sku"]);
            $inquiry->setDatetime(date('Y-m-d h:i:s'));
            $inquiry->save();
            $this->process_code = 1;

            $this->dataPersistor->clear('paulsmith_outofstockproduct_inquiry');
        } catch (\Exception $e) {
            $this->_dataPersistor->set('paulsmith_outofstockproduct_inquiry', $inquiryData);
        }
        return $this->process_code;

    }
}