<?php

namespace PG\Encryption;

class Encryption
{
    /**
     * Documentation for this.
     */
    const MODE_CFB = 'AES-128-OFB';

    /**
     * Documentation for this.
     */
    protected $key;

    /**
     * Documentation for this.
     */
    protected $IV;

    /**
     * Documentation for this.
     */
    protected $mode = self::MODE_CFB;

    /**
     * Documentation for this.
     */
    public static function instance()
    {
        return new static();
    }

    /**
     * Documentation for this.
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Documentation for this.
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Documentation for this.
     */
    public function setIV($IV)
    {
        $this->IV = $IV;

        return $this;
    }

    /**
     * Documentation for this.
     */
    public function getIV()
    {
        return $this->IV;
    }

    /**
     * Documentation for this.
     */
    public function encrypt($data)
    {
        $encrypted = openssl_encrypt($data, $this->mode, $this->key, OPENSSL_RAW_DATA, $this->IV);

        return base64_encode($encrypted);
    }

    /**
     * Documentation for this.
     */
    public function decrypt($data)
    {
        $data = base64_decode($data);

        $decrypted = openssl_decrypt($data, $this->mode, $this->key, OPENSSL_RAW_DATA, $this->IV);

        return $decrypted;
    }
}
