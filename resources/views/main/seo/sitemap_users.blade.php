@foreach ($users as $user)
    {{ 'https://taskord.com/@' . $user->username }}
    {{ 'https://taskord.com/@' . $user->username . '/stats' }}
    {{ 'https://taskord.com/@' . $user->username . '/following' }}
    {{ 'https://taskord.com/@' . $user->username . '/followers' }}
@endforeach