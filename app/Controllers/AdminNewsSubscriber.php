<?php 
namespace App\Controllers;
use App\Models\SubscriberModel;
use CodeIgniter\Controller;

class AdminNewsSubscriber extends Controller
{
    // show subscribers list
    public function index(){
        $subscribeModel = new SubscriberModel();
        $data['subscriber'] = $subscribeModel->orderBy('id', 'DESC')->findAll();
        return view('admin/subscriber_view', $data);
    }

    // add subscriber form
    public function create(){
        return view('admin/add_subscriber');
    }
 
    // insert data
    public function storedata() {
      
    $subscribeModel = new SubscriberModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $email=$this->request->getVar('email');
        header('Content-Type: application/x-json; charset=utf-8');
           
        $subscriber = $subscribeModel->where('email', $email)->first();
        if($subscriber !=null)
        {
            $message=1;
           
            echo(json_encode($message));
        }
        else
        {
        $insert =$subscribeModel->insert($data);
        $message=2;
           
            echo(json_encode($message));
        }

    }

    // show single subscriber
    public function singleSubscriber($id = null){
        $subscribeModel = new SubscriberModel();
        $data['sub_obj'] = $subscribeModel->where('id', $id)->first();
        return view('admin/edit_view', $data);
    }

    // update subscriber data
    public function update(){
      
           $subscribeModel = new SubscriberModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $id = $this->request->getVar('id');
       
       
        $email=$this->request->getVar('email');
        header('Content-Type: application/x-json; charset=utf-8');
           
        $subscriber = $subscribeModel->where('email', $email)->first();
        if($subscriber !=null)
        {
            $message=1;
           
            echo(json_encode($message));
        }
        else
        {
         $subscribeModel->update($id, $data);
        $message=2;
           
            echo(json_encode($message));
        }
    }
 
    // delete subscriber
    public function delete($id = null){
        $subscribeModel = new SubscriberModel();
        $data['subscriber'] = $subscribeModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/admin/subscriber-list'));
    }    
}
?>