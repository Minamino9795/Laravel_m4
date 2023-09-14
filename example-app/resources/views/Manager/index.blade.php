<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <h5 class="card-header">Danh sách công việc</h5>
        <div class="card-body">
            <a href="{{ route('user') }}" class="btn btn-success mb-2">+ New</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Làm bài tập tuần</td>
                    <td>25/07/2023</td>
                    <td>26/07/2023</td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-success">Show</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-primary">Edit</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Nộp báo cáo</td>
                    <td>25/07/2023</td>
                    <td>26/07/2023</td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-success">Show</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-primary">Edit</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>soạn bài mới</td></td>
                    <td>25/07/2023</td>
                    <td>26/07/2023</td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-success">Show</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-primary">Edit</button>|
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>