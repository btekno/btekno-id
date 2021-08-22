<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->view = 'main.members.settings';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Show member's data backup page
     *
     * @var Illuminate\View\View
     */
    public function index(): View
    {
        return view("$this->view.data", [
            'user' => me() 
        ]);
    }

    /**
     * A method to export member's account data
     *
     * @var Illuminate\Illuminate\Response
     */
    public function exportAccount()
    {
        if(auth()->check()):
            $account = User::find(me()->id);
            $data = collect([
                'account'         => $account,
                // 'followings'      => $account->followings()->get(),
                // 'followers'       => $account->followers()->get(), 
            ])->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $fileName = carbon()->format('d_m_Y_h_i_s').'_'.$account->username.'_data.json';
            $response = response($data, 200, [
                'Content-Type'        => 'application/json',
                'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            ]);

            logify(request(), 'User', me(), 'Exported the account data');

            return $response;
        endif;

        return toast($this, 'error', config('btekno.toast.deny'));
    }

    /**
     * A method to export member's logs data
     *
     * @var Illuminate\Illuminate\Response
     */
    public function exportLogs()
    {
        if(auth()->check()):
            $logs = Activity::causedBy(me())->get();
            $data = collect([
                'logs' => $logs,
            ])->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $fileName = carbon()->format('d_m_Y_h_i_s').'_'.me()->username.'_logs.json';
            $response = response($data, 200, [
                'Content-Type'        => 'application/json',
                'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            ]);

            logify(request(), 'User', me(), 'Exported the account logs');

            return $response;
        endif;

        return toast($this, 'error', config('btekno.toast.deny'));
    }
}