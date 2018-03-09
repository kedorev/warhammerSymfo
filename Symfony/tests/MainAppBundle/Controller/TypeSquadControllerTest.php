<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 22/11/17
 * Time: 11:48
 */
namespace Tests\MainAppBundle\Controller;

use MainAppBundle\Entity\SquadType;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeSquadControllerTest extends WebTestCase
{
    public function testTypeSquadName()
    {
        $string = "test";
        $type = new SquadType();
        $type->setName($string);
        $this->assertEquals($string,$type->getName());
    }

    public function testTypeSquadImage()
    {
        $string = "test.jpg";
        $type = new SquadType();
        $type->setImage($string);
        $this->assertEquals($string,$type->getImage());
    }
}