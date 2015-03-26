<?php

class Peter_Week3_CommentController extends Mage_Core_Controller_Front_Action  {
    public function postAction() {
        $text = $this->getRequest()->getParam('comment');
        $comment = Mage::getModel('week3/comment');
        $comment->setComment($text);
        $comment->save();

        $this->_goBack();
    }

    protected function _goBack() {
        $returnUrl = $this->getRequest()->getParam('return_url');
        if ($returnUrl) {
            if (!$this->_isUrlInternal($returnUrl)) {
                throw new Mage_Exception('External urls redirect to "' . $returnUrl . '" denied!');
            }
            $this->getResponse()->setRedirect($returnUrl);
        }
        return $this;
    }
}
