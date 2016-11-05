<?php

class Handy_Profiler_Model_Profiler_Sql
{

    protected $_name;

    protected $_profiler;


    public function __construct($name,$resource)
    {
        $this->_name = $name;
        $this->_profiler = $resource->getProfiler();
    }


    public function getName()
    {
        return $this->_name;
    }


    public function getQueryCount()
    {
        return $this->_profiler->getTotalNumQueries();
    }


    public function getTotalTime()
    {
        return $this->_profiler->getTotalElapsedSecs();
    }


    public function getLongestQuery()
    {
        $longestQuery = null;

        foreach ( $this->getQueries() as $query ) {

            $longestTime = $longestQuery ? $longestQuery->getElapsedSecs() : 0;

            if ( $query->getElapsedSecs() > $longestTime ) {
                $longestQuery = $query;
            }
        }

        return $longestQuery;
    }


    public function getQueries()
    {
        return $this->_profiler->getQueryProfiles() ? $this->_profiler->getQueryProfiles() : array();
    }
}