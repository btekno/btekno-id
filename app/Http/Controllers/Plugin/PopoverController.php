

public function user(User $user): View
{
    return view('user.popover', [
        'user' => $user,
    ]);
}