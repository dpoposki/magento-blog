<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Poposki_Blog_Block_Post_View extends Mage_Core_Block_Template
{
    public function getPost()
    {
        return Mage::registry('post');
    }
}
