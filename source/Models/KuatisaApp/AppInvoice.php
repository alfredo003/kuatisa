<?php
namespace Source\Models\KuatisaApp;
use Source\Core\Model;

class AppInvoice extends Model
{

    public function __construct()
    {
       parent::__construct("app_invoices",["id"],
       ["user_id","wallet_id", "category_id","description","type", "due_at","repeat_when"]);
    }
}