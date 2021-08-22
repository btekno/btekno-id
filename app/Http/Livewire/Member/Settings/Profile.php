<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public User $user;
    
    # Profil Pribadi
    public $image;
    public $name;
    public $phone;
    public $gender;
    public $birthday;
    public $address;
    public $village;
    public $district;
    public $city;
    public $country;
    public $bio;
    
    # Sosial Media
    public $website;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $pinterest;
    public $dribbble;
    public $youtube;

    public function mount()
    {
        $this->user = me();
        
        # Profil Pribadi
        $this->image = $this->user->image;
        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
        $this->gender = $this->user->gender;
        $this->birthday = $this->user->birthday;
        $this->address = $this->user->address;
        $this->village = $this->user->village;
        $this->district = $this->user->district;
        $this->city = $this->user->city;
        $this->country = $this->user->country;
        $this->bio = $this->user->bio;
        
        # Sosial Media
        $this->website = $this->user->website;
        $this->facebook = $this->user->facebook;
        $this->twitter = $this->user->twitter;
        $this->instagram = $this->user->instagram;
        $this->linkedin = $this->user->linkedin;
        $this->pinterest = $this->user->pinterest;
        $this->dribbble = $this->user->dribbble;
        $this->youtube = $this->user->youtube;
    }

    public function updatedAvatar()
    {
        $this->validate([
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'name'      => ['nullable', 'max:30'],
            'lastname'  => ['nullable', 'max:30'],
            'bio'       => ['nullable', 'max:160'],
            'location'  => ['nullable', 'max:30'],
            'company'   => ['nullable', 'max:30'],
            'image'     => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ]);

        if ($this->image) {
            $oldPhoto = explode('storage/', $this->user->image);
            if (array_key_exists(1, $oldPhoto)) {
                Storage::delete($oldPhoto[1]);
            }
            $img = Image::make($this->image)
                    ->fit(400)
                    ->encode('webp', 100);
            $imageName = Str::orderedUuid().'.webp';
            Storage::disk('public')->put('avatars/'.$imageName, (string) $img);
            $image = config('app.url').'/storage/avatars/'.$imageName;
            $this->user->image = $image;
        }

        $this->user->name = $this->name;
        $this->user->lastname = $this->lastname;
        $this->user->bio = $this->bio;
        $this->user->location = $this->location;
        $this->user->company = $this->company;
        $this->user->save();
        $this->emit('profileUpdated');
        logify(request(), 'User', me(), 'Updated the profile settings');

        return toast($this, 'success', 'Your profile has been updated!');
    }

    public function resetAvatar()
    {
        $oldPhoto = explode('storage/', $this->user->avatar);
        if (array_key_exists(1, $oldPhoto)) {
            Storage::delete($oldPhoto[1]);
        }
        $this->user->avatar = 'https://avatar.tobi.sh/'.Str::orderedUuid().'.svg?text='.strtoupper(substr($this->user->username, 0, 2));
        $this->user->save();
        $this->emit('avatarResetted');
        logify(request(), 'User', me(), 'Resetted avatar to default');

        return toast($this, 'success', 'Your avatar has been resetted!');
    }

    public function useGravatar()
    {
        $oldPhoto = explode('storage/', $this->user->avatar);
        if (array_key_exists(1, $oldPhoto)) {
            Storage::delete($oldPhoto[1]);
        }
        $this->user->avatar = 'https://secure.gravatar.com/avatar/'.md5(me()->email).'?s=500&d=identicon';
        $this->user->save();
        $this->emit('gravatarUsed');
        logify(request(), 'User', me(), 'Updated avatar provider to Gravatar');

        return toast($this, 'success', 'Your avatar has been switched to Gravatar!');
    }

    public function updateSocial()
    {
        $this->validate([
            'website'   => ['nullable', 'active_url'],
            'facebook'  => ['nullable', 'alpha_dash', 'max:200'],
            'twitter'   => ['nullable', 'alpha_dash', 'max:30'],
            'instagram' => ['nullable', 'alpha_dash', 'max:200'],
            'linkedin'  => ['nullable', 'alpha_dash', 'max:30'],
            'pinterest' => ['nullable', 'alpha_dash', 'max:30'],
            'dribbble'  => ['nullable', 'alpha_dash', 'max:30'],
            'youtube'   => ['nullable', 'alpha_dash', 'max:30'],
        ]);

        $this->user->website = $this->website;
        $this->user->facebook = $this->facebook;
        $this->user->twitter = $this->twitter;
        $this->user->instagram = $this->instagram;
        $this->user->linkedin = $this->linkedin;
        $this->user->pinterest = $this->pinterest;
        $this->user->dribbble = $this->dribbble;
        $this->user->youtube = $this->youtube;
        $this->user->save();

        $this->emit('socialUpdated');
        logify(request(), 'User', me(), 'Updated the social URLs');
        return toast($this, 'success', 'Your social links has been updated!');
    }
}
