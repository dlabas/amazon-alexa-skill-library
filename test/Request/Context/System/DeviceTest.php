<?php
/**
 * PHP Library for Amazon Alexa Skills
 *
 * @author     Ralf Eggert <ralf@travello.audio>
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link       https://github.com/travello-gmbh/amazon-alexa-skill-library
 * @link       https://www.travello.audio/
 *
 */

namespace TravelloAlexaLibraryTest\Request\Context\System;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Request\Context\System\Device;

/**
 * Class DeviceTest
 *
 * @package TravelloAlexaLibraryTest\Request\Context\System
 */
class DeviceTest extends TestCase
{
    /**
     *
     */
    public function testInstantiation()
    {
        $device = new Device();

        $this->assertNull($device->getDeviceId());
        $this->assertNull($device->getSupportedInterfaces());
    }

    /**
     *
     */
    public function testDeviceId()
    {
        $device = new Device();
        $device->setDeviceId('deviceId');

        $expected = 'deviceId';

        $this->assertEquals($expected, $device->getDeviceId());
        $this->assertNull($device->getSupportedInterfaces());
    }

    /**
     *
     */
    public function testAccessToken()
    {
        $device = new Device();
        $device->setSupportedInterfaces(['AudioPlayer' => []]);

        $expected = ['AudioPlayer' => []];

        $this->assertNull($device->getDeviceId());
        $this->assertEquals($expected, $device->getSupportedInterfaces());
    }
}
