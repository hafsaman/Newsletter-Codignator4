<?php namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model
{
protected $table = 'ci_subscriber';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name', 'email'];
}

?>