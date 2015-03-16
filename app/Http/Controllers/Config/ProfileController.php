<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Profile\DataRequest;
use App\Services\Db\Projects\AttachPermissionsService;
use App\Services\Db\Users\UpdateUserService;
use Auth;
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
                view('pages.config.profile.index')
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

}
