<?php

namespace Acme\StoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

    public function createAction()
    {
        $product = new Product();
        $product->setName('A foo bar');
        $product->setPrice('10.11');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id'.$product->getId());
    }

    public function showAction($id)
    {
        $product = $this->get('doctrine_mongodb')
            ->getRepository('StoreBundle:Product')
            ->find($id);

        if(!$product) {
            throw $this->createNotFoundException('No product found for id'.$id);
        }
        return $this->render(
            'product/showProduct.html.twig',
            array('product'=>$product)
        );
    }
}




