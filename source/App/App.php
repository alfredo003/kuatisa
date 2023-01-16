<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Message;
use Source\Models\Category;
use Source\Models\Service;
use Source\Models\Request;
use Source\Support\Upload;
/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o kuatisa Admin.")->flash();
            redirect("/entrar");
        }

        (new Access())->report();
        (new Online())->report();
    }

    /**
     * APP HOME
     */
    public function home()
    {
        $service = (new Service())->find("author = :u","u={$this->user->id}")->count();
        $cliente = (new Request())->find("auth = :u","u={$this->user->id}")->count();
        $request = (new Request())->find("auth = :u","u={$this->user->id}")->fetch(true);
        $head = $this->seo->render(
            "Olá {$this->user->first_name}. Vamos controlar? - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

    echo $this->view->render("home", [
            "head" => $head,
            "request" => $request,
            "service" =>  $service,
            "cliente" =>$cliente
        ]);
    

    
}
   
    public function publicar(?array $data):void
    {
    
    if (!empty($data['csrf'])) {
        if (!csrf_verify($data)) {
            $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
            echo json_encode($json);
            return;
        }
        if (in_array("", $data)) {
            $json['message'] = $this->message->info("Informe seus dados para criar sua conta.")->render();
            echo json_encode($json);
            return;
        }



        $post = (new Service());
        $post->author = $this->user->id;
        $post->category = $data['category'];
        $post->title = $data['title'];
        $post->uri = str_slug($data['title']);
        $post->subtitle = $data['subtitle'];
        $post->content = $data['content'];
        $post->status = 'post';
       
        if (!empty($_FILES["cover"])) {
            $file = $_FILES["cover"];
            $upload = new Upload();

            if (!$post->cover = $upload->image($file, "{$post->uri} {$post->author} " . time(), 360)) {
                $json["message"] = $upload->message()->before("Ooops {$this->user->first_name}! ")->render();
                echo json_encode($json);
                return;
            }
        }


        if (!$post->save()) {
            $json['message'] = $this->message->error("Erro ao fazer a postagem..!")->render();
            echo json_encode($json);
            return;
        }else{
            $json['redirect'] = url("/app/listagem-servicos");
            echo json_encode($json);
            return;
        }
    }


        $head = $this->seo->render(
            "Postar serviços  - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("publicar", [
            "head" => $head,
            "categorias" => (new Category())->find()->fetch(true)
        ]);
    
}

   
    public function listagemServico()
    {

        $servicos = (new Service())->find("author = :u","u={$this->user->id}")->fetch(true);
        $head = $this->seo->render(
            "Lista de Serviço - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("listagemServico", [
            "head" => $head,
            "servicos" => $servicos
            
            
        ]);
    }

    /**
     * APP INVOICE (Fatura)
     */
    public function agenda()
    {
        $request = (new Request())->find("auth = :u","u={$this->user->id}")->fetch(true);
        $head = $this->seo->render(
            "Agenda de clientes - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("agenda", [
            "head" => $head,
            "request" => $request
        ]);
    }

    /**
     * APP PROFILE (Perfil)
     */
    public function profile(?array $data): void
    {
        if (!empty($data["update"])) {
            //list($d, $m, $y) = explode("/", $data["datebirth"]);
            $user = (new User())->findById($this->user->id);
            $user->first_name = $data["first_name"];
            $user->last_name = $data["last_name"];
            $user->email = $data["email"];
        
            if (!empty($_FILES["photo"])) {
                $file = $_FILES["photo"];
                $upload = new Upload();

                if ($this->user->photo()) {
                    (new Thumb())->flush("storage/{$this->user->photo}");
                    $upload->remove("storage/{$this->user->photo}");
                }

                if (!$user->photo = $upload->image($file, "{$user->first_name} {$user->last_name} " . time(), 360)) {
                    $json["message"] = $upload->message()->before("Ooops {$this->user->first_name}! ")->after(".")->render();
                    echo json_encode($json);
                    return;
                }
            }

            if (!empty($data["password"])) {
                if (empty($data["password_re"]) || $data["password"] != $data["password_re"]) {
                    $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                    echo json_encode($json);
                    return;
                }

                $user->password = $data["password"];
            }

            if (!$user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }

            $json["message"] = $this->message->success("Pronto {$this->user->first_name}. Seus dados foram atualizados com sucesso!")->render();
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("profile", [
            "head" => $head,
            "user" => $this->user,
            "photo" => ($this->user->photo() ? image($this->user->photo, 360, 360) :
                theme("/assets/images/avatar.jpg", CONF_VIEW_APP))
        ]);
    }

    /**
     * APP LOGOUT
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}