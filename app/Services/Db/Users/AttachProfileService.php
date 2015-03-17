<?php namespace App\Services\Db\Users;

use App\Models\Profile;
use Exception;
use Validator;

class AttachProfileService extends UserService
{

    public function execute($User, $vcs)
    {
        $User->profiles()->delete();

        if (count($vcs)) {
            try {
                foreach ($vcs as $name => $data) {
                    if ($data['user'] && $name) {
                        $Profile = new Profile();
                        $Profile->user = $data['user'];
                        $Profile->vcs = $name;

                        if (isset($data['password'])) {
                            $Profile->password = $data['password'];
                        }

                        $User->profiles()->save($Profile);
                    }
                }

                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        return false;
    }

}
