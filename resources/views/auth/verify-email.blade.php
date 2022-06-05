<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>

<body>
    Your email has not been verified

    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Send Email</button>
        </div>

    </form>
</body>

</html>
