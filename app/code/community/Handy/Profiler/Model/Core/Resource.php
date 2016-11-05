<?php

class Handy_Profiler_Model_Core_Resource
    extends Mage_Core_Model_Resource
{

    public function getConnections()
    {
        return $this->_connections;
    }
}