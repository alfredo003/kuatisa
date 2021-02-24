<?php

namespace Source\App;
use Source\Models\Auth;
use Source\Models\User;
use Source\Models\Faq\Question;
use Source\Core\Controller;
use Source\Support\Pager;
use Source\Models\Category;
use Source\Models\Service;

/**
 * Web Controller
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
         $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,
            "video" => "lDZGl9Wdc7Y",
            "services" =>(new Service())
            ->find()
            ->limit(6)
            ->fetch(true)
        ]);
    }

    /**
     * SITE ABOUT
     */
    public function about(): void
    {
      
        $head = $this->seo->render(
            "Descubra o " . CONF_SITE_NAME . " - " . CONF_SITE_DESC,
            CONF_SITE_DESC,
            url("/sobre"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("about", [
            "head" => $head,
            "video" => "lDZGl9Wdc7Y",
            "faq" => (new Question)
            ->find("channel_id = :id","id=1","question,response")
            ->order("order_by")
            ->fetch(true)
        ]);
    }

    /**
     * SITE SERVIÇOS
     * @param array|null $data
     */
    public function servico(?array $data): void
    {
        $head = $this->seo->render(
            "Nossos Serviços - " . CONF_SITE_NAME,
            "Confira em nosso blog dicas e sacadas de como controlar melhorar suas contas. Vamos tomar um café?",
            url("/servico"),
            theme("/assets/images/share.jpg")
        );
        
        $services = (new Service())->find();
        
        $pager = new Pager(url("/servico/page/"));
        $pager->pager($services->find()->count(), 9, ($data['page'] ?? 1));

        echo $this->view->render("servico", [
            "head" => $head,
            "services" => $services->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }


    public function serviceSearch(array $data):void
    {
        if(!empty($data['s'])){
        
         $search = filter_var($data['s'],FILTER_SANITIZE_STRIPPED);
         echo json_encode(["redirect"=>url("/servico/buscar/{$search}/1")]);
         return;
         }

         if(empty($data['terms'])){
             redirect("/servico");
         }
       
         $search = filter_var($data['terms'],FILTER_SANITIZE_STRIPPED);
         $page = (filter_var($data['page'],FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);
         

         $head = $this->seo->render(
             "Pesquisa por {$search} - ".CONF_SITE_NAME,
             "Verifique os resultados de sua pesquisa para {$search}",
              url("/servico/buscar/{$search}/{$page}"),
              theme("/assets/images/share.png")
         );

         $serviceSearch = (new Service())->find("title LIKE :s OR subtitle LIKE :s","s=%{$search}%");
        
         if(!$serviceSearch->count()){
            echo $this->view->render("servico",[
            "head"=>$head,
            "title"=>"ESQUISA POR:",
            "search" =>$search
            ]);
            return;

         }
         $pager = new Pager(url("/servico/buscar/{$search}/"));
         $pager->pager($serviceSearch->count(),9,$page);
         echo $this->view->render("servico",[
             "head" =>$head,
             "title"=>"PESQUISAR POR:",
             "search" =>$search,
             "services" => $serviceSearch->limit($pager->limit())
             ->offset($pager->offset())
             ->fetch(true),
             "paginator"=>$pager->render()

         ]);
    }
  
    
    public function servicoPost(array $data): void
    {
        $service = (new Service())->findByUri($data['uri']);
        if (!$service) {
            redirect("/404");
        }

        $service->views += 1;
        $service->save();

        $head = $this->seo->render(
            "{$service->title} - " . CONF_SITE_NAME,
            $service->subtitle,
            url("/servico/{$service->uri}"),
            image($service->cover, 1200, 628)
        );

        echo $this->view->render("service-post", [
            "head" => $head,
            "service" => $service,
            "related" => (new Service())
                ->find("category = :c AND id != :i", "c={$service->category}&i={$service->id}")
                ->order("rand()")
                ->limit(3)
                ->fetch(true)
        ]);
    }

    
    public function tecnico(?array $data): void
    {
        $head = $this->seo->render(
            "Profissionais / Freelancer - " . CONF_SITE_NAME,
            "Confira em nosso blog dicas e sacadas de como controlar melhorar suas contas. Vamos tomar um café?",
            url("/servico"),
            theme("/assets/images/share.jpg")
        );
        
        $services = (new Service())->find();
        
        $pager = new Pager(url("/tecnico/page/"));
        $pager->pager($services->find()->count(), 9, ($data['page'] ?? 1));

        echo $this->view->render("servico", [
            "head" => $head,
            "services" => $services->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    /**
     * SITE BLOG POST
     * @param array $data
     */
    public function tecnicoPost(array $data): void
    {
        $postName = $data['postName'];

        $head = $this->seo->render(
            "POST NAME - " . CONF_SITE_NAME,
            "POST HEADLINE",
            url("/tecnico/{$postName}"),
            theme("BLOG IMAGE")
        );

        echo $this->view->render("tecnico-post", [
            "head" => $head,
            "data" => $this->seo->data()
        ]);
    }


    /**
     * SITE LOGIN
     */
    public function login()
    {
        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/entrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-login", [
            "head" => $head
        ]);
    }

    /**
     * SITE PASSWORD FORGET
     */
    public function forget()
    {
        $head = $this->seo->render(
            "Recuperar Senha - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/recuperar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-forget", [
            "head" => $head
        ]);
    }
 
    /**
     * SITE REGISTER
     * @param null|array $data
     */
    public function register(?array $data):void
    {
        if(!empty($data['csrf'])){
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, porfavor use o formulário")->render();
                echo json_encode($json);
                return;
            }
             if(in_array("",$data)){
                $json['message'] = $this->message->info("Informe seus dados para criar sua conta")->render();
                echo json_encode($json);
                return;
             }

             $auth = new Auth();
             $user = new User();
             $user->bootstrap(
             $data["first_name"],
             $data["last_name"],
             $data["email"],
             $data["password"]
             );

            if($auth->register($user)){
                $json['redirect'] = url("/confirma");
            }else{
                $json['message'] = $auth->message()->render();
            }
             echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Criar Conta - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-register", [
            "head" => $head
        ]);
    }

    /**
     * SITE OPT-IN CONFIRM
     */
    public function confirm()
    {
        $head = $this->seo->render(
            "Confirme Seu Cadastro - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/confirma"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("optin-confirm", [
            "head" => $head
        ]);
    }

    /**
     * SITE OPT-IN SUCCESS
     */
    public function success()
    {
        $head = $this->seo->render(
            "Bem-vindo(a) ao " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/obrigado"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("optin-success", [
            "head" => $head
        ]);
    }

    /**
     * SITE TERMS
     */
    public function terms(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Termos de uso",
            CONF_SITE_DESC,
            url("/termos"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("terms", [
            "head" => $head
        ]);
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indispinível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}