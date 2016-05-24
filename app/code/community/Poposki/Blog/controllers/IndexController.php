<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Poposki\Blog\Persistence\MagentoPostRepository;
use Poposki\Blog\Service\ViewPostsService;

class Poposki_Blog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $repository = new MagentoPostRepository(
            Mage::getModel('poposki_blog/post')
        );

        $service = new ViewPostsService($repository);
        Mage::register('posts', $service->execute());

        $this->loadLayout();
        $this->renderLayout();
    }
}
