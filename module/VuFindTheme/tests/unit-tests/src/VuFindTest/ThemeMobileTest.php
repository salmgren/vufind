<?php
/**
 * Mobile Test Class
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:testing:unit_tests Wiki
 */
namespace VuFindTest;
use VuFindTheme\Mobile;

/**
 * Mobile Test Class
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:testing:unit_tests Wiki
 */
class ThemeMobileTest extends Unit\TestCase
{
    /**
     * Test namespace stripping.
     *
     * @return void
     */
    public function testEnable()
    {
        $mobile = new Mobile();
        // default behavior
        $this->assertFalse($mobile->enabled());
        // turn on
        $mobile->enable();
        $this->assertTrue($mobile->enabled());
        // turn off
        $mobile->enable(false);
        $this->assertFalse($mobile->enabled());
    }

    /**
     * Test detection wrapping.
     *
     * @return void
     */
    public function testDetection()
    {
        $detector = $this->createMock('uagent_info', ['DetectMobileLong']);
        $detector->expects($this->once())
            ->method('DetectMobileLong')->will($this->returnValue(true));
        $mobile = new Mobile($detector);
        $this->assertTrue($mobile->detect());
    }
}
