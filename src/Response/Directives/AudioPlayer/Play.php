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

namespace TravelloAlexaLibrary\Response\Directives\AudioPlayer;

use TravelloAlexaLibrary\Response\Directives\DirectivesInterface;

/**
 * Class Play
 *
 * @package TravelloAlexaLibrary\Response\Directives\AudioPlayer
 */
class Play implements DirectivesInterface
{
    const PLAY_BEHAVIOR_REPLACE_ALL = 'REPLACE_ALL';
    const PLAY_BEHAVIOR_ENQUEUE = 'ENQUEUE';
    const PLAY_BEHAVIOR_REPLACE_ENQUEUED = 'REPLACE_ENQUEUED';

    /** @var string */
    protected $playBehavior;

    /** @var string */
    protected $url;

    /** @var string */
    protected $token;

    /** @var string */
    protected $expectedPreviousToken;

    /** @var int */
    protected $offsetInMilliseconds;

    /**
     * Play constructor.
     *
     * @param string $playBehavior
     * @param string $url
     * @param string $token
     * @param string $expectedPreviousToken
     * @param int    $offsetInMilliseconds
     */
    public function __construct(
        string $playBehavior,
        string $url,
        string $token,
        string $expectedPreviousToken = null,
        int $offsetInMilliseconds = 0
    ) {
        $this->setPlayBehavior($playBehavior);
        $this->setUrl($url);
        $this->setToken($token);
        $this->setExpectedPreviousToken($expectedPreviousToken);
        $this->setOffsetInMilliseconds($offsetInMilliseconds);
    }

    /**
     * Render the directives object to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type'         => 'AudioPlayer.Play',
            'playBehavior' => $this->playBehavior,
            'audioItem'    => [
                'stream' => [
                    'url'                   => $this->url,
                    'token'                 => $this->token,
                    'expectedPreviousToken' => $this->expectedPreviousToken,
                    'offsetInMilliseconds'  => $this->offsetInMilliseconds,
                ],
            ],
        ];
    }

    /**
     * @param string $playBehavior
     */
    private function setPlayBehavior(string $playBehavior)
    {
        switch ($playBehavior) {
            case self::PLAY_BEHAVIOR_REPLACE_ALL:
            case self::PLAY_BEHAVIOR_ENQUEUE:
            case self::PLAY_BEHAVIOR_REPLACE_ENQUEUED:
                $this->playBehavior = $playBehavior;
                break;

            default:
                $this->playBehavior = self::PLAY_BEHAVIOR_REPLACE_ALL;
        }
    }

    /**
     * @param string $url
     */
    private function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $token
     */
    private function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param string $expectedPreviousToken
     */
    private function setExpectedPreviousToken(string $expectedPreviousToken)
    {
        $this->expectedPreviousToken = $expectedPreviousToken;
    }

    /**
     * @param int $offsetInMilliseconds
     */
    private function setOffsetInMilliseconds(int $offsetInMilliseconds)
    {
        $this->offsetInMilliseconds = $offsetInMilliseconds;
    }
}
