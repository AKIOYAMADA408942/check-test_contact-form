@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin-index.css') }}">
@endsection

@section('nav')
<form class="header-form" action="/logout" method="post">
  @csrf
  <button class="header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <div class="search-form__container">
    <form class="search-form" action="/admin/search" method="get">
      @csrf
      <div class="search-form__inner">
        <div class="search-form__item">
          <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
        </div>
        <div class="search-form__item">
          <select class="search-form__item-gender" name="gender">
            <option disabled selected>性別</option>
            <option value="">全て</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
          </select>
        </div>
        <div class="search-form__item">
          <select class="search-form__item-category" name="category_id">
            <option disabled selected>お問い合わせの種類</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}">
              {{$category->content}}</option>
            @endforeach
          </select>
        </div>
        <div class="search-form__item">
          <input class="search-form__item-date" type="date"
          name="date">
        </div>
        <div class="search-form__item">
          <button class="search-form__item-button">検索</button>
        </div>
        <div class="search-reset">
          <a class="search-reset__button" href="/admin">リセット</a>
        </div>
      </div>
    </form>
  </div>
  <div class="function">
    <div class="function-export">
      <button class="function-export__button">エクスポート未実装</button>
    </div>
    <div class="function-paginate">
        {{$contacts->links('vendor.pagination.tailwind2')}}
    </div>
  </div>
  <div class="contact-table">
    <table class="contact-table__inner">
      <tr class="contact-table__row">
        <th class="contact-table__header">お名前</th>
        <th class="contact-table__header">性別</th>
        <th class="contact-table__header">メールアドレス</th>
        <th class="contact-table__header">お問い合わせの種類</th>
        <th class="contact-table__header"></th>
      </tr>
      @foreach($contacts as $contact)
      <tr class="contact-table__row">
        <td class="contact-table__item">{{ $contact['last_name']}}&nbsp;&nbsp;{{ $contact['first_name']}}</td>
        <td class="contact-table__item">
        @switch($contact['gender'])
          @case(1)
            男性
          @break
          @case(2)
            女性
          @break
          @case(3)
            その他
          @break
        @endswitch
        </td>
        <td class="contact-table__item">{{$contact['email']}}</td>
        <td class="contact-table__item">{{ $contact['category']['content'] }}</td>
        <td class="contact-table__item">
          @livewire('modal')
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
