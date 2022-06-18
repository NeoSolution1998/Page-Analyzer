@extends('layouts.app')

@section('main_content')
    <div class="container-lg">
        <h1 class="mt-5 mb-3">Сайт: {{ $url->name }}</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $url->id }}</td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>{{ $url->name }}</td>
                    </tr>
                    <tr>
                        <td>Дата создания</td>
                        <td>{{ $url->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="mt-5 mb-3">Проверки</h2>
        <form method="post" action="/urls/{{ $url->id }}/checks">
            @csrf
            <input type="hidden" name="_token" value="nNb9ZHTDEOXb8Ke2Osk5fJKReg8EUL9vOwpMMnuP">
            <input type="submit" class="btn btn-primary" value="Запустить проверку">
        </form><br>

        <table class="table table-bordered table-hover text-nowrap">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Код ответа</th>
                    <th>h1</th>
                    <th>title</th>
                    <th>description</th>
                    <th>Дата создания</th>
                </tr>

                <tr>
                    <td>79</td>
                    <td>200</td>
                    <td>function...</td>
                    <td>Mail.ru...</td>
                    <td>Почта... </td>
                    <td>2022...</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
