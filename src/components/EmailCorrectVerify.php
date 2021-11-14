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
 * Проверка Email на корректность
 *
 * Class EmailCorrectVerify
 * @package Razmik\components
 */
class EmailCorrectVerify
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
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($isValid === false) {
            throw new InvalidArgumentException("Email $email указан не верно");
        }
    }
}