<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<h3 style="text-align: center">Форма для примера</h3>
<div class="container">
    <form action="">
        @foreach($questions as $question)
            @if($question->parent === null)
                @if($question->question === 'Выберете начинки для пирожков')
                    <label>
                    <select name="{{ $question->id }}" id="{{ $question->id }}" class="form-control" required>
                        <option value="">Выберете начинки для пирожков</option>
                        <option value="Клубничная">Клубничная</option>
                        <option value="Яблочная">Яблочная</option>
                        <option value="Малиновая">Малиновая</option>
                    </select>
                    </label>
                    <hr>
                @elseif($question->question === 'На когда вам приготовить?')
                    <label for="{{ $question->id }}">{{ $question->question }}
                        <input type="date" name="{{ $question->id }}" id="{{ $question->id }}" class="form-control">
                    </label>
                    <hr>
                @elseif($question->question === 'Есть ли аллергия на глютен?')
                    <label>{{ $question->question }}
                        <select name="{{ $question->id }}" id="{{ $question->id }}" class="form-control" required>
                            <option value="true">Да</option>
                            <option value="false">Нет</option>
                        </select>
                    </label>
                    <hr>
                @elseif($question->question === 'Укажите свои контакты')
                    <label>{{ $question->question }}</label>
                @else
                    <label for="{{ $question->id }}">{{ $question->question }}
                    <input type="text" name="{{ $question->id }}" id="{{ $question->id }}" class="form-control">
                    </label>
                    <hr>
                @endif
                @if(!empty($question->child))
                    <div class="container">
                        @foreach($question->child as $child)
                            <label for="{{ $child->id }}">{{ $child->question }}</label>
                            <input type="text" name="{{ $child->id }}" id="{{ $child->id }}" class="form-control">
                        @endforeach
                    </div>
                @endif
            @endif
        @endforeach
            <input type="submit" class="btn btn-success">
    </form>
</div>
