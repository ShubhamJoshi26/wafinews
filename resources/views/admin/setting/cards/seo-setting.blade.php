<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('/news/auth/admin/seo-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('admin.Site Seo Title') }}</label>
                <input type="text" name="site_seo_title" value="{{ $settings['site_seo_title'] }}" class="form-control" value="">
                @error('site_seo_title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="">{{ __('admin.Site Seo Description') }}</label>
                <textarea name="site_seo_description" class="form-control" style="height: 300px" id="" cols="30" rows="10">{{ $settings['site_seo_description'] }}</textarea>
                @error('site_seo_description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="">{{ __('admin.Site Seo Keywords') }}</label>
                <input name="site_seo_keywords" type="text" class="form-control inputtags" value="{{ $settings['site_seo_keywords'] }}">
                @error('site_seo_keywords')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="">{{ __('Google Tag Manager Head Script') }}</label>
                <input name="head_script" type="text" class="form-control" value="{{ $settings['head_script']??'' }}">
                @error('head_script')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">

                <label for="">{{ __('Google Tag Manager Body Script') }}</label>
                <input name="body_script" type="text" class="form-control" value="{{ $settings['body_script']??'' }}">
                @error('body_script')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
        </form>
    </div>
</div>
