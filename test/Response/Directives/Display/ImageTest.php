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

namespace TravelloAlexaLibraryTest\Response\Directives\Display;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Response\Directives\Display\Image;

/**
 * Class ImageTest
 *
 * @package TravelloAlexaLibraryTest\Response\Directives\Display;
 */
class ImageTest extends TestCase
{
    /**
     *
     */
    public function testWithDescriptionOnly()
    {
        $image = new Image('image description');

        $expected = [
            'contentDescription' => 'image description',
            'sources'            => [],
        ];

        $this->assertEquals($expected, $image->toArray());
    }

    /**
     *
     */
    public function testWithSmallAndMediumSource()
    {
        $image = new Image('image description');
        $image->setUrlSmall('https://image.server/small.png');
        $image->setUrlMedium('https://image.server/medium.png');

        $expected = [
            'contentDescription' => 'image description',
            'sources'            => [
                [
                    'url' => 'https://image.server/small.png',
                    'type' => 'SMALL',
                ],
                [
                    'url' => 'https://image.server/medium.png',
                    'type' => 'MEDIUM',
                ],
            ],
        ];

        $this->assertEquals($expected, $image->toArray());
    }

    /**
     *
     */
    public function testWithAllSources()
    {
        $image = new Image('image description');
        $image->setUrlMedium('https://image.server/medium.png');
        $image->setUrlXSmall('https://image.server/xsmall.png');
        $image->setUrlSmall('https://image.server/small.png');
        $image->setUrlXLarge('https://image.server/xlarge.png');
        $image->setUrlLarge('https://image.server/large.png');

        $expected = [
            'contentDescription' => 'image description',
            'sources'            => [
                [
                    'url' => 'https://image.server/xsmall.png',
                    'type' => 'X_SMALL',
                ],
                [
                    'url' => 'https://image.server/small.png',
                    'type' => 'SMALL',
                ],
                [
                    'url' => 'https://image.server/medium.png',
                    'type' => 'MEDIUM',
                ],
                [
                    'url' => 'https://image.server/large.png',
                    'type' => 'LARGE',
                ],
                [
                    'url' => 'https://image.server/xlarge.png',
                    'type' => 'X_LARGE',
                ],
            ],
        ];

        $this->assertEquals($expected, $image->toArray());
    }
}
