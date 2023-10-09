@extends('layouts.app')

@section('content')

<div class="row font-Aleo card-container body-container">
    <div class="col-md-8 offset-md-2 col-sm-12 text-center mb-4">
        <h1 id="quote">

        </h1>
        <p class="bold" id="author">

        </p>
        <a class="black-btn font-BP" href="{{ route('add_memo') }}">ARCHIVE YOUR MEMORY</a>
    </div>
    <div class="col-md-12 search-container">
        <input type="text" class="search-input" id="searchInput" placeholder="Search...">
        <img src="{{ asset('../icons/noun-search.svg') }}" class="search-icon" alt="Search Icon">
    </div>
    @php
        $memoCount = count($memos);
    @endphp

    @foreach ($memos as $index => $memo)
        <div class="col-lg-4 col-md-6  col-sm-12 mb-2">
            <div class="memo-card" data-id="{{ $memo->id }}" data-num="{{ $memoCount - $index }}">
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{ $memoCount - $index }}
                    </div>
                </div>
                <div class="memo-card-body">
                    <div class="card-text">
                        <p>
                            {{ Illuminate\Support\Str::limit($memo->memo, $limit = 150, $end = '...') }}
                        </p>
                    </div>

                </div>
                <div class="memo-card-footer">
                    <div class="card-title">
                        MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN {{ strtoupper($memo->city) }},  <b>2023</b>
                    </div>
                </div>
            </div>

        </div>
    @endforeach


</div>
@endsection
@section('script')
    <script>
        //quotes
        var quotesData = [
            {
                quote: "Memories of our lives, of our works and our deeds will continue in others.",
                author: "Rosa Parks"
            },
            {
                quote: "Memory is the treasure house of the mind wherein the monuments thereof are kept and preserved.",
                author: "Thomas Fuller"
            },
            {
                quote: "Memories are the key not to the past, but to the future.",
                author: "Corrie ten Boom"
            },
            {
                quote: "Nothing is ever really lost to us as long as we remember it.",
                author: "L.M. Montgomery"
            },
            {
                quote: "To observe attentively is to remember distinctly.",
                author: "Edgar Allan Poe"
            },
            {
                quote: "Memory is the treasury and guardian of all things.",
                author: "Cicero"
            },
            {
                quote: "We all have our time machines. Some take us back, they’re called memories. Some take us forward, they’re called dreams.",
                author: "Jeremy Irons"
            },
            {
                quote: "Memories warm you up from the inside. But they also tear you apart.",
                author: "Haruki Murakami"
            },
            {
                quote: "Memory is never a precise duplicate of the original… it is a continuing act of creation.",
                author: "Rosalind Cartwright"
            },
            {
                quote: "Take care of all your memories. For you cannot relive them.",
                author: "Bob Dylan"
            },
        ];

        function getRandomQuote() {
            var randomIndex = Math.floor(Math.random() * quotesData.length);
            return quotesData[randomIndex];
        }


        $(document).ready(function() {

            var randomQuote = getRandomQuote();

            // Update the quote and author elements
            $('#quote').html(randomQuote.quote);
            $('#author').html(randomQuote.author);


            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val().toLowerCase(); // Get the search term

                // Loop through each memo card
                $('.memo-card').each(function() {
                    var cardText = $(this).find('.card-text p').text().toLowerCase() + $(this).find('.card-title b').text().toLowerCase(); // Get the card text

                    if (searchTerm === '') {
                        $(this).parent('div').show(); // Show all cards when search term is empty
                    } else if (cardText.includes(searchTerm)) {
                        $(this).parent('div').show(); // Show the card if it matches
                    } else {
                        $(this).parent('div').css('display', 'none'); // Hide the card if it doesn't match
                    }
                });
            });
        });


        $(document).on('click', '.memo-card', function() {
            // Get the data-id attribute from the clicked button
            var memoId = $(this).data('id');
            var memoNum = $(this).data('num');

            // Build the URL with the memoId parameter
            var url = "{{ route('memo_overview') }}?id=" + memoId+"&num="+memoNum;

            // Redirect to the URL
            window.location.href = url;
        });
    </script>
@endsection
