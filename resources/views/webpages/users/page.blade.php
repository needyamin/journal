@extends('layouts.users')
@section('title', $article->title . ' - Article Page')
@section('meta-tags')
    <meta name="citation_title" content="{{ $article->title }}">
    <meta name="citation_author" content="">
    <meta name="citation_publication_date" content="{{ \Carbon\Carbon::parse($article->created_at)->format('Y/m/d') }}">
    <meta name="citation_journal_title" content="Your Journal Name">
    <meta name="citation_volume" content="article->volume">
    <meta name="citation_issue" content="article->issue">
    <meta name="citation_firstpage" content="article->first_page">
    <meta name="citation_lastpage" content="article->last_page">
    <meta name="citation_pdf_url" content="@foreach (json_decode($article->upload_pdf) as $filePaths){{ url($filePaths) }}@endforeach">
    
    @foreach ($keywords as $keyword)
        <meta name="citation_keywords" content="{{ $keyword->keyword }}">
    @endforeach
@endsection

@section('content')
@extends('re_usable_users.header')

 <!-- Page Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-7">

  @if ($article)
     <!-- Blog Post -->
         <article class="card mb-6">
         <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Card image cap">
            <div class="card-body">
                 <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="card-text">{{ $article->abstract }}</p>
                 </div>

     <div class="card-footer text-muted">
            Posted on {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }} 
     </div>

   <div class="card-footer text-muted">keywords: <b>
    @foreach ($keywords as $keyword)
    {{ $keyword->keyword }},
   @endforeach
    </b>
    </div>

    <div class="card-footer text-muted">Uploaded Files: <br>
    @foreach (json_decode($article->upload_pdf) as $filePaths)
        <a href="{{ url($filePaths) }}" title="{{ $article->title }}" target="_blank">{{ basename($filePaths) }}</a><br>
    @endforeach
    </div>

    </article>

    @endif

                <!-- Comments Section
                <section class="mb-4">
                    <h4>Comments</h4>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Comment 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="card-text">Comment 2 Nulla convallis egestas rhoncus. Donec facilisis fermentum sem,
                                ac viverra ante luctus vel.</p>
                        </div>
                        <div class="card-footer">
                            <form>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Add a comment:</label>
                                    <textarea class="form-control" id="comment" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </section> -->
       
</div>

<div class="col-lg-1">
    <div class="card"> ss </div>
</div>

@extends('re_usable_users.sidebar')
@extends('re_usable_users.footer')
@endsection
