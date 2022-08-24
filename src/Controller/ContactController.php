<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer)
    {

        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new TemplatedEmail())
                ->from($contactFormData['email'])
                ->to('contact@bluedrop.fr')
                ->subject('You got mail')
                // ->text(
                //     'Sender : ' . $contactFormData['email'] . \PHP_EOL .
                //     $contactFormData['message'],
                //     $contactFormData['phonenumber'],
                //     'text/plain'
                // );
            ->htmlTemplate('contact/mail.html.twig')
           ->context([
                'fullName'=>$contactFormData['fullName'],
                'address'=>$contactFormData['email'] ,
                'phonnumber'=>$contactFormData['phonenumber'],
                'selectpack'=>$contactFormData['selectpack'],
                'message' => $contactFormData['message'],
           ]);
            
            $mailer->send($message);


            $this->addFlash('message', 'Your message has been sent');

            return $this->redirect($this->generateUrl('app_contact'));      
          }
        return $this->render('contact/index.html.twig', [
            'contactform' => $form->createView()
        ]);
    }
}


























        // $formBuilder = $this->createFormBuilder()
// ->add('field',TextareaType::class,[
// 'attr'=>array('rows'=>'5')

// ])
// ->add('email',EmailType::class,[
//             'attr' => [
//                 'class' => 'block border border-[#2B292D] placeholder-[#605F61] border-2  w-full h-full p-3 rounded-3xl mb-4',
//                 'placeholder' => 'email',

//             ],
// ])
// ->add('Submit',SubmitType::class)
// ->getForm();
// $formBuilder->handleRequest($request);

// if ($formBuilder->isSubmitted() && $formBuilder->isValid()) { 
//     $input=$formBuilder->getData();
//     $text=($input['field']);
//     $text2=($input['email']);
//          $developer='admin';
//    $email=(new TemplatedEmail())
//         ->from('admin@gmail.com')
//         ->to('bluedrop@gmail.com')
//         ->subject('Message')
//         // ->text('exfta')
//         ->htmlTemplate('contact/mail.html.twig')
//         ->context([
//          'developer'=>$developer,
//          'text'=>$text,$text2
//         ]);
//         $mailer->send($email);
//         $this->addFlash('message','message sent');

// return $this->redirect($this->generateUrl('app_contact'));
// }
//    return $this->render('contact/index.html.twig', [
//             'formBuilder' => $formBuilder->createView(),
//     ]);

   
     
//     }
// }
