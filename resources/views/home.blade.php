<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="card "style="width: 18rem;">

            <h1>Pesan Tiket</h1>
            <img src="{{asset('download.png')}}" alt="">
            <form action='/checkout' method='POST'>
                @csrf
                <div class="mb-3">
                    <label for="qty" class="form-label">Pesan</label>
                    <input type="number" name='qty' class="form-control" id="qty" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan </label>
                    <input type="text" name='name' class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No.hp </label>
                    <input type="number" name='no_hp' class="form-control" id="no_hp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat </label>
                    <input type="text" name='alamat' class="form-control" id="alamat">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>