@extends('layouts.app')

@section('content')
<div class="container-left">{{$pageTitle}}</div>
    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8 ">
        <div class="flex size-6 shrink-0 items-center justify-center rounded-full"></div>

        <div class="form-container">
            <form class="styled-form" method="POST">
                @csrf
                <input type="hidden" id="id" name="id"></input>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                               
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $button->title) }}" required>
                </div> 

                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" id="link" name="link" value="{{ old('link', $button->link) }}" placeholder="https://www." required>
                </div> 

                <div class="form-group">
                    <label for="color">Color</label>
                    <select id="color" name="color">
                        @foreach ($colors as $value => $label)
                        <option value="{{ $value }}" {{ $value == old('color', $button->color) ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                        @endforeach
                    </select>          
                </div> 

                <input type="submit" class="submit-button" value={{ $buttonText }}></input>
            </form>
        </div>         
    </div>
@endsection