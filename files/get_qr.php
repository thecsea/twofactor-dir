<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 26/07/15
 * Time: 20.44
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

require_once("{SRC_DIR}/vendor/autoload.php");

$twofactorDir = new it\thecsea\twofactorDir\twofactorDir(__DIR__,"{COOKIE_CODE}");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Two factor dir</title>
</head>
<body>
<img src="<?=$twofactorDir->getURL()?>"><br>
Or type secret: <?=$twofactorDir->getSecret()?>
</body>
</html>
