@php
    /** @var \Carbon\Carbon $now */
    /** @var \Statamic\Entries\Entry $nextEvent */
    /** @var \Carbon\Carbon $nextEventDate */
    $now = now();
    $nextEventDate = $nextEvent ? $nextEvent->event_date : null;

    if ($nextEventDate === null) {
        return;
    }

    $days = $now->diffInDays($nextEventDate);
    $hours = $now->copy()->addDays($days)->diffInHours($nextEventDate);
    $minutes = $now->copy()->addDays($days)->addHours($hours)->diffInMinutes($nextEventDate);
    $seconds = $now->copy()->addDays($days)->addHours($hours)->addMinutes($minutes)->diffInSeconds($nextEventDate);

    $days = $days < 10 ? "0" . $days : $days;
    $hours = $hours < 10 ? "0" . $hours : $hours;
    $seconds = $seconds < 10 ? "0" . $seconds : $seconds;
    $minutes = $minutes < 10 ? "0" . $minutes : $minutes;
@endphp

<section id="countdown" class="container mx-auto text-center py-6">
    <h2 class="text-3xl font-bold mb-4 lg:mb-8 text-bonami-blue">COUNTDOWN TO EVENT</h2>
    <div class="flex justify-center items-center space-x-4 lg:space-x-8">
        <div class="lg:p-4">
            <p id="days" class="text-6xl font-bold text-bonami-red">{{ $days }}</p>
            <p class="text-lg text-bonami-blue">DAYS</p>
        </div>
        <div class="lg:p-4">
            <p id="hours" class="text-6xl font-bold text-bonami-red">{{ $hours }}</p>
            <p class="text-lg text-bonami-blue">HOURS</p>
        </div>
        <div class="lg:p-4">
            <p id="minutes" class="text-6xl font-bold text-bonami-red">{{ $minutes }}</p>
            <p class="text-lg text-bonami-blue">MINUTES</p>
        </div>
        <div class="lg:p-4">
            <p id="seconds" class="text-6xl font-bold text-bonami-red">{{ $seconds }}</p>
            <p class="text-lg text-bonami-blue">SECONDS</p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eventDate = new Date('{{ $nextEventDate->toIso8601String() }}').getTime();

        // Interval isn't the best way to do this, since it's not accurate, but it's good enough for what we need
        const countdownFunction = setInterval(function() {
            const now = new Date().getTime();
            const timeLeft = eventDate - now;

            const days = addZero(Math.floor(timeLeft / (1000 * 60 * 60 * 24)));
            const hours = addZero(Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
            const minutes = addZero(Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)));
            const seconds = addZero(Math.floor((timeLeft % (1000 * 60)) / 1000));

            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;

            if (timeLeft < 0) {
                clearInterval(countdownFunction);
                document.getElementById('countdown').innerHTML = "EVENT STARTED";
            }
        }, 1000);
    });

    function addZero(number) {
        return number < 10 ? "0" + number : number;
    }
</script>
