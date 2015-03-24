<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Profile\DataRequest;
use App\Services\Db\Projects\AttachPermissionsService;
use App\Services\Db\Users\AttachProfileService;
use App\Services\Db\Users\UpdateUserService;
use Auth;
use Exception;
use Request;

/**
 * @Middleware("auth")
 */
class ProfileController extends Controller
{
    protected $title = 'Meus Dados';

    protected $actions = [];

    /**
     * @Get("profile", as="config.profile.index")
     */
    public function index()
    {
        return view('layouts.page', [
            'contents' => [
                view('pages.config.profile.index', [
                    'vcs' => [
                        'bitbucket' => Auth::user()->getProfile('bitbucket'),
                        'github' => Auth::user()->getProfile('github'),
                    ],
                    'ssh' => [
                        'rsa' => file_get_contents("/home/vagrant/.ssh/id_rsa.pub")
                    ]
                ])
            ],
        ]);
    }

    /**
     * @Post("profile/data", as="config.profile.data")
     */
    public function data(DataRequest $request, UpdateUserService $update)
    {
        if ($update->execute($request->all(), Auth::user()->id)) {
            return $this->toRoute('config.profile.index', "Dados atualizados com sucesso!", 'success');
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(["Não foi atualizar os dados."]);
        }
    }

    /**
     * @Post("profile/vcs", as="config.profile.vcs")
     */
    public function vcs(AttachProfileService $service)
    {
        try {
            if ($service->execute(Auth::user(), Request::get('vcs'))) {
                return $this->toRoute('config.profile.index', "Dados atualizados com sucesso!", 'success');
            } else {
                return redirect()->back()->withInput(Request::all())->withErrors(["Não foi atualizar os dados."]);
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput(Request::all())->withErrors(["Não foi atualizar os dados."]);
        }
    }

}
