<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article View</title>

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

    <div class="w-75 m-auto">
        <p>Title: {{ $article->title }}</p>
        <p>Content: {{ $article->content }}</p>
        <p>Published: {{ $article->created_at }}</p>
        <p>Vote: <span id="vote_count">{{ $article->vote }}</span></p>

        <form action="{{ route('article.update', $article->id) }}" method="POST" id="article_upvote">
            @csrf
            @method('PUT')

            <input type="hidden" value="upvote" name="upvote" id="upvote">
            <button type="submit" class="btn btn-primary">Upvote</button>
        </form>

        <form action="{{ route('article.update', $article->id) }}" method="POST" id="article_downvote">
            @csrf
            @method('PUT')

            <input type="hidden" value="downvote" name="downvote" id="downvote">
            <button type="submit" class="btn btn-danger">Downvote</button>
        </form>
    </div>
</body>



{{-- API CALLS --}}
<script src="{{ URL::asset('js/articles.js') }}"></script>

</html>
