@extends('layouts.app')
@section('head')
    <meta property="og:title" content="My archived memory on memoryarchives.world">
    <meta name="twitter:title" content="My archived memory on memoryarchives.world">
@endsection
@section('content')

    <!-- Loading overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <!-- Loading spinner -->
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only"></span>
        </div>
    </div>


    <div class="row ">
        <div class="col-lg-12 col-md-12  col-sm-12 mb-2">
            <div class="memo-card card-overview white-theme white-border-card" id="overview">
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{$memoNum}}
                        <a class="memo-icon ml-2 pdf-icon" title="Print pdf" data-id="{{$memo->id}}" data-num="{{$memoNum}}" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACdElEQVR4nOWaTUgVURSAP6wXtQw0LFcFQaaraCW0qUX/tDBXUqibdhXRokUgQYt2BRH9LNwVRaC1ai1SK8k0TUG0RRhRRIRCkdaNC0e4TPOeM+/+zeSBw8x7c8895+P+nTPvwToR5UnfAI3/A4gCxkPCKFEffWp9BzQ77j84yLhxbXLsIyjIVmBU7qd9j4zyCIKMxEQIGOUZJA1mu2N/qU599ekdRgUC8Q6jAoJo0TBv5fmMS5jQIFq2JWB2UFIQLzCxQJzD+E5R8ui0C6cuxSbRLBRIlDjUege5AXwGxoDdNgHEBOlIzOvHNgHEBOkTm1m5TtoEEBPkoNgsG4VTKUG2AD8M2yc2AcRe7AOGbY9NALFB9hu2rTYBxAY5Ztg+swkgNsjtxBbcW0aQBmBB7C4Dv2XxHwoch3UHp43UG4HRn5eAw8ARoB+4D9wEzgIVPIvKCdJg1N1n5N3VSeDjGlntIwoG0iPtfwGvZVplSc+/1PCtXKTzeQz1i4NPCYeLwHPgguRgelt+kRLYgyKA7ALuyRpYbT8CdAGbqti0A+eAS8BRYGNG38oHyAbgmpFTKZlKx+txFBPkesqQP6zHSWyQbwmIOcc/3KhQIEPG8ylgZz0OigBSkcPvRJXFWhoQ36LKCHIr45mhquidooDo1GawTpDhGufVP4YhRJfIr8TflTXanpd281l3ytBrpNF4+3KxRtG2AnwH2oq82PcAX4E/KQXZPsnfVvJmELF2rQPATwm4U75rAT5IPHpq5RIVUF8Cmw3f3TIquro8ZdQ5uiCjyCBan8oOtipXE89HsuxQRZW7AvE+xF89fEpFRmpv7ECCyF9YYu6kS8Hn9AAAAABJRU5ErkJggg==">
                        </a>
                        <a class="memo-icon share-icon" title="Share" href="javascript:void(0);" data-url="{{ route('memo_overview') }}?id= {{ $memo->id }}&num={{ $memo->numero }}" data-title="{{ $memo->memo }}" data-description="MEMORY OF {{ strtoupper($memo->name) }} | MEMORY DATE ≈ {{ $memo->year }} | REMEMBERED IN {{ strtoupper($memo->city) }}, 2023">
                            <img src="{{ asset('icons/noun-share.svg') }}"  alt="Share">
                        </a>

                            <a href="javascript:void(0);" class="memo-icon d-none" id="facebook-share">
                                <img src="{{ asset('icons/noun-fb.svg') }}" alt="Share on Facebook">
                            </a>
                            <a href="javascript:void(0);" class="memo-icon d-none" id="twitter-share">
                                <img src="{{ asset('icons/noun-twitter.svg') }}" alt="Share on Twitter">
                            </a>

                        <a href="javascript:void(0);" class="memo-icon d-none" id="whatsapp-share">
                                <img src="{{ asset('icons/noun-whatsapp.svg') }}" alt="Share on Whatsapp">
                            </a>

                    </div>
                </div>
                <div class="memo-card-body">
                    <div class="card-text overview">
                        <p>
                            {{ $memo->memo }}

                        </p>
                    </div>

                </div>
                <div class="memo-card-footer">
                    <div class="card-title">
                        MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b> | REMEMBERED IN <b>{{ strtoupper($memo->city) }}</b>, <b>2023</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12  col-sm-12 mb-2 white-theme d-none "  id="memo-content" >
            <div class="memo-card card-overview card-pdf" >
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{$memoNum}}
                    </div>
                </div>
                <div class="memo-card-body">
                    <div class="card-text overview">
                        <p>
                            {{ $memo->memo }}
                        </p>
                    </div>

                </div>
                <div class="memo-card-footer">
                    <div class="card-title">
                        MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN <b>{{ strtoupper($memo->city) }}</b>, <b>2023</b>
                        <div style="float: right">
                            <b>MEMORYARCHIVES.WORLD</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top " id="top">
            <div>
                THIS MEMORY IS PART OF THE WORLD MEMORY ARCHIVE, A PUBLIC ARCHIVE OF LIVED MOMENTS,
                REMEMBERED AND SHARED FOR THE PAST TO BE A PART OF THE FUTURE.
            </div>

        </div>
        <div class="bottom d-none" id="bottom">
            <div>
                MEMORY ARCHIVES WAS CREATED BY TILL KÖNNEKER FOR THE EXHIBITION, HAVING THE SAME NAME.
                <br>
                KULTURMUSEUM BERN, 23. NOVEMBER – 19. DEZEMBER 2023.
                <br>
                TILLKOENNEKER.COM / KULTURMUSEUM.CH
            </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 mt-3 black-theme">
            <p class="font-BP-bold m-2"> <b>MORE MEMORIES</b> </p>
        </div>

        @foreach ($memos as $index => $memo)
            <div class="col-lg-4 col-md-6  col-sm-12 mb-2 more-memories">
                <div class="memo-card white-theme white-border-card" data-id="{{ $memo->id }}" data-num="{{ $memo->number }}">
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
                            MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN <b>{{ strtoupper($memo->city) }}</b>,  <b>2023</b>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach


    </div>




