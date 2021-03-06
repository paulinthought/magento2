<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Cms
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Cms\Controller;

/**
 * Cms index controller
 *
 * @category   Magento
 * @package    Magento_Cms
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Index extends \Magento\App\Action\Action
{
    /**
     * Renders CMS Home page
     *
     * @param string|null $coreRoute
     * @return void
     */
    public function indexAction($coreRoute = null)
    {
        $pageId = $this->_objectManager->get('Magento\Core\Model\Store\Config')
            ->getConfig(\Magento\Cms\Helper\Page::XML_PATH_HOME_PAGE);
        if (!$this->_objectManager->get('Magento\Cms\Helper\Page')->renderPage($this, $pageId)) {
            $this->_forward('defaultIndex');
        }
    }

    /**
     * Default index action (with 404 Not Found headers)
     * Used if default page don't configure or available
     *
     * @return void
     */
    public function defaultIndexAction()
    {
        $this->getResponse()->setHeader('HTTP/1.1','404 Not Found');
        $this->getResponse()->setHeader('Status','404 File not found');

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

    /**
     * Default no route page action
     * Used if no route page don't configure or available
     *
     * @return void
     */
    public function defaultNoRouteAction()
    {
        $this->getResponse()->setHeader('HTTP/1.1','404 Not Found');
        $this->getResponse()->setHeader('Status','404 File not found');

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

    /**
     * Render Disable cookies page
     *
     * @return void
     */
    public function noCookiesAction()
    {
        $pageId = $this->_objectManager->get('Magento\Core\Model\Store\Config')
            ->getConfig(\Magento\Cms\Helper\Page::XML_PATH_NO_COOKIES_PAGE);
        if (!$this->_objectManager->get('Magento\Cms\Helper\Page')->renderPage($this, $pageId)) {
            $this->_forward('defaultNoCookies');;
        }
    }

    /**
     * Default no cookies page action
     * Used if no cookies page don't configure or available
     *
     * @return void
     */
    public function defaultNoCookiesAction()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
