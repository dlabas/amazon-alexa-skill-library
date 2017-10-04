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

namespace TravelloAlexaLibrary\Request\RequestType;

use TravelloAlexaLibrary\Request\RequestType\Error\ErrorInterface;

/**
 * Class SessionEndedRequestType
 *
 * @package TravelloAlexaLibrary\Request\RequestType
 */
class SessionEndedRequestType extends AbstractRequestType
{
    const NAME = 'SessionEndedRequest';

    /** @var ErrorInterface */
    private $error;

    /** @var string */
    private $reason;

    /** @var string */
    private $type = 'SessionEndedRequest';

    /**
     * SessionEndedRequestType constructor.
     *
     * @param string         $requestId
     * @param string         $timestamp
     * @param string         $locale
     * @param string         $reason
     * @param ErrorInterface $error
     */
    public function __construct(
        string $requestId,
        string $timestamp,
        string $locale,
        string $reason,
        ErrorInterface $error = null
    ) {
        $this->requestId = $requestId;
        $this->timestamp = $timestamp;
        $this->locale    = $locale;
        $this->reason    = $reason;
        $this->error     = $error;
    }

    /**
     * @return ErrorInterface|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
