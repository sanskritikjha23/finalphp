function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credenyials = $request->only('email','password');
        if(Auth::attempt(credenyials)){
            return redirect(route(name:'task'))->with("success");
        }
        return redirect(route(name:'login'))->with("error","login not valid");
    }
 
 
 
    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
 
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
   
 
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error","try again");
        }
        return redirect(route('login'))->with("error","try again");
    }