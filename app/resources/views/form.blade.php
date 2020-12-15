<div class="container">
    <form action="">
        @foreach($questions as $question)
            @if($question->parent_id === null)

            @endif
        @endforeach
    </form>
</div>
