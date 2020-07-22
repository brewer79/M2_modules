<?php

namespace Speroteck\Helloworldplus\Block;

use Magento\Framework\View\Element\Template;

class Helloworldplus extends Template
{
        public function getHello()
    {
        return 'Hello World!';
    }
}