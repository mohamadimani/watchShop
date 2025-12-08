<div class="container-fluid menu-lang-style flex-grow-1 container-p-y">
    @if (lang() == 'en')
        <style>
            .menu-lang-style,
            .menu-lang-style * {
                direction: ltr !important;
                text-align: left !important;
            }
        </style>
    @endif

    <style>
        img.hovering-zoom:hover {
            transform: scale(2.5);
        }

        .image,
        .cv {
            width: 50px;
        }
    </style>
    <div class="card p-3">
        @include('admin.layouts.alerts')
        <div class="card-header border-bottom">
            <h5 class="card-title col-ms-12"><span class=" col-md-8">{{ __('about.add_about') }}</span></h5>
            <div class="row">
                <div class="col-md-12 mb-3 d-flex">
                    <label for="title" class="mb-3 col-md-2 font-13">عنوان :</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="title" id="title" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="summary" class="mb-3 col-md-2 font-13">توضیحات کوتاه :</label>
                    <div class="col-md-10">
                        <input type="text" wire:model="summary" id="summary" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label for="description" class="mb-3 col-md-2 font-13">توضیحات کامل :</label>
                    <div class="col-md-10">
                        <textarea wire:model="description" id="description" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label class="mb-3 col-md-2 font-13">{{ __('about.image') }}:
                        @if ($image_name)
                            <img src="{{ GetImage('about/image/' . $image_name) }}" class="image hovering-zoom">
                        @endif
                    </label>
                    <div class="col-md-10">
                        <input type="file" wire:model="image" id="image" class="form-control" placeholder="{{ __('about.image') }}">
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex">
                    <label class="mb-3 col-md-2 font-13">{{ __('about.cv') }}:
                        @if ($cv_name)
                            <a target="_blank" class="btn btn-info btn-sm" href="{{ GetImage('about/cv/' . $cv_name) }}">{{ __('public.download') }}</a>
                        @endif
                    </label>
                    <div class="col-md-10">
                        <input type="file" wire:model="cv" id="cv" class="form-control" placeholder="{{ __('about.cv') }}">
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-3">
                    <span wire:click='store()' class="btn btn-success w-100 ">{{ __('about.save') }}</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setUsedSkills() {
            const value = $('select#used_skills').val();
            @this.setUsedSkills(value)
        }
        setUsedSkills()
    </script>
</div>
