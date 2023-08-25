<?php  
namespace App\Entity;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Task
{
    // ...

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('blogTitle', new NotBlank());

        $metadata->addPropertyConstraint('blogDescription', new NotBlank());

        $metadata->addPropertyConstraint('aaaaaaaaaaaaaaaaaau', new NotBlank());
        
    }
}


?>