<?php
/**
* Informatics_Restrictproduct install script to create product attribute
*
* @category    Informatics
* @package     Informatics_Restrictproduct
* @copyright   Copyright © 2016 Informatics. All rights reserved.
*/

namespace Informatics\Restrictproduct\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}
	
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'shipping_restriction',
			[
				'type' => 'varchar',
				'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
				'frontend' => '',
				'label' => 'Disallow shipping to',
				'input' => 'multiselect',
				'class' => '',
				'source' => 'Informatics\Restrictproduct\Model\Attribute\Source\Country',
				'sort_order' => 50,
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => '',
				'searchable' => false,
				'filterable' => false,
				'comparable' => false,
				'visible_on_front' => true,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => 'simple,configurable,bundle,grouped'
			]
		);
	}
}