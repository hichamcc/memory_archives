@extends('layouts.app')

@section('content')
    <div class="row body-container">
        <div class="col-lg-12 col-md-12  col-sm-12 mb-2">
            <div class="memo-card card-overview">
                <div class="memo-card-header">
                    <div class="card-title">
                        MEMORY #{{$memoNum}}
                        <a class="memo-icon ml-2" title="Print pdf" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACdElEQVR4nOWaTUgVURSAP6wXtQw0LFcFQaaraCW0qUX/tDBXUqibdhXRokUgQYt2BRH9LNwVRaC1ai1SK8k0TUG0RRhRRIRCkdaNC0e4TPOeM+/+zeSBw8x7c8895+P+nTPvwToR5UnfAI3/A4gCxkPCKFEffWp9BzQ77j84yLhxbXLsIyjIVmBU7qd9j4zyCIKMxEQIGOUZJA1mu2N/qU599ekdRgUC8Q6jAoJo0TBv5fmMS5jQIFq2JWB2UFIQLzCxQJzD+E5R8ui0C6cuxSbRLBRIlDjUege5AXwGxoDdNgHEBOlIzOvHNgHEBOkTm1m5TtoEEBPkoNgsG4VTKUG2AD8M2yc2AcRe7AOGbY9NALFB9hu2rTYBxAY5Ztg+swkgNsjtxBbcW0aQBmBB7C4Dv2XxHwoch3UHp43UG4HRn5eAw8ARoB+4D9wEzgIVPIvKCdJg1N1n5N3VSeDjGlntIwoG0iPtfwGvZVplSc+/1PCtXKTzeQz1i4NPCYeLwHPgguRgelt+kRLYgyKA7ALuyRpYbT8CdAGbqti0A+eAS8BRYGNG38oHyAbgmpFTKZlKx+txFBPkesqQP6zHSWyQbwmIOcc/3KhQIEPG8ylgZz0OigBSkcPvRJXFWhoQ36LKCHIr45mhquidooDo1GawTpDhGufVP4YhRJfIr8TflTXanpd281l3ytBrpNF4+3KxRtG2AnwH2oq82PcAX4E/KQXZPsnfVvJmELF2rQPATwm4U75rAT5IPHpq5RIVUF8Cmw3f3TIquro8ZdQ5uiCjyCBan8oOtipXE89HsuxQRZW7AvE+xF89fEpFRmpv7ECCyF9YYu6kS8Hn9AAAAABJRU5ErkJggg==">                        </a>
                        <a class="memo-icon" title="Share" href="#">
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
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <p class="font-BP-bold m-2"> <b>MORE MEMORIES</b> </p>
        </div>
        @foreach ($memos as $memo)
            <div class="col-lg-4 col-md-6  col-sm-12 mb-2">
                <div class="memo-card" data-id="{{ $memo->id }}">
                    <div class="memo-card-header">
                        <div class="card-title">
                            MEMORY #04
                            <a class="memo-icon" href="#">
                                <img src="{{ asset('../icons/noun-share.svg') }}"  alt="Share">
                            </a>
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

            </div>
        @endforeach


    </div>




@endsection
@section('script')
    <script>
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
