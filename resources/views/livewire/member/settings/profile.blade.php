<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Photo Profile</span>
                <div class="text-muted">Perbarui photo profile kamu.</div>
            </div>
        </div>
        <div class="col-md-8">
            <form wire:submit.prevent="updateProfile">
                <div class="form-group mb-3">
                    <label class="form-label">Avatar</label>
                    <div class="form-file">
                        <input class="form-control" wire:model="image" type="file" style="padding:.75rem 1.2rem">
                        <button wire:loading.attr="disabled" wire:click="useGravatar" class="btn btn-success text-white border-0 mt-3">
                            Use Gravatar
                        </button>
                        <button wire:loading.attr="disabled" wire:click="resetAvatar" class="btn btn-danger text-white border-0 mt-3">
                            Reset
                        </button>
                    </div>
                </div>
                <div wire:loading wire:target="image">
                    <div class="spinner-border spinner-border-sm" role="status"></div>
                </div>
                @error('image')
                    <div class="text-danger fw-bold mt-3">{{ $message }}</div>
                @else
                    @if($image)
                        <div>
                            <img loading=lazy class="avatar-100 rounded-circle mt-2 mb-3" src="{{ empty($image) ? $image->temporaryUrl() : $image }}" height="100" width="100" />
                        </div>
                    @else
                        @if ($user->image)
                            <div>
                                <img loading=lazy class="avatar-100 rounded-circle mt-2 mb-3"
                                    src="{{ Helper::getCDNImage($user->image, 240) }}" height="100" width="100"
                                    alt="{{ $user->username }}'s avatar" />
                            </div>
                        @endif
                    @endif
                @enderror
            </form>
        </div>
    </div>
    <hr/>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Info Pribadi</span>
                <div class="text-muted">Perbarui detail profil pribadi kamu.</div>
            </div>
        </div>
        <div class="col-md-8">
            <form wire:submit.prevent="updateProfile">
                {{-- Nama --}}
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
                {{-- Bio --}}
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
                {{-- Phone --}}
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">+62</span>
                        <input type="text" class="form-control border border-1 @error('phone') is-invalid @enderror" value="{{ $user->phone }}" wire:model.defer="phone">
                    </div>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Company --}}
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

                {{-- $this->phone = $this->user->phone;
                $this->gender = $this->user->gender;
                $this->birthday = $this->user->birthday;
                $this->address = $this->user->address;
                
                $this->village = $this->user->village;
                $this->district = $this->user->district;
                $this->city = $this->user->city;
                $this->country = $this->user->country; --}}
                
                <x-submit>Simpan Perubahan</x-submit>
            </form>
        </div>
    </div>
    <hr/>
    <div class="row p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Sosial Media</span>
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
                <div class="row">
                    <div class="col-md-6">
                        {{-- Facebook --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <span class="iconify" data-icon="uil:facebook"></span>
                            </span>
                            <input type="text" class="form-control border border-1 @error('facebook') is-invalid @enderror" placeholder="Facebook" value="{{ $user->facebook }}" wire:model.defer="facebook">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Twitter --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <span class="iconify" data-icon="uil:twitter"></span>
                            </span>
                            <input type="text" class="form-control border border-1 @error('twitter') is-invalid @enderror" placeholder="Twitter" value="{{ $user->twitter }}" wire:model.defer="twitter">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
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
                    </div>
                </div>  
                <x-submit>Simpan Perubahan</x-submit>
            </form>
        </div>
    </div>
</div>