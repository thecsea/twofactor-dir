<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 21/07/15
 * Time: 18.57
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

require_once(__DIR__."/../../../vendor/autoload.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>install two factor dir</title>
</head>
<body>
<?php
if(isset($_POST['dir']))
{
    if(!is_dir($_POST['dir']))
    {
        print($_POST['dir'] . " is not a valid dir<br>\n");
    }else if(!is_writable($_POST['dir']))
    {
        print($_POST['dir'] . " is not a writable dir<br>\n");
    }
    else
    {
        it\thecsea\twofactorDir\twofactorDir::install($_POST['dir']);
        print "script installed<br>\n";
    }
}
?>
The directory must be writable by php<br>
You also have to enable mod rewrite and .htaccess<br>
you have to don't change the twofactor-dir package directory after an installation
<form action="" method="post">
    <label for="dir">directory (preferably absolute link)</label>: <input type="text" id="dir" name="dir"><br>
    <input type="submit" value="install">
</form>
</body>
</html>