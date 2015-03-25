<?php

class Peter_Week3_CommentController extends Mage_Core_Controller_Front_Action  {
    public function postAction() {
        $text = $this->getRequest()->getParam('comment');
        $comment = Mage::getModel('week3/comment');
        $comment->setComment($text);
        $comment->save();
    }
}
