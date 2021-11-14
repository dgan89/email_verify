<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 14.11.2021
 * Time: 17:27
 */

namespace Razmik\components;

use InvalidArgumentException;

/**
 * Проверка MX записи Email
 *
 * Class EmailMxRecordVerify
 * @package Razmik\components
 */
class EmailMxRecordVerify
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
     * @param string $email
     */
    public static function check(string $email)
    {
        $instance = new self($email);
        $instance->execute();
    }

    /**
     *
     */
    public function execute()
    {
        $email = $this->email;
        list(, $hostname) = explode("@", $email);

        $isValid = getmxrr($hostname, $mxRecords);

        if (
            $isValid === false ||
            count($mxRecords) === 0
        ) {
            throw new InvalidArgumentException("MX запись $email не валидна");
        }
    }
}