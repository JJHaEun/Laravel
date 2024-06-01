<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <div class="container">
        <div class="card mt-5 w-50">
            <div class="card-header">파일업로드</div>
            <div class="card-body">
                <form action="{{ route('upload.uploadFile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">파일을 고르세요</label>
                        <input type="file" class="form-control" name="file" id="file"/>
                    </div>
                    <button class="btn btn-success mt-3">업로드</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>