<!DOCTYPE html>
<html>
<head>
    <title>Show Room</title>
    <style>
        .seat {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            border: 1px solid black;
            cursor: pointer;
        }

        .unavailable {
            background-color: red;
            color: white;
        }

        .available {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
<h1>Room: {{ $room->name }}</h1>
<div>
    @foreach ($room->seats->groupBy('row_number') as $rowNumber => $seats)
        <div class="row-container" data-screening-id="{{ $seats[0]->screening_id }}" style="margin-bottom: 10px;">
            <strong>Row {{ $rowNumber }}</strong>:
            @foreach ($seats as $seat)
                @php
                    $isAvailable = $seat->bookings->where('screening_id', $screeningId)->isEmpty();
                @endphp
                <div class="seat @if (!$isAvailable) unavailable @else available @endif"
                     @if ($isAvailable) onclick="handleSeatClick({{ $seat->id }}, {{$screeningId}})" @endif>

                    @if ($isAvailable)
                        <span style="color: green;"></span>
                    @else
                        <span style="color: red"></span>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach

</div>

<!-- JavaScript section -->
<script>
    function handleSeatClick(seatId, screeningId) {
        if (confirm("Are you sure you want to book this seat?")) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/book', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({seatId: seatId, screeningId: screeningId}),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to book seat');
                    }
                    console.log("Seat booked: " + seatId);
                })
                .catch(error => {
                    console.error('Error booking seat:', error);
                });
        }
    }
</script>

<meta name="csrf-token" content="{{ csrf_token() }}">

</body>
</html>
