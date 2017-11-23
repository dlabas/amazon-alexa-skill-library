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
 * Interface Context
 *
 * @package TravelloAlexaLibrary\Request\Context
 */
interface ContextInterface
{
    /**
     * @param AudioPlayerInterface $audioPlayer
     */
    public function setAudioPlayer(AudioPlayerInterface $audioPlayer);

    /**
     * @return AudioPlayerInterface
     */
    public function getAudioPlayer();

    /**
     * @param SystemInterface $system
     */
    public function setSystem(SystemInterface $system);

    /**
     * @return SystemInterface|null
     */
    public function getSystem();

    /**
     * @param DisplayInterface $display
     */
    public function setDisplay(DisplayInterface $display);

    /**
     * @return DisplayInterface
     */
    public function getDisplay(): DisplayInterface;
}
