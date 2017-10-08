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

namespace TravelloAlexaLibrary\Session;

use TravelloAlexaLibrary\Request\AlexaRequest;

/**
 * Class SessionContainer
 *
 * @package TravelloAlexaLibrary\Session
 */
class SessionContainer implements SessionContainerInterface
{
    /** @var array */
    private $attributes = [];

    /** @var array */
    private $defaults = [];

    /**
     * SessionContainer constructor.
     *
     * @param array $defaults
     */
    public function __construct(array $defaults)
    {
        $this->defaults = $defaults;

        foreach ($defaults as $attributeKey => $attributeValue) {
            $this->setAttribute($attributeKey, $attributeValue);
        }
    }

    /**
     * Init the session attributes from alexa request
     *
     * @param AlexaRequest $alexaRequest
     */
    public function initAttributes(AlexaRequest $alexaRequest)
    {
        foreach ($alexaRequest->getSession()->getAttributes() as $attributeKey => $attributeValue) {
            $this->setAttribute($attributeKey, $attributeValue);
        }
    }

    /**
     * Reset the attributes values
     */
    public function resetAttributes()
    {
        foreach ($this->defaults as $attributeKey => $attributeValue) {
            $this->setAttribute($attributeKey, $attributeValue);
        }
    }

    /**
     * Set session attribute
     *
     * @param string       $attributeKey
     * @param string|array $attributeValue
     */
    public function setAttribute(string $attributeKey, $attributeValue)
    {
        $this->attributes[$attributeKey] = $attributeValue;
    }

    /**
     * Append session attribute
     *
     * @param string $attributeKey
     * @param string $attributeValue
     */
    public function appendAttribute(string $attributeKey, string $attributeValue)
    {
        if (!is_array($this->attributes[$attributeKey])) {
            $this->attributes[$attributeKey] = [$this->attributes[$attributeKey]];
        }

        $this->attributes[$attributeKey][] = $attributeValue;
    }

    /**
     * Remove session attribute
     *
     * @param string $attributeKey
     */
    public function removeAttribute(string $attributeKey)
    {
        if (isset($this->attributes[$attributeKey])) {
            unset($this->attributes[$attributeKey]);
        }
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
