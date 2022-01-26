<?php

namespace Ood;

class Truncater
{
    /**
     * @var array<string, mixed> Ood\Truncater::$options
     */
    private array $options = [
        'separator' => '...',
        'length' => 200
    ];
    /**
     * @var array<string, mixed> Ood\Truncater::$objOptions
     */
    private array $objOptions = [];

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(array $options = [])
    {
        $this->objOptions = array_merge($this->options, $options);
    }

    /**
     * @param array<string, mixed> $options
     */
    public function truncate(string $str, array $options = []): string
    {
        if ($this->options !== $this->objOptions or !empty($options)) {
            $this->options = array_merge($this->objOptions, $options);
        }

        $newStr = substr($str, 0, $this->options['length']);

        if (strlen($str) < $this->options['length']) {
            return "{$str}";
        }
        return "{$newStr}{$this->options['separator']}";
    }
}
