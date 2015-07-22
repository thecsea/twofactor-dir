<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 21/07/15
 * Time: 18.38
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

namespace it\thecsea\twofactorDir;


use Google\Authenticator\GoogleAuthenticator;

/**
 * Class twofactorDir
 * @author Claudio Cardinale <cardi@thecsea.it>
 * @copyright 2015 Claudio Cardinale
 * @version 1.0.0
 * @package it\thecsea\twofactorDir
 */
class twofactorDir
{

    /**
     * @var string
     */
    private $secret;
    /**
     * @var string
     */
    private $dir;
    /**
     * @var string
     */
    private $serviceName;
    /**
     * @var GoogleAuthenticator
     */
    private $googleAuthenticator;

    /**
     * @param string $secret
     * @param string $serviceName
     * @param string $dir
     */
    public function __construct($secret = "", $serviceName="", $dir = ".")
    {
        $this->googleAuthenticator = new GoogleAuthenticator();
        if($secret)
            $this->secret = $this->googleAuthenticator->generateSecret();
        $this->serviceName = $serviceName;
        $this->dir = $dir;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * Get the QR code url
     * @return string
     */
    public function getURL()
    {
        return $this->googleAuthenticator->getUrl("admin",$this->serviceName,$this->secret);
    }

    /**
     * Check if code given is the same generated by secret
     * @param string $code
     * @return bool return true if the code is the same
     */
    public function check($code)
    {
        return $this->googleAuthenticator->checkCode($this->secret, $code);
    }


    /**
     * Install library into a dir
     * @param string $dir
     */
    static public function install($dir = ".")
    {
        $f = fopen($dir."/.htaccess","a");
        fwrite($f,file_get_contents(__DIR__.".htaccess"));
        fclose($f);

        $f = fopen($dir."/redirect.php","w");
        fwrite($f,file_get_contents(__DIR__."redirect.php"));
        fclose($f);
    }

}