<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="border w-25 m-auto">
        <h1 class="text-center">Simple Article Page</h1>
    </div>

    {{-- <div class="border w-25 m-auto mt-5 p-5">
        <form action="{{ route('article.store') }}" method="POST" id="article_create_form">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content . . ." name="content">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> --}}


    <div class=" w-75 m-auto mt-5">
        <div class="mb-2">
            <button type="submit" class="btn btn-success " data-bs-toggle="modal"
                data-bs-target="#article_create">Create Article</button>
        </div>

        <table class="table
                w-100" id="article_table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Published</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#article_update" data-id="{{ $item->id }}" id="edit_modal_trigger">
                                Edit
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#article_delete" data-id="{{ $item->id }}"
                                id="delete_modal_trigger">
                                Delete
                            </button>

                            <a href="{{ route('article.edit', $item->id) }}" type="button" class="btn btn-primary">
                                view
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    @include('article.create');
    @include('article.update');
    @include('article.delete');



</body>

{{-- API CALLS --}}
<script src="{{ URL::asset('js/articles.js') }}"></script>

</html>
