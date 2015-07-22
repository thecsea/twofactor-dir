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
 * Class twofactorDirTest
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 * @package it\thecsea\twofactorDir
 */
class twofactorDirTest extends \PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $twofactorDir = new twofactorDir();
        $this->assertEquals(".",$twofactorDir->getDir());
        $this->assertEquals("",$twofactorDir->getServiceName());
        $this->assertNotEquals("",$twofactorDir->getSecret());
        $twofactorDir->setDir(__DIR__."/../tests");
        $this->assertEquals(__DIR__."/../tests",$twofactorDir->getDir());
        $twofactorDir->setServiceName("none");
        $this->assertEquals("none",$twofactorDir->getServiceName());
    }

    public function testSecret()
    {
        $twofactorDir = new twofactorDir();
        $this->assertTrue($twofactorDir->check($twofactorDir->getCode()));
        $twofactorDir2 = new twofactorDir();
        $twofactorDir2->setSecret($twofactorDir->getSecret());
        $this->assertEquals($twofactorDir2->getSecret(),$twofactorDir->getSecret());
        $this->assertTrue($twofactorDir2->check($twofactorDir->getCode()));
        $this->assertEquals($twofactorDir2->getCode(),$twofactorDir->getCode());
        $twofactorDir2->setSecret("XVQ2UIGO75XRUKJO");
        $this->assertNotEquals($twofactorDir2->getSecret(),$twofactorDir->getSecret());
        $this->assertFalse($twofactorDir2->check($twofactorDir->getCode()));
        $this->assertTrue($twofactorDir2->check($twofactorDir2->getCode()));
        $this->assertNotEquals($twofactorDir2->getCode(),$twofactorDir->getCode());
    }

    public function testConstruct()
    {
        $twofactorDir = new twofactorDir("mydir", "none", "XVQ2UIGO75XRUKJO");
        $this->assertEquals("mydir",$twofactorDir->getDir());
        $this->assertEquals("none",$twofactorDir->getServiceName());
        $this->assertEquals("XVQ2UIGO75XRUKJO",$twofactorDir->getSecret());
    }

    public function testToString()
    {
        $twofactorDir = new twofactorDir("mydir", "none", "XVQ2UIGO75XRUKJO");
        $this->assertEquals(("dir: mydir serviceName: none secret: XVQ2UIGO75XRUKJO"), (string)$twofactorDir);
    }

    public function testClone()
    {
        $twofactorDir = new twofactorDir();
        $twofactorDir2 = clone $twofactorDir;
        $this->assertEquals($twofactorDir2->getSecret(),$twofactorDir->getSecret());
    }

    public function testGetUrl()
    {
        $twofactorDir = new twofactorDir();
        $this->assertNotNull($twofactorDir->getURL());
    }
}
