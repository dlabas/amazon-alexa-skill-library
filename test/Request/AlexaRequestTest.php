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

namespace TravelloAlexaLibraryTest\Request;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Request\AlexaRequest;
use TravelloAlexaLibrary\Request\Context\AudioPlayer;
use TravelloAlexaLibrary\Request\Context\Context;
use TravelloAlexaLibrary\Request\Context\System;
use TravelloAlexaLibrary\Request\Context\System\Application as SystemApplication;
use TravelloAlexaLibrary\Request\Context\System\Device;
use TravelloAlexaLibrary\Request\Context\System\User as SystemUser;
use TravelloAlexaLibrary\Request\Exception\BadRequest;
use TravelloAlexaLibrary\Request\RequestType\LaunchRequestType;
use TravelloAlexaLibrary\Request\Session\Application as SessionApplication;
use TravelloAlexaLibrary\Request\Session\Session;
use TravelloAlexaLibrary\Request\Session\User as SessionUser;

/**
 * Class AlexaRequestTest
 *
 * @package TravelloAlexaLibraryTest\Request
 */
class AlexaRequestTest extends TestCase
{
    /**
     *
     */
    public function testInstantiation()
    {
        $application = new SessionApplication('applicationId');

        $user = new SessionUser('userId');

        $session = new Session(
            true,
            'sessionId',
            $application,
            ['foo' => 'bar'],
            $user
        );

        $launchRequest = new LaunchRequestType(
            'requestId',
            '2017-01-27T20:29:59Z',
            'de-DE'
        );

        $context = new Context(
            new AudioPlayer('IDLE')
        );

        $rawRequestData = json_encode(['foo' => 'bar']);

        $alexaRequest = new AlexaRequest(
            'version',
            $launchRequest,
            $session,
            $context,
            $rawRequestData
        );

        $this->assertEquals('version', $alexaRequest->getVersion());
        $this->assertEquals($session, $alexaRequest->getSession());
        $this->assertEquals($launchRequest, $alexaRequest->getRequest());
        $this->assertEquals($context, $alexaRequest->getContext());
        $this->assertEquals($rawRequestData, $alexaRequest->getRawRequestData());

        $alexaRequest->checkApplication('applicationId');

        $this->expectException(BadRequest::class);
        $this->expectExceptionMessage('Application Id invalid');

        $alexaRequest->checkApplication('anotherApplicationId');
    }

    /**
     *
     */
    public function testCheckApplicationWithoutSession()
    {
        $launchRequest = new LaunchRequestType(
            'requestId',
            '2017-01-27T20:29:59Z',
            'de-DE'
        );

        $application = new SystemApplication('applicationId');
        $user        = new SystemUser('userId');
        $device      = new Device();
        $apiEndpoint = 'apiEndpoint';

        $system  = new System($application, $user, $device, $apiEndpoint);

        $context = new Context(
            new AudioPlayer('IDLE')
        );
        $context->setSystem($system);

        $rawRequestData = json_encode(['foo' => 'bar']);

        $alexaRequest = new AlexaRequest(
            'version',
            $launchRequest,
            null,
            $context,
            $rawRequestData
        );

        $this->assertEquals('version', $alexaRequest->getVersion());
        $this->assertEquals($launchRequest, $alexaRequest->getRequest());
        $this->assertEquals($context, $alexaRequest->getContext());
        $this->assertEquals($rawRequestData, $alexaRequest->getRawRequestData());

        $alexaRequest->checkApplication('applicationId');

        $this->expectException(BadRequest::class);
        $this->expectExceptionMessage('Application Id invalid');

        $alexaRequest->checkApplication('anotherApplicationId');
    }

    /**
     *
     */
    public function testCheckApplicationWithoutSessionAndContext()
    {
        $launchRequest = new LaunchRequestType(
            'requestId',
            '2017-01-27T20:29:59Z',
            'de-DE'
        );

        $rawRequestData = json_encode(['foo' => 'bar']);

        $alexaRequest = new AlexaRequest(
            'version',
            $launchRequest,
            null,
            null,
            $rawRequestData
        );

        $this->assertEquals('version', $alexaRequest->getVersion());
        $this->assertEquals($launchRequest, $alexaRequest->getRequest());
        $this->assertEquals($rawRequestData, $alexaRequest->getRawRequestData());

        $this->expectException(BadRequest::class);
        $this->expectExceptionMessage('Application Id invalid');

        $alexaRequest->checkApplication('applicationId');
    }
}
