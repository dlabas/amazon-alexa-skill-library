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

namespace TravelloAlexaLibraryTest\Request\Certificate;

use PHPUnit\Framework\TestCase;
use TravelloAlexaLibrary\Request\Certificate\CertificateLoader;

/**
 * Class CertificateLoaderTest
 *
 * @package TravelloAlexaLibraryTest\Request\Certificate
 */
class CertificateLoaderTest extends TestCase
{
    /**
     * @var string
     */
    private $certificateUrl = 'https://s3.amazonaws.com/echo.api/echo-api-cert-5.pem';

    /**
     *
     */
    public function testLoadCertificate()
    {
        $loader = new CertificateLoader();

        $expected = implode(
            file(__DIR__ . '/TestAssets/echo-api-cert-5.pem'),
            ''
        );

        $this->assertEquals($expected, $loader->load($this->certificateUrl));

    }

    /**
     *
     */
    public function testLoadCertificateWithInvalidCache()
    {
        if (file_exists('/tmp/echo-api-cert-5.pem')) {
            unlink('/tmp/echo-api-cert-5.pem');
        }

        $loader = new CertificateLoader(true, '/tmp');

        $expected = implode(
            file(__DIR__ . '/TestAssets/echo-api-cert-5.pem'),
            ''
        );

        $this->assertEquals($expected, $loader->load($this->certificateUrl));
    }

    /**
     *
     */
    public function testLoadCertificateWithValidCache()
    {
        if (file_exists('/tmp/echo-api-cert-5.pem')) {
            unlink('/tmp/echo-api-cert-5.pem');
        }

        copy(__DIR__ . '/TestAssets/echo-api-cert-5.pem', '/tmp/echo-api-cert-5.pem');

        $loader = new CertificateLoader(true, '/tmp');

        $expected = implode(
            file(__DIR__ . '/TestAssets/echo-api-cert-5.pem'),
            ''
        );

        $this->assertEquals($expected, $loader->load($this->certificateUrl));

        if (file_exists('/tmp/echo-api-cert-5.pem')) {
            unlink('/tmp/echo-api-cert-5.pem');
        }
    }
}
