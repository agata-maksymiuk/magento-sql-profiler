<?php

class Handy_Profiler_Block_Profiler
    extends Mage_Core_Block_Template
{

    protected $_sqlProfilers = array();


    protected function _toHtml()
    {
        if ( !Mage::helper('handy_profiler')->isEnabled() ) {
            return '';
        }
        return parent::_toHtml();
    }


    public function getSqlProfilers()
    {
        foreach ( Mage::getSingleton('core/resource')->getConnections() as $name => $connection ) {

            $instance = spl_object_hash($connection);

            if ( !isset($this->_sqlProfilers[$instance]) ) {
                if ( $connection->getProfiler() ) {
                    $this->_sqlProfilers[$instance] = new Handy_Profiler_Model_Profiler_Sql($name,$connection);
                }
            }
        }

        return $this->_sqlProfilers;
    }


    public function colorizeQuery($query)
    {
        return preg_replace('/([A-Z]+)/','<span style="color: #006699">$1</span>',$query);
    }


    public function colorize($text)
    {
        if ( preg_match('/OBSERVER/',$text) ) {
            return $this->_colorize('red', $text);
        }
        if ( preg_match('/DISPATCH EVENT/',$text) ) {
            return $this->_colorize('orange', $text);
        }
        if ( preg_match('/BLOCK/',$text) ) {
            return $this->_colorize('#006699', $text);
        }
        if ( preg_match('/\.phtml$/',$text) ) {
            return $this->_colorize('green', $text);
        }
        return $text;
    }


    protected function _colorize($color,$text)
    {
        return sprintf('<span style="color:%s">%s</span>',$color,$text);
    }
}
