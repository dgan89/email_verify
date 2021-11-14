<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 11.11.2021
 * Time: 19:00
 */

namespace Razmik;


use Razmik\components\EmailCorrectVerify;
use Razmik\components\EmailMxRecordVerify;

/**
 * Верификация Email адреса
 *
 * Class EmailVerify
 * @package PHP2021\src\components
 */
class EmailVerify
{
    /**
     * @var string
     */
    private string $email;

    /**
     * EmailVerify constructor
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = trim($email);
    }

    /**
     *
     */
    public function execute()
    {
        $email = $this->email;

        EmailCorrectVerify::check($email);
        EmailMxRecordVerify::check($email);
    }
}