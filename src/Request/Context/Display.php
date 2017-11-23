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

namespace TravelloAlexaLibrary\Request\Context;

/**
 * Class Display
 *
 * @package TravelloAlexaLibrary\Request\Context
 */
class Display implements DisplayInterface
{
    /** @var string */
    private $templateVersion;

    /** @var string */
    private $markupVersion;

    /** @var string */
    private $token;

    /**
     * @return string
     */
    public function getTemplateVersion()
    {
        return $this->templateVersion;
    }

    /**
     * @param string $templateVersion
     */
    public function setTemplateVersion(string $templateVersion)
    {
        $this->templateVersion = $templateVersion;
    }

    /**
     * @return string
     */
    public function getMarkupVersion()
    {
        return $this->markupVersion;
    }

    /**
     * @param string $markupVersion
     */
    public function setMarkupVersion(string $markupVersion)
    {
        $this->markupVersion = $markupVersion;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }
}
