<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 22/07/15
 * Time: 18.05
 */

namespace it\thecsea\twofactorDir;
require_once(__DIR__."/../vendor/autoload.php");


/**
 * Class twofactorAdapterTest
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 * @package it\thecsea\twofactorDir
 */
class twofactorAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $twofactorAdapter = new twofactorAdapter();
        $this->assertEquals(".",$twofactorAdapter->getDir());
        $this->assertEquals("",$twofactorAdapter->getServiceName());
        $this->assertNotEquals("",$twofactorAdapter->getSecret());
        $twofactorAdapter->setDir(__DIR__."/../tests");
        $this->assertEquals(__DIR__."/../tests",$twofactorAdapter->getDir());
        $twofactorAdapter->setServiceName("none");
        $this->assertEquals("none",$twofactorAdapter->getServiceName());
    }

    public function testSecret()
    {
        $twofactorAdapter = new twofactorAdapter();
        $this->assertTrue($twofactorAdapter->check($twofactorAdapter->getCode()));
        $twofactorAdapter2 = new twofactorAdapter();
        $twofactorAdapter2->setSecret($twofactorAdapter->getSecret());
        $this->assertEquals($twofactorAdapter2->getSecret(),$twofactorAdapter->getSecret());
        $this->assertTrue($twofactorAdapter2->check($twofactorAdapter->getCode()));
        $this->assertEquals($twofactorAdapter2->getCode(),$twofactorAdapter->getCode());
        $twofactorAdapter2->setSecret("XVQ2UIGO75XRUKJO");
        $this->assertNotEquals($twofactorAdapter2->getSecret(),$twofactorAdapter->getSecret());
        $this->assertFalse($twofactorAdapter2->check($twofactorAdapter->getCode()));
        $this->assertTrue($twofactorAdapter2->check($twofactorAdapter2->getCode()));
        $this->assertNotEquals($twofactorAdapter2->getCode(),$twofactorAdapter->getCode());
    }

    public function testConstruct()
    {
        $twofactorAdapter = new twofactorAdapter("mydir", "none", "XVQ2UIGO75XRUKJO");
        $this->assertEquals("mydir",$twofactorAdapter->getDir());
        $this->assertEquals("none",$twofactorAdapter->getServiceName());
        $this->assertEquals("XVQ2UIGO75XRUKJO",$twofactorAdapter->getSecret());
    }

    public function testToString()
    {
        $twofactorAdapter = new twofactorAdapter("mydir", "none", "XVQ2UIGO75XRUKJO");
        $this->assertEquals(("dir: mydir serviceName: none secret: XVQ2UIGO75XRUKJO"), (string)$twofactorAdapter);
    }

    public function testClone()
    {
        $twofactorAdapter = new twofactorAdapter();
        $twofactorAdapter2 = clone $twofactorAdapter;
        $this->assertEquals($twofactorAdapter2->getSecret(),$twofactorAdapter->getSecret());
    }

    public function testGetUrl()
    {
        $twofactorAdapter = new twofactorAdapter();
        $this->assertNotNull($twofactorAdapter->getURL());
    }
}
