<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{count}")
     */
    public function luckyAction($count)
    {
        #$number = rand(0, 100);

        /*
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
         */
        // json return
        //$data = array(
        //   'lucky_number'=>rand(0,100),
        //);
        /*
        return new Response(
            json_encode($data),
            200,
            array('Content-Type'=>'application/json')
        );
         */
        // use JsonResponse
        //return new JsonResponse($data);
        $numbers = array();
        for ($i=0;$i<$count;$i++){
            $numbers[] = rand(0,100);
        }
        $numbersList = implode(',', $numbers);

        // use twig template without extends Controller
        /*
        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            array('luckyNumberList'=>$numbersList)
        );
        return new Response($html);
         */
        // use twig template with extends Controller
        return $this->render(
            'lucky/number.html.twig',
            array('luckyNumberList'=>$numbersList)
        );
    }
}


