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

namespace TravelloAlexaLibraryTest\Intent;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Intent\AbstractIntent;
use TravelloAlexaLibrary\Intent\IntentInterface;
use TravelloAlexaLibrary\Intent\StopIntent;
use TravelloAlexaLibrary\Request\RequestType\RequestTypeFactory;
use TravelloAlexaLibrary\Response\AlexaResponse;
use TravelloAlexaLibrary\TextHelper\TextHelper;

/**
 * Class StopIntentTest
 *
 * @package TravelloAlexaLibraryTest\Intent
 */
class StopIntentTest extends TestCase
{
    /**
     * Test the instantiation of the class
     */
    public function testInstantiation()
    {
        $data = [
            'version' => '1.0',
            'session' => [
                'new'         => true,
                'sessionId'   => 'sessionId',
                'application' => [
                    'applicationId' => 'amzn1.ask.skill.applicationId',
                ],
                'user'        => [
                    'userId' => 'userId',
                ],
            ],
            'request' => [
                'type'      => 'IntentRequest',
                'requestId' => 'requestId',
                'timestamp' => '2017-01-27T20:29:59Z',
                'locale'    => 'en-US',
                'intent'    => [
                    'name'  => 'AMAZON.StopIntent',
                    'slots' => [],
                ],
            ],
        ];

        $alexaRequest  = RequestTypeFactory::createFromData(json_encode($data));
        $alexaResponse = new AlexaResponse();
        $textHelper    = new TextHelper();

        $stopIntent = new StopIntent($alexaRequest, $alexaResponse, $textHelper);

        $this->assertTrue($stopIntent instanceof AbstractIntent);
        $this->assertTrue($stopIntent instanceof IntentInterface);
    }

    /**
     * Test the handling of the intent
     */
    public function testHandle()
    {
        $data = [
            'version' => '1.0',
            'session' => [
                'new'         => true,
                'sessionId'   => 'sessionId',
                'application' => [
                    'applicationId' => 'amzn1.ask.skill.applicationId',
                ],
                'user'        => [
                    'userId' => 'userId',
                ],
            ],
            'request' => [
                'type'      => 'IntentRequest',
                'requestId' => 'requestId',
                'timestamp' => '2017-01-27T20:29:59Z',
                'locale'    => 'en-US',
                'intent'    => [
                    'name'  => 'AMAZON.StopIntent',
                    'slots' => [],
                ],
            ],
        ];

        $alexaRequest  = RequestTypeFactory::createFromData(json_encode($data));
        $alexaResponse = new AlexaResponse();
        $textHelper    = new TextHelper();

        $smallImageUrl = 'https://image.server/small.png';
        $largeImageUrl = 'https://image.server/large.png';

        $stopIntent = new StopIntent($alexaRequest, $alexaResponse, $textHelper);
        $stopIntent->handle($smallImageUrl, $largeImageUrl);

        $expected = [
            'version'           => '1.0',
            'sessionAttributes' => [],
            'response'          => [
                'outputSpeech'     => [
                    'type' => 'SSML',
                    'ssml' => '<speak>stopMessage</speak>',
                ],
                'card'             => [
                    'type'  => 'Standard',
                    'title' => 'stopTitle',
                    'text'  => 'stopMessage',
                    'image' => [
                        'smallImageUrl' => 'https://image.server/small.png',
                        'largeImageUrl' => 'https://image.server/large.png',
                    ],
                ],
                'shouldEndSession' => true,
            ],
        ];

        $this->assertEquals($expected, $alexaResponse->toArray());
    }
}