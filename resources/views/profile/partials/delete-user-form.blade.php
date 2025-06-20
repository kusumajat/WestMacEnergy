<section>
    <header>
        <h3 class="profile-section-title mb-1" style="color: #dc3545;">{{ __('Danger Zone') }}</h3>
        <h2 class="h5 fw-bold text-danger">{{ __('Delete Account') }}</h2>
        <p class="mt-1 text-muted">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please be certain.') }}</p>
    </header>

    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
        {{ __('Delete Account') }}
    </button>

    <!-- Kode Modal tetap sama seperti sebelumnya, karena Bootstrap Modal sudah didesain untuk tema terang -->
    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')
                    <h2 class="h5 fw-bold" id="modalLabel">{{ __('Are you sure?') }}</h2>
                    <p class="mt-1 text-muted">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}</p>
                    <div class="mt-3">
                        <label for="password_delete" class="form-label sr-only">{{ __('Password') }}</label>
                        <input id="password_delete" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                        @error('password', 'userDeletion')<div class="text-danger mt-2 small">{{ $message }}</div>@enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