@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('click', '.memo-card', function() {
            // Get the data-id attribute from the clicked button
            var memoId = $(this).data('id');
            var memoNum = $(this).data('num');

            if(memoId && memoNum){
                // Build the URL with the memoId parameter
                var url = "{{ route('memo_overview') }}?id=" + memoId+"&num="+memoNum;

                // Redirect to the URL
                window.location.href = url;
            }

        });

        window.jsPDF = window.jspdf.jsPDF; // add this line of code
        $(document).on('click', '.pdf-icon', function (event) {
            event.stopPropagation();

            // Show the loading overlay with spinner
            $("#loadingOverlay").css('display','flex');

            $('#memo-content').removeClass('d-none')
            $('.top').removeClass('d-none')
            $('.bottom').removeClass('d-none')

            if ($(window).width() > 768) {
                $('#memo-content').each(function() {
                    var pElement = $(this).find('.memo-card-body .card-text p');
                    var cardBody = $(this).find('.memo-card-body');

                    while (pElement.height() / cardBody.height() < 0.55) {
                        var fontSize = parseInt(pElement.css('font-size'));
                        pElement.css('font-size', (fontSize + 1) + 'px');
                    }
                });
            }

            const contentDiv = $('#memo-content')[0]; // Get the DOM element
            const contentTop = $('#top')[0]; // Get the DOM element
            const contentBottom = $('#bottom')[0]; // Get the DOM element

            // Initialize a new jsPDF instance
            const pdf = new jsPDF();

            // Options for the PDF
            const pdfOptions = {
                format: 'A4', // You can change the format to 'a4' or other sizes
                orientation: 'portrait',
                margin: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                },
            };

            // Convert the div content to a canvas using html2canvas
            html2canvas(contentDiv, { scale: 2 }).then(function (canvas) {
                html2canvas(contentTop, { scale: 2 }).then(function (topCanvas) {
                    html2canvas(contentBottom, { scale: 2 }).then(function (bottomCanvas) {
                        const imgData = canvas.toDataURL('image/png');

                        // Add the canvas image to the PDF
                        pdf.addImage(imgData, 'PNG', 5, 5, 200, 0);

                        // Add small cut marks on the left and right
                        const pageWidth = pdf.internal.pageSize.getWidth();
                        const pageHeight = pdf.internal.pageSize.getHeight();

                        // Calculate the positions of the cut marks
                        const cutMarkLeftX = 2; // 10 pixels from the left edge
                        const cutMarkRightX = pageWidth - 2; // 10 pixels from the right edge
                        const cutMarkY = pageHeight /2; // 10 pixels from the bottom edge

                        // Draw the cut mark on the left
                        pdf.line(cutMarkLeftX, cutMarkY, cutMarkLeftX + 2, cutMarkY); // Left cut mark

                        // Draw the cut mark on the right
                        pdf.line(cutMarkRightX - 2, cutMarkY, cutMarkRightX, cutMarkY); // Right cut mark

                        // Calculate the positions for the 'bottom' canvas
                        const bottomCanvasX = 2;
                        const bottomCanvasY = pageHeight - 25; // Adjust the position as needed

                        const topCanvasX = 2;
                        const topCanvasY = pageHeight/2 + 10 ; // Adjust the position as needed


                        // Add the 'top' and 'bottom' canvas to the PDF
                        pdf.addImage(topCanvas.toDataURL('image/png'), 'PNG', topCanvasX, topCanvasY, 200, 0);
                        pdf.addImage(bottomCanvas.toDataURL('image/png'), 'PNG', bottomCanvasX, bottomCanvasY, 200, 0);



                        // Save or download the PDF
                        pdf.save('memory.pdf');
                        $('#memo-content').addClass('d-none')
                        $("#loadingOverlay").css('display','none');
                    });
                });
            });
        });
        $(document).on('click', '.share-icon', function (event) {
            event.stopPropagation();
        })


        function dinRatio() {
            var cardWidth = $(document).find('.more-memories .memo-card').width();
            if(cardWidth){

                $('.more-memories .memo-card').css('height',parseInt(cardWidth/1.41));

            }
        }

        $('body,.navbar-brand  ').addClass('black-theme');
        $('.navbar-item img').addClass('svg-white');


        $(document).ready(function() {



            dinRatio();

            $(window).on('resize', function () {
                dinRatio();
            });




            $(document).find('.more-memories .memo-card').each(function() {
                var pElement = $(this).find('.memo-card-body .card-text p');
                var cardBody = $(this).find('.memo-card-body');

                while (pElement.height() / cardBody.height() < 0.55) {
                    var fontSize = parseInt(pElement.css('font-size'));
                    pElement.css('font-size', (fontSize + 1) + 'px');
                }
            });

            if ($(window).width() > 768) {

                $('#overview').each(function() {
                    var pElement = $(this).find('.memo-card-body .card-text p');
                    var cardBody = $(this).find('.memo-card-body');

                    while (pElement.height() / cardBody.height() < 0.55) {
                        var fontSize = parseInt(pElement.css('font-size'));
                        pElement.css('font-size', (fontSize + 1) + 'px');
                    }
                });
            }




            $(document).find('.more-memories .memo-card').each(function() {
                var pElement1 = $(this).find('.memo-card-body .card-text p');
                var cardBody1 = $(this).find('.memo-card-body');

                while (pElement1.height() / cardBody1.height() < 0.55) {
                    var fontSize = parseInt(pElement1.css('font-size'));
                    pElement1.css('font-size', (fontSize + 1) + 'px');
                }
            });


            // Select the .card-text element
            var cardText = $(".card-overview .card-text p").first();
            var PDFText = $("#memo-content .card-overview .card-text p").first();


            // Get the text content of the element
            var textContent = cardText.text().trim();

            var numericValue = textContent.length;;

            // Determine the font size based on the numeric value
            var fontSize = 48; // Default font size


            if (!isNaN(numericValue)) {
                if (numericValue >= 0 && numericValue < 100) {
                    fontSize = 72;
                } else if (numericValue >= 100 && numericValue < 200) {
                    fontSize = 62;
                } else if (numericValue >= 200 ) {
                    fontSize = 48;
                }
            }
            $(".share-icon").on("click", function() {
                // Show the Facebook and Twitter share buttons
                $("#facebook-share, #twitter-share , #whatsapp-share").removeClass("d-none");
                $(".share-icon").addClass("d-none");

            });


        });


        // WhatsApp sharing
        document.getElementById('whatsapp-share').addEventListener('click', function() {
            var text = 'Check out this Memory: ' + window.location.href;
            var url = 'whatsapp://send?text=' + encodeURIComponent(text);

            // Attempt to open the WhatsApp app
            window.open(url, '_system');
        });

        // Twitter sharing
        document.getElementById('twitter-share').addEventListener('click', function() {
            var url = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent('Check out this link: ') + '&url=' + encodeURIComponent(window.location.href);
            window.open(url, 'Share on Twitter', 'width=600, height=400');
        });

        // Facebook sharing
        document.getElementById('facebook-share').addEventListener('click', function() {
            var url = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href);
            window.open(url, 'Share on Facebook', 'width=600, height=400');
        });

    </script>
@endsection
