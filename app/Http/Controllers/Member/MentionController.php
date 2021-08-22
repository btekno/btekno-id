

public function users(Request $request)
{
    if ($request['query']) {
        $users = User::select('username', 'firstname', 'lastname', 'avatar', 'is_verified')
            ->search($request['query'])
            ->take(10)
            ->get();
    } else {
        $users = '';
    }

    return $users;
}