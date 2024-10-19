<div class="card">
    <div class="card-header bg-white p-4">
        <h2 class="mb-0">{{ __($survey->name) }}</h2>

        @if(!$eligible)
            {{ __('We only accept') }}
            <strong>{{ $survey->limitPerParticipant() }} {{ \Str::plural('entry', $survey->limitPerParticipant()) }}</strong>
            {{ __('per participant.') }}
        @endif

        @if($lastEntry)
            {{ __('You last submitted your answers ') }}<strong>{{ $lastEntry->created_at->diffForHumans() }}</strong>{{ __('.') }}
        @endif

    </div>
    @if(!$survey->acceptsGuestEntries() && auth()->guest())
        <div class="p-5">
            {{ __('Please login to join this survey.') }}
        </div>
    @else
        @foreach($survey->sections as $section)
            @include('survey::sections.single')
        @endforeach

        @foreach($survey->questions()->withoutSection()->get() as $question)
            @include('survey::questions.single')
        @endforeach

        @if($eligible)
            <button class="btn btn-primary">{{ __('Submit') }}</button>
        @endif
    @endif
</div>