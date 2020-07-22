<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Speroteck\RequestCatalog\Controller\Index;

use Magento\Contact\Controller\Index;

class Post extends Index
{
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        if (!$post) {
            $this->_redirect('*/*/');
            //return;
        }
        else{
            try {
                $post['date'] = time();
                $model = $this->_objectManager->create('Speroteck\RequestCatalog\Model\Request');
                $model->setData($post);
                $model->save();
                $this->_redirect('/');
                $this->messageManager->addSuccessMessage(
                    __('Thanks for contacting us with your catalog request. We\'ll respond to you very soon.')
                );
                //return;
            } catch (\Exception $e) {
                echo  $e->getMessage().'Error : We can\'t process your request right now';
                //$e->getMessage().' We can\'t process your request right now. Sorry, that\'s all we know.'
                $this->_redirect('*/*/');
                //return;
            }
        }
    }
}
