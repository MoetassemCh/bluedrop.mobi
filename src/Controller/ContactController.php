<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\RawMessage;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function sendEmail(MailerInterface $mailer,Request $request)
    {
$formBuilder = $this->createFormBuilder()
->add('field',TextareaType::class,[
'attr'=>array('rows'=>'5')

])
->add('Submit',SubmitType::class)
->getForm();
$formBuilder->handleRequest($request);

if ($formBuilder->isSubmitted() && $formBuilder->isValid()) { 
    $input=$formBuilder->getData();
    $text=($input['field']);
         $developer='admin';
   $email=(new TemplatedEmail())
        ->from('user@gmail.com')
        ->to('bluedrop@gmail.com')
        ->subject('Message')
        // ->text('exfta')
        ->htmlTemplate('contact/mail.html.twig')
        ->context([
                'developer'=>$developer,
         'text'=>$text
        ]);
        $mailer->send($email);
        $this->addFlash('message','message sent');

return $this->redirect($this->generateUrl('app_contact'));
}
   return $this->render('contact/index.html.twig', [
            'formBuilder' => $formBuilder->createView(),
    ]);

   
     
    }
}
