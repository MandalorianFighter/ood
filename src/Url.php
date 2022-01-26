<?php

namespace Ood;

class Url
{
    /**
     * @var array<string,mixed> Ood\Url::$httpAdress
     */
    private array $httpAdress = [];
    /**
     * @var array<string,string> Ood\Url::$strucParams
     */
    private array $strucParams = [];

    public function __construct(string $httpAdress)
    {
        if (parse_url($httpAdress) !== false) {
            $this->httpAdress = parse_url($httpAdress);
        }
    }


    public function getScheme(): string
    {
        return $this->httpAdress['scheme'];
    }

    public function getHostName(): string
    {
        return $this->httpAdress['host'];
    }

    /**
    * @return array<string,string>
    */

    public function getQueryParams(): array
    {
        $parstr = $this->httpAdress['query'];
        $params = explode('&', $parstr);

        $this->strucParams = array_reduce($params, function ($acc, $param) {
            $newParam = explode('=', $param);
            $key = $newParam[0];
            $value = $newParam[1];
            if (!array_key_exists($key, $acc)) {
                $acc[$key] = $value;
            }
            return $acc;
        }, []);

        return $this->strucParams;
    }

    public function getQueryParam(string $name, string $value = null): string | null
    {
        return array_key_exists($name, $this->strucParams) ? $this->strucParams[$name] : $value;
    }

    public function equals(Url $obj): bool
    {
        return $this->httpAdress === $obj->httpAdress;
    }
}
