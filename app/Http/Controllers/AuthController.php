<?php namespace app\Http\Controllers;

use Auth;
use App\Models\System\User;
use App\Models\System\ADAuth;
use App\Models\Objects\UserObj;
use App\Models\System\StdLib;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {


    public function __construct() {
        $this->makeSSL();
    }

    private function makeSSL()
    {
        if(!isset($_SERVER["HTTPS"]) or $_SERVER["HTTPS"] != "on")
        {
            header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
            exit();
        }
    }

    public function authenticate($username, $password)
    {
        $adauth = new ADAuth("adcontroller");
        return $adauth->authenticate($username, $password);
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];

        $adauth = new ADAuth("adcontroller");
        $authenticated = $adauth->authenticate($username, $password);
        if($authenticated) {
            $user = User::find($username);
            if(is_null($user)) {
                $userobj = new UserObj($username);
                $memberships = $adauth->get_memberships();
                $adauth->change_controller("directory");
                $userinfo = $adauth->lookup_user($username);
                $userobj->name          = @$userinfo[0]["displayname"][0];
                $userobj->email         = @$userinfo[0]["mail"][0];
                $userobj->permission    = ($adauth->is_member("ASSETT-Office")) ? "admin" : "user";
                $userobj->created_at    = date("Y-m-d H:i:s");
                if(!$userobj->save()) {
                    return redirect()->action('AuthController@index')->with([
                        'flash_message' => array('danger' => 'Could not add user to the system.')
                    ]);
                }
                $user = User::find($username);
            }
            Auth::login($user);
            return Redirect::intended('/')->withInput();
        }
        else {
            return redirect()->action('AuthController@index')->with([
                'flash_message' => array('danger' => 'Could not authenticate user with those credentials.')
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('AuthController@index')->with([
            'flash_message' => array('success' => 'Successfully logged out.')
        ]);
    }

}