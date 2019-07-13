@extends('layouts.master')

@section('title', 'GBI')
@section('header')
<header>GBI Staff Area</header>
@endsection


@section('content')

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li>
         <a href="<?= route('subjects.index')?>">Subjects</a>
      </li>
    </ul>

@endsection