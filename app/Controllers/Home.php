<?php 
namespace App\Controllers;
use App\Models\SubscriberModel;
use App\Models\NewsletterModel;
use CodeIgniter\Controller;
class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------
public function add_new(){
            $subscribeModel = new SubscriberModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $emailid=$this->request->getVar('email');
       
       $subscriber = $subscribeModel->where('email', $emailid)->first();
        
        if(isset($subscriber) && count($subscriber) >0)
        {
            $message=' You have already subscribe for Newsletter.';
            header('Content-Type: application/x-json; charset=utf-8');
           
            echo(json_encode($message));
        }
        else
        {
        $insert =$subscribeModel->insert($data);
         header('Content-Type: application/x-json; charset=utf-8');
        //send email after subsription
         $email = \Config\Services::email();

        $email->setTo($emailid);
        $email->setFrom('alvimansuri01@gmail.com', 'Confirm Newsletter');
        
        $email->setSubject('Newaletter Subscription');
        $email->setMessage('You have successfully subscribe for Newsletter');

        if ($email->send()) 
        {
            $message='Successfully subscribe for newsletter. Send Email';
          
        } 
        else 
        {
            $message = $email->printDebugger(['headers']);
           
        }
            
        //end mailsend
       
           
            echo(json_encode($message));
        } 
        }
public function list()
{
    //$newsletterModel = new NewsletterModel();
     //   $data['newsletter'] = $newsletterModel->orderBy('id', 'DESC')->findAll();
    $data['message']='';
        return view('newsletter_list', $data);
    
}
public function listview(){
    $email=$this->request->getVar('email');
        $subscribeModel = new SubscriberModel();
        $subscriber = $subscribeModel->where('email', $email)->first();
        
        if(isset($subscriber) && count($subscriber) >0)
        {
             $newsletterModel = new NewsletterModel();
        $data['newsletter'] = $newsletterModel->orderBy('id', 'DESC')->findAll();
        $data['email']=$email;

        return view('newsletter_list', $data);
        }
        else
        {
            $data['message'] = 'No subscription found for  this  email.  Please Subscribe with  '.$email.'.';
        
        }
        return view('newsletter_list', $data);
    }
}
