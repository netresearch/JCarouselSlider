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

class Netresearch_JCarouselSlider_Block_Catalog_Product_List_Upsell extends Mage_Catalog_Block_Product_List_Upsell
{
    /**
    * Object Netresearch_JCarouselSlider_Block_Summary, with namespace for storeconfig
    */
    public $jcUpsell;
    
    /**
    * Constructor set the namespace for upsell
    */
    public function __construct() {
        $this->jcUpsell= new Netresearch_JCarouselSlider_Block_Summary('jcupsells');
        Mage_Catalog_Block_Product_List_Upsell::setItemLimit('upsell', $this->jcUpsell->getMaxItemCount());
    }
}