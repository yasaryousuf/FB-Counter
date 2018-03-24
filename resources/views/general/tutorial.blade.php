@extends('general.master')

@section('title')
Tutorials
@endsection

@section('body')

<div class="knowledge-header-section"></div>

<div class="tutorial-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tutorial-title">
                    <h1>{{$post->post_title}}</h1>
                </div>
                <div class="tutorial-content">
                    {!!$post->post_content!!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection