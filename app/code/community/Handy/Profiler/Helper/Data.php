<?php

class Handy_Profiler_Helper_Data
    extends Mage_Core_Helper_Data
{
    public function isEnabled()
    {
        return Mage::getStoreConfig('dev/debug/profiler') && Mage::helper('core')->isDevAllowed();
    }
}
