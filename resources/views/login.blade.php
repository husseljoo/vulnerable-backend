<html>
<head>
    <title>Login:</title>
</head>
<body>
   @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Login</h1>
    <form action="/api/auth/login" method="POST">
        @csrf

        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="email" required minlength="5" maxlength="20" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required minlength="6" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Login" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
