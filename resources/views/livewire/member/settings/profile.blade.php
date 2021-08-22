<div class="row p-3">
    <div class="col-md-4">
        <div class="mt-2">
            <span class="h5">Info Pribadi</span>
            <div class="text-muted">Perbarui detail profil pribadi kamu.</div>
        </div>
    </div>
    <div class="col-md-8">
        <form wire:submit.prevent="updateProfile">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control border border-1 @error('name') is-invalid @enderror" value="{{ $user->name }}" 
                    wire:model.defer="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea class="form-control border border-1 @error('bio') is-invalid @enderror" rows="3"
                    wire:model.defer="bio">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control border border-1 @error('location') is-invalid @enderror"
                    value="{{ $user->location }}" wire:model.defer="location">
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Company</label>
                <input type="text" class="form-control border border-1 @error('company') is-invalid @enderror"
                    value="{{ $user->company }}" wire:model.defer="company">
                @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Avatar</label>
                <div class="form-file w-25">
                    <input class="form-control form-control-sm" wire:model="avatar" type="file">
                    <button wire:loading.attr="disabled" wire:click="useGravatar"
                        class="btn btn-outline-success rounded-pill mt-3">
                        Use Gravatar
                    </button>
                    <button wire:loading.attr="disabled" wire:click="resetAvatar"
                        class="btn btn-outline-danger rounded-pill mt-3">
                        Reset
                    </button>
                </div>
            </div>
            <div wire:loading wire:target="avatar">
                <div class="spinner-border spinner-border-sm" role="status"></div>
            </div>
            @error('image')
                <div class="text-danger fw-bold mt-3">{{ $message }}</div>
            @else
                @if ($image)
                    <div>
                        {{-- <img loading=lazy class="avatar-100 rounded-circle mt-2 mb-3" src="{{ $image->temporaryUrl() }}" height="100" width="100" /> --}}
                    </div>
                @else
                    @if ($user->avatar)
                        <div>
                            <img loading=lazy class="avatar-100 rounded-circle mt-2 mb-3"
                                src="{{ Helper::getCDNImage($user->avatar, 240) }}" height="100" width="100"
                                alt="{{ $user->username }}'s avatar" />
                        </div>
                    @endif
                @endif
            @enderror
            <button type="submit" class="btn btn-outline-primary rounded-pill">
                Save
            </button>
        </form>
    </div>
</div>

<div class="row p-3">
    <div class="col-md-4">
        <div class="mt-2">
            <span class="h5">Sosial Media</span>
            <div class="text-muted">Perbarui tautan media sosial kamu.</div>
        </div>
    </div>
    <div class="col-md-8">
        <form wire:target="updateSocial" wire:submit.prevent="updateSocial">
            {{-- Website --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <x-heroicon-o-link class="heroicon" />
                </span>
                <input type="text" class="form-control border border-1 @error('website') is-invalid @enderror" placeholder="Website"
                    value="{{ $user->website }}" wire:model.defer="website">
                @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Facebook --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:facebook"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('facebook') is-invalid @enderror" placeholder="Facebook"
                    value="{{ $user->facebook }}" wire:model.defer="facebook">
                @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Twitter --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:twitter"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('twitter') is-invalid @enderror" placeholder="Twitter"
                    value="{{ $user->twitter }}" wire:model.defer="twitter">
                @error('twitter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Instagram --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:instagram"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('instagram') is-invalid @enderror" placeholder="Instagram"
                    value="{{ $user->instagram }}" wire:model.defer="instagram">
                @error('instagram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- LinkedIn --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:linkedin"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('linkedin') is-invalid @enderror" placeholder="LinkedIn"
                    value="{{ $user->linkedin }}" wire:model.defer="linkedin">
                @error('linkedin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Pinterest --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="akar-icons:pinterest-fill"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('pinterest') is-invalid @enderror" placeholder="Pinterest"
                    value="{{ $user->pinterest }}" wire:model.defer="pinterest">
                @error('pinterest')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Dribbble --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:dribbble"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('dribbble') is-invalid @enderror" placeholder="Dribbble"
                    value="{{ $user->dribbble }}" wire:model.defer="dribbble">
                @error('dribbble')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- Youtube --}}
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <span class="iconify" data-icon="uil:youtube"></span>
                </span>
                <input type="text" class="form-control border border-1 @error('youtube') is-invalid @enderror" placeholder="YouTube"
                    value="{{ $user->youtube }}" wire:model.defer="youtube">
                @error('youtube')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="button primary">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>