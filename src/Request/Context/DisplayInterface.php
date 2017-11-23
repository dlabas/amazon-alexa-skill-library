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
 * Interface DisplayInterface
 *
 * @package TravelloAlexaLibrary\Request\Context
 */
interface DisplayInterface
{
    /**
     * @return string
     */
    public function getTemplateVersion();

    /**
     * @param string $templateVersion
     */
    public function setTemplateVersion(string $templateVersion);

    /**
     * @return string
     */
    public function getMarkupVersion();

    /**
     * @param string $markupVersion
     */
    public function setMarkupVersion(string $markupVersion);

    /**
     * @return string
     */
    public function getToken();

    /**
     * @param string $token
     */
    public function setToken(string $token);
}
