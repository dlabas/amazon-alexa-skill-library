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

namespace TravelloAlexaLibrary\Response\Directives\Display;

/**
 * Class Image
 *
 * @package TravelloAlexaLibrary\Response\Directives\Display
 */
class Image
{
    /** @var string */
    private $contentDescription;

    /** @var string */
    private $urlXSmall;

    /** @var string */
    private $urlSmall;

    /** @var string */
    private $urlMedium;

    /** @var string */
    private $urlLarge;

    /** @var string */
    private $urlXLarge;

    /**
     * Image constructor.
     *
     * @param string $contentDescription
     */
    public function __construct(string $contentDescription)
    {
        $this->contentDescription = $contentDescription;
    }

    /**
     * @param string $urlXSmall
     */
    public function setUrlXSmall(string $urlXSmall)
    {
        $this->urlXSmall = $urlXSmall;
    }

    /**
     * @param string $urlSmall
     */
    public function setUrlSmall(string $urlSmall)
    {
        $this->urlSmall = $urlSmall;
    }

    /**
     * @param string $urlMedium
     */
    public function setUrlMedium(string $urlMedium)
    {
        $this->urlMedium = $urlMedium;
    }

    /**
     * @param string $urlLarge
     */
    public function setUrlLarge(string $urlLarge)
    {
        $this->urlLarge = $urlLarge;
    }

    /**
     * @param string $urlXLarge
     */
    public function setUrlXLarge(string $urlXLarge)
    {
        $this->urlXLarge = $urlXLarge;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'contentDescription' => $this->contentDescription,
            'sources'            => [],
        ];

        if ($this->urlXSmall) {
            $data['sources'][] = [
                'url'  => $this->urlXSmall,
                'type' => 'X_SMALL',
            ];
        }

        if ($this->urlSmall) {
            $data['sources'][] = [
                'url'  => $this->urlSmall,
                'type' => 'SMALL',
            ];
        }

        if ($this->urlMedium) {
            $data['sources'][] = [
                'url'  => $this->urlMedium,
                'type' => 'MEDIUM',
            ];
        }

        if ($this->urlLarge) {
            $data['sources'][] = [
                'url'  => $this->urlLarge,
                'type' => 'LARGE',
            ];
        }

        if ($this->urlXLarge) {
            $data['sources'][] = [
                'url'  => $this->urlXLarge,
                'type' => 'X_LARGE',
            ];
        }

        return $data;
    }
}
