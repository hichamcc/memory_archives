@extends('layouts.app')

@section('content')

    <div class=" body-container font-BP-bold">
        <div class=" p-4 m-4 text-center">
            <h1>
                THANK YOU FOR SUBMITTING YOUR MEMORY.
                <br>
                IT HAS BEEN RECEIVED AND IS NOW UNDER REVIEW.
            </h1>
            <a class="black-btn font-BP mt-4" href="{{ route('public.home') }}">
                GO BACK HOME
            </a>

        </div>
    </div>

@endsection
