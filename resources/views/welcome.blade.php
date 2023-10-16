@extends('layouts.app')

@section('content')

<div class="row font-Aleo ">
    <div class="col-md-6 offset-md-3 col-sm-12 text-center mb-4">
        <h1 id="quote">

        </h1>
        <p class="bold" id="author">

        </p>
        <a class="black-btn font-BP mt-3" href="{{ route('add_memo') }}">ARCHIVE YOUR MEMORY</a>
    </div>
    <div class="col-md-12 search-container">
        <input type="text" class="search-input" id="searchInput" placeholder="Search...">
        <img src="{{ asset('../icons/noun-search.svg') }}" class="search-icon" alt="Search Icon">
    </div>

    <div class="col-md-12 col-sm-12 mb-2 " >
        <a href="#" class="memo-icon" onclick="shuffle()">
            <img src="{{ asset('../icons/noun-random.svg') }}" class="pr-2" style="transform: scale(1.2);" title="Shuffle Memories"  alt="Shuffle">
        </a>
    </div>

</div>

<div class="row font-Aleo" id="shuffle">
    @foreach ($memos as $index => $memo)
        <div class="col-lg-4 col-md-6  col-sm-12 mb-2 animate__animated animate__backInLeft" >
            <div class="memo-card" data-id="{{ $memo->id }}" data-num="{{$memo->number }}" style="--bs-aspect-ratio: 50%;">
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{ $memo->number }}
                    </div>
                </div>
                <div class="memo-card-body">
                    <div class="card-text">
                        <p>
                            {{ $memo->memo }}
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

        function dinRatio() {
            var cardWidth = $('.memo-card').width();
            var cardheight = $('.memo-card').width()/1.41;

            $('.memo-card').css('height',cardheight);
        }

        $(document).ready(function() {

         dinRatio();
         $(window).on('resize', function () {
             dinRatio();
         });

            $('.memo-card').each(function() {
                var pElement = $(this).find('.memo-card-body .card-text p');
                var cardBody = $(this).find('.memo-card-body');
                var cardFooter = $(this).find('.memo-card-footer');
                var pElementF = $(this).find('.memo-card-footer .card-title');


                while (pElement.height() / cardBody.height() < 0.55) {
                    var fontSize = parseInt(pElement.css('font-size'));
                    pElement.css('font-size', (fontSize + 1) + 'px');
                }

                while (cardFooter.height() > 32) {
                    var fontSizeF = parseInt(pElementF.css('font-size'));
                    pElementF.css('font-size', (fontSizeF - 1) + 'px');
                }
            });

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

        var initialOrder = null;
        var shuffled = false;

        function shuffle() {
            var parent = $("#shuffle");
            var divs = parent.children();

            if (!shuffled) {
                // Backup the initial order the first time shuffle is clicked
                initialOrder = divs.slice();
                shuffled = true;

                while (divs.length) {
                    parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
                }
            } else {
                restoreOrder();
            }


        }

        // Restore the initial order on the second click
        function restoreOrder() {
            if (shuffled && initialOrder) {
                var parent = $("#shuffle");
                parent.empty(); // Clear the shuffled order
                parent.append(initialOrder); // Restore the initial order
                shuffled = false;
            }
        }
    </script>


@endsection
