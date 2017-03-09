<?php

class Handy_Profiler_Model_Block_Observer
{
    public function markCachedBlocks(Varien_Event_Observer $observer)
    {
        if ( !Mage::helper('handy_profiler')->isEnabled() ) {
            return '';
        }

        $block = $observer->getEvent()->getBlock();
        $cache = Mage::app()->loadCache($block->getCacheKey());
        if ( $cache ) {
            $block->setFrameTags('div style="border: 1px dashed lime"','/div');
        }
    }
}
