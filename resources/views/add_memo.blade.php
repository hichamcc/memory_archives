@extends('layouts.app')

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('memos.store') }}">
            @csrf

            <div class="col-lg-8 col-md-12 offset-lg-2 col-sm-12 mb-4">
                <div class="memo-card card-form">
                    <div class="memo-card-header">
                        <div class="card-title">
                            MEMORY
                        </div>
                    </div>
                    <div id="char-count">300 CHARACTERS REMAINING</div>
                    <div class="memo-card-input">
                        <textarea class="large-input" name="memo" id="memo-textarea" placeholder="Remember..."  maxlength="300" required></textarea>
                    </div>
                    <div class="memo-card-footer">
                        <div class="card-title">
                            MEMORY OF <b><input type="text" class="small-input"  name="name" placeholder="YOUR NAME" required></b>  | MEMORY DATE ≈ <b><input type="text" class="small-input" name="year" placeholder="YEAR" required></b>| REMEMBERED IN <b><input
                                    type="text" class="small-input" name="city" placeholder="YOUR CITY" required> , 2023</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-4">
                <input type="text"  name="email" class="small-input mt-4" placeholder="YOUR E-MAIL" required>

            </div>
            <div class="col-md-12 text-center mt-4">
                <button class="black-btn font-BP" href="{{ route('add_memo') }}">
                    SUBMIT YOUR MEMORY
                </button>
            </div>
        </form>

        <div class="col-md-4 offset-md-4 col-sm-12 mt-4 text-center">
            <p class="font-BP-bold">
                YOUR MEMORY WILL BE ACTIVATED AFTER A REVIEW.
                WE DO NOT ALLOW HATEFUL OR INFLAMMATORY CONTENT.
                WE WILL ONLY USE YOUR E-MAIL TO NOTIFY YOU IF
                YOUR MEMORY HAS BEEN SUCCESSFULLY ARCHIVED.
            </p>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var maxChars = 300;
            var textarea = $('#memo-textarea');
            var charCount = $('#char-count');

            // Initial character count
            charCount.text(maxChars + '  CHARACTERS REMAINING');

            // Update character count as the user types
            textarea.on('input', function () {
                var remainingChars = maxChars - textarea.val().length;
                charCount.text(remainingChars + '  CHARACTERS REMAINING');

                // You can also add some styling when the limit is reached
                if (remainingChars < 0) {
                    charCount.css('color', 'red'); // Change color to red
                } else {
                    charCount.css('color', ''); // Reset color
                }
            });
        });
    </script>
@endsection
