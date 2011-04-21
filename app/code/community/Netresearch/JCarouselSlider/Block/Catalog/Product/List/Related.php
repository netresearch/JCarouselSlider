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
 * @category           Netresearch
 * @package            Netresearch_JCarouselSlider
 * @author               Dandy Umlauft <dandy.umlauft@netresearch.de>
 * @copyright           Copyright (c) 2011 Dandy Umlauft | Netresearch GmbH & Co.KG (http://www.netresearch.de)
 * @license               http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
require_once("app/code/community/Netresearch/JCarouselSlider/Block/Summary.php");

class Netresearch_JCarouselSlider_Block_Catalog_Product_List_Related extends Mage_Catalog_Block_Product_List_Related
{
    /**
    * Object Netresearch_JCarouselSlider_Block_Summary, with namespace for store config
    */
    public $jcRelated;
    
    /**
    * Constructor set the namespace for related products
    */
    public function __construct() {
        $this->jcRelated= new Netresearch_JCarouselSlider_Block_Summary('jcrelatedproducts');
    }
}