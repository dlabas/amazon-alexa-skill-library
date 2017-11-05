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

namespace Response\Directives\VideoApp;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Response\Directives\VideoApp\Launch;

/**
 * Class LaunchTest
 *
 * @package Response\Directives\VideoApp
 */
class LaunchTest extends TestCase
{
    /**
     *
     */
    public function testInstantiationWithMetaData()
    {
        $directive = new Launch(
            'https:/www.test.de/video.mp4', 'title', 'subtitle'
        );

        $expected = [
            'type'      => 'VideoApp.Launch',
            'videoItem' => [
                'source'   => 'https:/www.test.de/video.mp4',
                'metadata' => [
                    'title'    => 'title',
                    'subtitle' => 'subtitle',
                ],
            ],
        ];

        $this->assertEquals($expected, $directive->toArray());
        $this->assertEquals('VideoApp.Launch', $directive->getType());
    }

    /**
     *
     */
    public function testInstantiationWithoutMetaData()
    {
        $directive = new Launch(
            'https:/www.test.de/video.mp4'
        );

        $expected = [
            'type'      => 'VideoApp.Launch',
            'videoItem' => [
                'source'   => 'https:/www.test.de/video.mp4',
            ],
        ];

        $this->assertEquals($expected, $directive->toArray());
        $this->assertEquals('VideoApp.Launch', $directive->getType());
    }

    /**
     *
     */
    public function testInstantiationWithoutSubtitle()
    {
        $directive = new Launch(
            'https:/www.test.de/video.mp4', 'title'
        );

        $expected = [
            'type'      => 'VideoApp.Launch',
            'videoItem' => [
                'source'   => 'https:/www.test.de/video.mp4',
                'metadata' => [
                    'title'    => 'title',
                ],
            ],
        ];

        $this->assertEquals($expected, $directive->toArray());
        $this->assertEquals('VideoApp.Launch', $directive->getType());
    }
}