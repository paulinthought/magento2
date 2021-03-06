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
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Customer\Service\V1;


class CustomerAddressCurrentServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Customer\Service\V1\CustomerAddressCurrentService
     */
    protected $customerAddressCurrentService;

    /**
     * @var \Magento\Customer\Service\V1\CustomerCurrentService|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $customerCurrentServiceMock;

    /**
     * @var \Magento\Customer\Service\V1\CustomerAddressService|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $customerAddressServiceMock;

    /**
     * @var \Magento\Customer\Service\V1\Data\Address
     */
    protected $customerAddressDataMock;

    /**
     * @var int
     */
    protected $customerCurrentId = 100;

    /**
     * Test setup
     */
    public function setUp()
    {
        $this->customerCurrentServiceMock = $this->getMock('Magento\Customer\Service\V1\CustomerCurrentService',
            array(), array(), '', false);
        $this->customerAddressServiceMock = $this->getMock('Magento\Customer\Service\V1\CustomerAddressService',
            array(), array(), '', false);

        $this->customerAddressCurrentService = new \Magento\Customer\Service\V1\CustomerAddressCurrentService(
            $this->customerCurrentServiceMock,
            $this->customerAddressServiceMock
        );
    }

    /**
     * Test getCustomerAddresses
     */
    public function testGetCustomerAddresses()
    {
        $this->customerCurrentServiceMock->expects($this->once())
            ->method('getCustomerId')
            ->will($this->returnValue($this->customerCurrentId));
        $this->customerAddressServiceMock->expects($this->once())
            ->method('getAddresses')
            ->will($this->returnValue(array($this->customerAddressDataMock)));
        $this->assertEquals(array($this->customerAddressDataMock),
            $this->customerAddressCurrentService->getCustomerAddresses());
    }

    /**
     * test getDefaultBillingAddress
     */
    public function testGetDefaultBillingAddress()
    {
        $this->customerCurrentServiceMock->expects($this->once())
            ->method('getCustomerId')
            ->will($this->returnValue($this->customerCurrentId));
        $this->customerAddressServiceMock->expects($this->once())
            ->method('getDefaultBillingAddress')
            ->will($this->returnValue($this->customerAddressDataMock));
        $this->assertEquals($this->customerAddressDataMock,
            $this->customerAddressCurrentService->getDefaultBillingAddress());
    }

    /**
     * test getDefaultShippingAddress
     */
    public function testGetDefaultShippingAddress()
    {
        $this->customerCurrentServiceMock->expects($this->once())
            ->method('getCustomerId')
            ->will($this->returnValue($this->customerCurrentId));
        $this->customerAddressServiceMock->expects($this->once())
            ->method('getDefaultShippingAddress')
            ->will($this->returnValue($this->customerAddressDataMock));
        $this->assertEquals($this->customerAddressDataMock,
            $this->customerAddressCurrentService->getDefaultShippingAddress());
    }
}
