<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Urlmatrix;

class ShorturlService
{
    private $rep;
    private $em;
    private $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->rep = $this->em->getRepository(Urlmatrix::class);
    }

    public function shorten(String $url) 
    {
        $result = $this->generateShort($url);
        $this->save($url, $result);
        
        return $result;
    }

    protected function generateShort(): string
    {
        do {
            $str = '';
            for($i=0;$i<8;$i++) {
                $str .= $this->chars[rand(0, strlen($this->chars) -1)];
            }
        } while ($this->strExists($str) == true);
        
        return $str;
    }

    protected function strExists(string $str): bool
    {
        $result = $this->rep->findBy(['short' => $str]);

        if(!count($result))
            return false;
        
        return true;
    }

    protected function save(string $url, string $short)
    {
        $shrt = new Urlmatrix();
        $shrt->setUrl($url);
        $shrt->setShort($short);
        
        $this->em->persist($shrt);
        $this->em->flush();
    }
}