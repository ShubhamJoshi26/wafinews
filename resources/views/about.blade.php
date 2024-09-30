@extends('layouts.master')

@section('content')

<div class="utf_block_wrapper about-block-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="single-post">
            <div class="utf_post_content-area">
              <div class="entry-content">
                {!! @$about->content !!}
              </div>                                          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection