<?php namespace App\Http\Controllers\Config;

use App\Services\Db\Projects\AttachPermissionsService;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Server;
use Auth, Request;

/**
 * @Middleware("auth")
 */
class ConnectController extends Controller
{
    protected $title = 'Conectar ao servidor';

    protected $actions = [];

    /**
     * @Get("config/servers/connect/{id}", as="config.servers.connect")
     */
    public function index($id)
    {
        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Senha de autenticação ssh",
                    'class' => 'panel-default',
                    'body' => view('pages.config.servers.connect', compact('id'))
                ])
            ],
        ]);
    }

    /**
     * @Post("config/servers/connect/{id}", as="config.servers.connect")
     */
    public function store($id)
    {
        $Server = Server::find($id);

        $command = sprintf('ssh-copy-id "%s@%s -p %s"', $Server->login, $Server->ip, Request::get('password'));
        exec($command, $outputs, $ret);

        if ($ret) {
            return $this->toRoute('config.servers.connect', "Operação realizada com sucesso!", 'success');
        } else {
            return $this->toRoute('config.servers.connect', "Não foi possível conectar ao servidor.", 'success');
        }
    }

}