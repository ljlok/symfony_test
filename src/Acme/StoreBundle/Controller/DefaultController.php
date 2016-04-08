<?php

namespace Acme\StoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Document\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/store")
     */
    public function indexAction()
    {
        return $this->render('StoreBundle:Default:index.html.twig');
    }

    /**
     * @Route("/store/create_product")
     */

    public function createAction()
    {
        $inc_id = rand(0,100);
        $product = new Product();
        $product->setName('A foo bar');
        $product->setPrice('10.11');
        $product->setDid($inc_id);
        $product->setComments('Good!');

        $dm = $this->get('doctrine_mongodb')->getManager();
        #return new Response('test'.$elder_product->getDid());
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id'.$product->getId());
    }

    /**
     *@Route("/store/show_product/{id}")
     */

    public function showAction($id)
    {
        $product = $this->get('doctrine_mongodb')
            ->getRepository('StoreBundle:Product')
            ->findBy(array('did'=>(int)$id));
        var_dump($product);

        if(!$product) {
            throw $this->createNotFoundException('No product found for did '.$id);
        }
        return $this->render(
            'product/showProduct.html.twig',
            array('product'=>$product)
        );
    }
}




