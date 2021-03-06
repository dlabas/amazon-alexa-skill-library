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

namespace TravelloAlexaLibrary\TextHelper;

/**
 * Interface TextHelper
 *
 * @package TravelloAlexaLibrary\TextHelper
 *
 * @method string getHelpMessage()
 * @method string getHelpTitle()
 * @method string getLaunchMessage()
 * @method string getLaunchTitle()
 * @method string getRepromptMessage()
 * @method string getCancelMessage()
 * @method string getCancelTitle()
 * @method string getStopMessage()
 * @method string getStopTitle()
 */
interface TextHelperInterface
{
    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale(string $locale);
}
