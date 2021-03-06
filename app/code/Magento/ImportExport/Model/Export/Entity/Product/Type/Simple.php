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
 * @package     Magento_ImportExport
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\ImportExport\Model\Export\Entity\Product\Type;

/**
 * Export entity product type simple model
 *
 * @category    Magento
 * @package     Magento_ImportExport
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Simple
    extends \Magento\ImportExport\Model\Export\Entity\Product\Type\AbstractType
{
    /**
     * Overridden attributes parameters.
     *
     * @var array
     */
    protected $_attributeOverrides = array(
        'has_options'      => array('source_model' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean'),
        'required_options' => array('source_model' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean'),
        'created_at'       => array('backend_type' => 'datetime'),
        'updated_at'       => array('backend_type' => 'datetime')
    );

    /**
     * Array of attributes codes which are disabled for export.
     *
     * @var string[]
     */
    protected $_disabledAttrs = array(
        'old_id',
        'recurring_payment',
        'is_recurring',
        'tier_price',
        'group_price',
        'category_ids'
    );
}
