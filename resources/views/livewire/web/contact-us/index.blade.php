<section class="contact ptb-100" id="contact">
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="container">
        <h2>{{ __('web.contact-us') }}</h2>
        <div class="contact-inner d-flex">
            <div class="input-block form-item">
                <label for="name">{{ __('web.name') }} <span class="error">{{ requireSign() }}</span> :</label>
                <input type="text" wire:model="name" id="name" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-block form-item">
                <label for="mobile"> {{ __('web.mobile') }} :</label>
                <input type="text" wire:model="mobile" id="mobile">
                @error('name')
                    <span class="error">&nbsp;</span>
                @enderror
            </div>
            <div class="textarea form-item">
                <label for="message">{{ __('web.your_message') }} <span class="error">{{ requireSign() }}</span> :</label>
                <textarea wire:model="message" id="message" required></textarea>
                @error('message')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="submit-btn form-item">
                <span wire:click='storeContact()' class="btn btn-blue">{{ __('web.send_message') }}</span>
            </div>
        </div>
        </form>
    </div>
</section>
