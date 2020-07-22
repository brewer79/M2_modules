<?php
namespace Speroteck\RequestCatalog\Model\Request;

use Speroteck\RequestCatalog\Model\ResourceModel\Request\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $requestCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $requestCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $requestCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $request) {
            // name of fieldset - 'request'
            $this->loadedData[$request->getId()]['request'] = $request->getData();
        }
        return $this->loadedData;
    }
}