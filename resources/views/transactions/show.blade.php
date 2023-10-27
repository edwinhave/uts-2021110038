@extends('layouts.template')

@section('title', $transaction->amount)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->title }}</h1>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>
        {{-- @if ($transaction->image)
            <img src="{{ $transaction->image }}" class="rounded mx-auto d-block my-3">
        @endif --}}
        <p>{{ $transaction->body }}</p>
    </article>
@endsection
