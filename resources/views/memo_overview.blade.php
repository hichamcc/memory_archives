@extends('layouts.app')

@section('content')

    <!-- Loading overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <!-- Loading spinner -->
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only"></span>
        </div>
    </div>


    <div class="row body-container">
        <div class="col-lg-12 col-md-12  col-sm-12 mb-2">
            <div class="memo-card card-overview">
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{$memoNum}}
                        <a class="memo-icon ml-2 pdf-icon" title="Print pdf" data-id="{{$memo->id}}" data-num="{{$memoNum}}" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACdElEQVR4nOWaTUgVURSAP6wXtQw0LFcFQaaraCW0qUX/tDBXUqibdhXRokUgQYt2BRH9LNwVRaC1ai1SK8k0TUG0RRhRRIRCkdaNC0e4TPOeM+/+zeSBw8x7c8895+P+nTPvwToR5UnfAI3/A4gCxkPCKFEffWp9BzQ77j84yLhxbXLsIyjIVmBU7qd9j4zyCIKMxEQIGOUZJA1mu2N/qU599ekdRgUC8Q6jAoJo0TBv5fmMS5jQIFq2JWB2UFIQLzCxQJzD+E5R8ui0C6cuxSbRLBRIlDjUege5AXwGxoDdNgHEBOlIzOvHNgHEBOkTm1m5TtoEEBPkoNgsG4VTKUG2AD8M2yc2AcRe7AOGbY9NALFB9hu2rTYBxAY5Ztg+swkgNsjtxBbcW0aQBmBB7C4Dv2XxHwoch3UHp43UG4HRn5eAw8ARoB+4D9wEzgIVPIvKCdJg1N1n5N3VSeDjGlntIwoG0iPtfwGvZVplSc+/1PCtXKTzeQz1i4NPCYeLwHPgguRgelt+kRLYgyKA7ALuyRpYbT8CdAGbqti0A+eAS8BRYGNG38oHyAbgmpFTKZlKx+txFBPkesqQP6zHSWyQbwmIOcc/3KhQIEPG8ylgZz0OigBSkcPvRJXFWhoQ36LKCHIr45mhquidooDo1GawTpDhGufVP4YhRJfIr8TflTXanpd281l3ytBrpNF4+3KxRtG2AnwH2oq82PcAX4E/KQXZPsnfVvJmELF2rQPATwm4U75rAT5IPHpq5RIVUF8Cmw3f3TIquro8ZdQ5uiCjyCBan8oOtipXE89HsuxQRZW7AvE+xF89fEpFRmpv7ECCyF9YYu6kS8Hn9AAAAABJRU5ErkJggg==">
                        </a>
                        <a class="memo-icon share-icon" title="Share" href="#">
                            <img src="{{ asset('../icons/noun-share.svg') }}"  alt="Share">
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
                        MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN  {{ strtoupper($memo->city) }} , <b>2023</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12  col-sm-12 mb-2 d-none"  id="memo-content" >
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
                        MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN  {{ strtoupper($memo->city) }} , <b>2023</b>
                        <div style="float: right">
                            <b>memoryarchives.world</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <p class="font-BP-bold m-2"> <b>MORE MEMORIES</b> </p>
        </div>

        @foreach ($memos as $index => $memo)
            <div class="col-lg-4 col-md-6  col-sm-12 mb-2">
                <div class="memo-card" data-id="{{ $memo->id }}" data-num="{{ $memo->number }}">
                    <div class="memo-card-header">
                        <div class="card-title">
                            MEMORY #{{ $memo->number }}
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


            const contentDiv = $('#memo-content')[0]; // Get the DOM element

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




                // Save or download the PDF
                pdf.save('memory.pdf');
                $('#memo-content').addClass('d-none')
                $("#loadingOverlay").css('display','none');
            });
        });

        $(document).on('click', '.share-icon', function (event) {
            event.stopPropagation();
        })

    </script>
@endsection
