# Magento SQL Handy Profiler
Small &amp; simple extended Magento 1.x Profiler with SQL queries list.
<h2>Features</h2>
<ul>
    <li>Displays all SQL queries list</li>
    <li>Works with multi-database connections</li>
    <li>Some nice syntax coloring</li>
    <li>Created &amp; tested with Magento 1.9.3</li>
</ul>
<h2>Install &amp; run</h2>
<p>Install module and enable just as regular Magento Profiler:</p>
<ul>
    <li>System &gt; Configuration &gt; tab Advanced &gt; Developer &gt; Debug &gt; Profiler - set to Yes</li>
    <li>Uncomment Varien_Profiler::enable(); in index.php</li>
    <li>Set enviromental variable in server configuration MAGE_IS_DEVELOPER_MODE to 1 (recommended) or Mage::setIsDeveloperMode(true); in index.php</li>
    <li>add &lt;profiler&gt;true&lt;/profiler&gt; within &lt;connection&gt; setup in your app/etc/local.xml</li>
</ul>

