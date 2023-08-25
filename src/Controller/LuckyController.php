<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number')]
    
    public function number(): Response
    {
        $number = random_int(0, 100);

        // return new Response(
        //     '<html><body>Lucky number: '.$number.'</body></html>'
        // );
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }

    // #[Route('/happy/number1')]

    // public function number_one(): Response
    // {
    //     $number = random_int(0, 100);

    //     return new Response(
    //         '<html><body>Lucky number1: '.$number.'</body></html>'
    //     );
    // }
}
?>