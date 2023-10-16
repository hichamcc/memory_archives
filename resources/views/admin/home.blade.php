@extends('layouts.app')

@section('content')
    <!-- Loading overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <!-- Loading spinner -->
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only"></span>
        </div>
    </div>

<div class="body-container p-4">
    <ul class="nav nav-tabs font-BP" id="memoTabs">
        <li class="nav-item">
            <a class="nav-link active" id="pendingTab" data-toggle="tab" href="#memosPending">PENDING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " id="activeTab" data-toggle="tab" href="#memosActive">APPROVED</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="refusedTab" data-toggle="tab" href="#memosRefused">REJECTED</a>
        </li>

    </ul>
    <div class="tab-content" id="memoTabsContent">
        <div class="tab-pane fade  show active" id="memosPending">
            <!-- Display pending memos here -->
            <div class="row mt-4">
                @foreach ($memos_pending as $memo)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="memo-card">
                            <div class="memo-card-header">
                                <div class="card-title">
                                    MEMORY

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
                                    MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN {{ strtoupper($memo->city) }} ,  <b>2023</b>
                                </div>
                            </div>
                        </div>
                        <div class="memo-btn text-center">
                            <button class="black-btn green-btn"  data-memo-id="{{ $memo->id }}">APPROVE</button>
                            <button class="black-btn red-btn"  data-memo-id="{{ $memo->id }}">REJECT</button>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade row " id="memosActive">
            <!-- Display active memos here -->
            <div class="row mt-4">
                @foreach ($memos_active as $memo)
                    <div class="col-lg-4 col-md-6  col-sm-12 mb-2">
                        <div class="memo-card">
                            <div class="memo-card-header">
                                <div class="card-title">
                                    MEMORY
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
                                    MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN {{ strtoupper($memo->city) }} ,  <b>2023</b>
                                </div>
                            </div>
                        </div>
                        <div class="memo-btn text-center">
                            <button class="black-btn btn-sm delete"  data-memo-id="{{ $memo->id }}"> Delete</button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="tab-pane fade row" id="memosRefused">
            <div class="row mt-4">
                <!-- Display refused memos here -->
                @foreach ($memos_refused as $memo)
                    <div class="col-lg-4 col-md-6  col-sm-12 mb-2">
                        <div class="memo-card">
                            <div class="memo-card-header">
                                <div class="card-title">
                                    MEMORY

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
                                    MEMORY OF <b>{{ strtoupper($memo->name) }}</b>  | MEMORY DATE ≈ <b>{{ $memo->year }}</b>| REMEMBERED IN {{ strtoupper($memo->city) }} ,  <b>2023</b>
                                </div>
                            </div>
                        </div>
                        <div class="memo-btn text-center">
                            <button class="black-btn btn-sm delete"  data-memo-id="{{ $memo->id }}"> Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>
@endsection

@section('script')
    <script>

        function dinRatio() {
            var cardWidth = $('.memo-card').width();
            var cardheight = $('.memo-card').width()/1.41;

            if(cardWidth){
                $('.memo-card').css('height',cardheight);
            }
        }

        $(document).ready(function () {
            dinRatio();
            $(window).on('resize', function () {
                dinRatio();

            });

            // Event handler for the "activeTab" click
            $("#activeTab").click(function () {

                // Show the active memos section
                $("#memosActive , #activeTab").addClass("show active");
                $(" #activeTab").addClass(" active");

                // Hide other memos sections
                $("#memosRefused, #memosPending ").removeClass("show active");
                $(" #refusedTab , #pendingTab ").removeClass("active");

                var cardWidth = $(' #activeTab').first('.memo-card').width();
                var cardheight = $(' #activeTab').first('.memo-card').width()/1.41;

                if(cardWidth){
                    $('.memo-card').css('height',cardheight);
                }

            });

            // Event handler for the "refusedTab" click
            $("#refusedTab").click(function () {

                // Show the refused memos section
                $("#memosRefused").addClass("show active");
                $(" #refusedTab").addClass(" active");

                // Hide other memos sections
                $("#memosActive, #memosPending").removeClass("show active");
                $(" #activeTab  , #pendingTab ").removeClass("active");


                var cardWidth = $(' #refusedTab').first('.memo-card').width();
                var cardheight = $(' #refusedTab').first('.memo-card').width()/1.41;

                if(cardWidth){
                    $('.memo-card').css('height',cardheight);
                }

            });

            // Event handler for the "pendingTab" click
            $("#pendingTab").click(function () {
                // Show the pending memos section
                $("#memosPending").addClass("show active");
                $(" #pendingTab").addClass(" active");

                // Hide other memos sections
                $("#memosActive, #memosRefused").removeClass("show active");
                $(" #activeTab , #refusedTab  ").removeClass("active");


                var cardWidth = $('#memosPending').first('.memo-card').width();
                var cardheight = $('#memosPending').first('.memo-card').width()/1.41;

                if(cardWidth){
                    $('.memo-card').css('height',cardheight);
                }            });


            // Event handler for the "APPROVE" button click
            $(".green-btn").click(function () {
                var memoId = $(this).data("memo-id");
                var status = "active"; // Change to "active" or the desired status

                // Show the loading overlay with spinner
                $("#loadingOverlay").css('display','flex');

                // Send a POST request to update the memo's status
                $.ajax({
                    url: "{{ route('memos.update', '') }}" + "/" + memoId,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT", // Use "_method" to simulate a PUT request
                        status: status
                    },
                    success: function (response) {
                        // Handle success, e.g., display a success message
                        location.reload();
                    },
                    error: function (xhr) {
                        // Handle errors, e.g., display an error message
                        alert("Error: " + xhr.statusText);
                    }
                });
            });




            // Event handler for the "DELETE" button click
            $(document).on('click','.delete',function () {
                var memoId = $(this).data("memo-id");

                // Show the loading spinner
                $("#loadingOverlay").css('display','flex');

                // Send a POST request to update the memo's status
                $.ajax({
                    url: "{{ route('memos.delete', '') }}" + "/" + memoId,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT", // Use "_method" to simulate a PUT request
                    },
                    success: function (response) {
                        // Handle success, e.g., display a success message
                        location.reload();
                    },
                    error: function (xhr) {
                        // Handle errors, e.g., display an error message
                        alert("Error: " + xhr.statusText);
                    }
                });
            });


            // Event handler for the "REJECT" button click
            $(".red-btn").click(function () {
                var memoId = $(this).data("memo-id");
                var status = "refused"; // Change to "inactive" or the desired status

                // Show the loading spinner
                $("#loadingOverlay").css('display','flex');

                // Send a POST request to update the memo's status
                $.ajax({
                    url: "{{ route('memos.update', '') }}" + "/" + memoId,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT", // Use "_method" to simulate a PUT request
                        status: status
                    },
                    success: function (response) {
                        // Handle success, e.g., display a success message
                        location.reload();
                    },
                    error: function (xhr) {
                        // Handle errors, e.g., display an error message
                        alert("Error: " + xhr.statusText);
                    }
                });
            });
        });
    </script>
@endsection
