<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Poposki\Blog\Persistence\MagentoPostRepository;
use Poposki\Blog\Service\ViewPostRequest;
use Poposki\Blog\Service\ViewPostService;
use Poposki\Blog\Domain\PostDoesNotExistException;

class Poposki_Blog_ViewController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $repository = new MagentoPostRepository(
            Mage::getModel('poposki_blog/post')
        );

        $postId  = $this->getRequest()->getParam('id');
        $request = new ViewPostRequest($postId);
        $service = new ViewPostService($repository);

        try {
            Mage::register('post', $service->execute($request));

            $this->loadLayout();
            $this->renderLayout();
        } catch (PostDoesNotExistException $exception) {
            $this->norouteAction();
        }
    }
}
