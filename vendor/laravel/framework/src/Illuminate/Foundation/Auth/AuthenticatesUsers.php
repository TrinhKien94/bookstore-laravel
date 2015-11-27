<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\User;
use Session;
use Illuminate\Http\Request;
use Cart;
trait AuthenticatesUsers
{
    use RedirectsUsers;

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return Controller::myView('auth.authenticate');
        }

        return Controller::myView('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
    public function getInfo(){
        return Controller::myView('auth.info');
    }
    public function getEdit(){
        return Controller::myView('auth.edit');
    }
    public function putUpdate(Request $request){
        // $user= User::findOrFail();

        $rules = array(
            'name'      => 'Required|Min:3|Max:80',
            'phone'=> 'required|digits_between:9,12',
            'password'  =>'Required|min:6|max:30',
            'password_confirmation'=>'Required|min:6|max:30|same:password',
            'address' => 'required|max:512|',
            'phone'=> 'required|digits_between:9,12',
            'birthday' =>'required|date|date_format:"d-m-Y"|after:"1915-01-01"|before:"2015-10-10"'
        );

        $validator = Validator::make($request->all(), $rules);
		$validator->after(function($validator) use ($request) {
    		$check = auth()->validate([
        	'email'    => Auth::user()->email,
        	'password' => $request->current_password
    	]);
	    if (!$check):$validator->errors()->add('current-password', 'Your current password is incorrect, please try again.');
    	endif;
		});
        if($validator -> passes())
        {
            $new_user_data= [
                'id'=>Auth::user()->id,
                'name'=>$request->input('name'),
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address'),
                'birthday'=> Carbon::parse($request->input('birthday'))->format('Y-m-d'),
                'password' => bcrypt($request->input('password'))
            ];

            // Auth::user()->update($new_user_data);
            User::where('id','=',Auth::user()->id)->update($new_user_data);
            Session::flash('flash_message', 'Update thành công!');
            return Redirect::to('auth/info');
        }
        else 
        {
            return Redirect::to('auth/edit')->withErrors($validator)
                                            ->withInput();
        }
    }
    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    /**
     * Determine if the class is using the ThrottlesLogins trait.
     *
     * @return bool
     */
    protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
    }
}
