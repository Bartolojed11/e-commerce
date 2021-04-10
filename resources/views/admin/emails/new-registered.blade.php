Hi {{ $admin->first_name }},
<p>This is your admin credentials. Please log in and
    change your password after receiving this email. Thank you</p>
<p>Username : <strong>{{ $admin->email }}</strong></p>
<p>Password : <strong>{{ $admin->password }}</strong></p>