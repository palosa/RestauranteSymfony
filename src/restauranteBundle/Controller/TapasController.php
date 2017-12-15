<?php

namespace restauranteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use restauranteBundle\Entity\tapas;
use restauranteBundle\Form\tapasType;
use Symfony\Component\HttpFoundation\Request;

class TapasController extends Controller
{
  public function tapasMostrarAction()
  {
        $repository = $this->getDoctrine()->getRepository('restauranteBundle:tapas');

        $tapas = $repository->findAll();

      return $this->render('restauranteBundle:carpeta_tapas:tapasRestaurante.html.twig',array('tablaTapas'=>$tapas));
  }
  public function tapaIdAction($id)
  {
        $repository = $this->getDoctrine()->getRepository('restauranteBundle:tapas');


        $tapas = $repository->find($id);

      return $this->render('restauranteBundle:carpeta_tapas:tapasIdRestaurante.html.twig',array('id'=>$tapas));
  }
  public function crearTapaAction(Request $request)
  {
      $tapa = new tapas();

      $form= $this->createForm(tapasType::class,$tapa);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

          $tapa = $form->getData();


           $DB = $this->getDoctrine()->getManager();
           $DB->persist($tapa);
           $DB->flush();

          return $this->redirectToRoute('restaurante_mostrar');
      }
      return $this->render('restauranteBundle:Carpeta_tapas:insertarTapa.html.twig',array('form' => $form->createView() ));
  }
  public function actualizarTapaAction(Request $request,$id)
  {
      $tapa = $this->getDoctrine()->getRepository('restauranteBundle:tapas')->find($id);
        if (!$tapa){
          return $this->redirectToRoute('restaurante_mostrar');
        }
      $form = $this->createForm(\restauranteBundle\Form\tapasType::class, $tapa);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
          $DB = $this->getDoctrine()->getManager();
          $DB->persist($tapa);
          $DB->flush();
          return $this->redirectToRoute('restaurante_mostrar', ["id" => $id]);
      }
      return $this->render('restauranteBundle:Carpeta_tapas:insertarTapa.html.twig', array('form'=>$form->createView() ));
  }
  public function eliminarTapaAction($id)
  {
          $DB = $this->getDoctrine()->getManager();

          $tapa = $DB->getRepository('restauranteBundle:tapas')->find($id);

          $DB->remove($tapa);
          $DB->flush();

      return $this->redirectToRoute('restaurante_mostrar');
  }
}
